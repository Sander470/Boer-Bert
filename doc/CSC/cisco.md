# Cisco router setup
A guide on how to setup a Cisco Router for a small local space; including an office, internet of things, and guest network; over a trunk cable.

This guide expects you to have the absolute basics in Networking down. For helpful links, check the table of contents. 

For no explaination, just the commands in order are located down below for ease of use.

## Table of contents
1. [Access router](#access-router)
1. [Initial configuration & Global Configuration Mode](#initial-configuration--global-configuration-mode)
1. [Accessing Internet](#accessing-internet)
1. [Create VLANs](#create-vlans)
1. [IP Routing](#ip-routing)
1. [Saving our Configuration](#saving-our-configuration)
1. [All commands without explaination](#all-commands-without-explaination)
1. [Sources and useful links](#sources-and-useful-links)

## Access router
- Open [PuTTY](https://cdn.discordapp.com/attachments/1143680365647626392/1178651891706634311/putty-64bit-0.78-installer.msi?ex=6576ec1d&is=6564771d&hm=9832fde89fd342a01590be9a3ceefbf59f191bf39cd7a4eb3dbd0544de922808&)
- Set Connection Type to Serial
- Lookup what COM port you need in Device Manager and replace it in Serial Line
- Enter a name, save your configuration, click Open


#### How to find your COM port
- Open Device Manager
- Double click on 'Ports (COM & LPT)'
- At the end of the port that pops up you should see a COM port number (For example: (COM4))

## Initial configuration & Global Configuration Mode
When first booting up and accessing a Cisco Router you will be prompted with setting the router up through an Initial configuration.<br/>Since we are setting up the router through VLANs, we are going to setup the router manually, type `no` and press enter. <br/>You will see the following: 

`Router>`

If we want to start configuring our router, we must first type:

`enable`

Doing this allows us to go into privileged mode where we can view and change the configuration of the router.<br/>We must first however enter Global Configuration Mode. We do this by typing the command:

`configure terminal`

Now you are ready to set up your VLANs!

## Accessing Internet
With a Cisco router, you can check the status of each port with the command:

`show ip interface`

For right now, it should look something like this:
```
Router#show ip interface
Interface           IP-Address       OK? Method Status                Protocol
FastEthernet0/0     unassigned       YES unset  administratively down down
FastEthernet0/1     unassigned       YES unset  administratively down down
``` 
The names of the interfaces can be off, do not forget to change this to the correct names in commands.

We are trying to access the internet through the first port that shows, in our case that would be `FastEthernet0/0`. For this to happen, we have to execute the following commands:
```bash
interface FastEthernet0/0
ip address dhcp
duplex auto
speed auto
exit
```
A small explaination of the commands we just did:<br/>
`interface FastEthernet0/0:` This command enters the configuration mode for the specified interface.<br/>
`ip address dhcp:` Configures the interface to obtain an IP address dynamically from your Internet Service Provider (ISP) using DHCP.<br/>
`duplex auto` and `speed auto:` These commands allow the router to automatically negotiate the speed and duplex settings with the connected device.

Our router should have internet now, yay! Through we are not done yet. We will open a second port, in our case `FastEthernet0/1` and put this port in Trunk mode. A Trunk is an Ethernet cable which has virtual cables inside of it. This way we are able to split our network over VLAN's through a singular ethernet port. We execute the following commands:
```bash
interface FastEthernet0/1
switchport mode trunk
exit
```
Just like before, `interface FastEthernet0/1` enters the configuration mode for the specified interface. This time however, we change the `switchport mode` to `trunk` to make sure our router knows what to do with out trunk cable

## Create VLANs
For this example we will setup a VLAN network for 3 different networks:
1. Office network
2. IOT network (Internet Of Things)
3. Guest network

We will assign each VLAN network an ID and name:

```bash
vlan 10
name Office
exit

vlan 20
name IOT
exit

vlan 30
name Guest
exit
```

We want to choose ID's for these VLAN's which make sense. A simple 1, 2, 3 could work, or in tenths like we are doing.

So for the office network, we will use VLAN ID 10. In an IP address, the subnet is the second to last set of numbers to specify a specific group within a network. Usually this subnet is the same number as the VLAN ID. So for the office network, our IP will be: `192.168.10.1`

Next to this we will use a subnet mask. A subnet mask is a 32-bit number that divides an IP address into a network part and a host part. It uses '1' bits to represent the network and '0' bits for hosts. For example, 255.255.255.0 means the first 24 bits are the network, allowing 256 addresses in the network.

We will use the pool we created, IP and a subnet mask to tell the router what network we should use.<br/>
Next to this, we will assign a default-router, which in the context of DHCP configuration, refers to the default gateway for devices in a specific VLAN. We will also use a DNS-server. A DNS-server is able to translate human readable domain names (like https://example.com) to IP addresses for us. For a fast and free option, we will use the DNS-server from Google, which is `8.8.8.8`.

```bash
ip dhcp pool Office
 network 192.168.10.0 255.255.255.0
 default-router 192.168.10.1
 dns-server 8.8.8.8

ip dhcp pool IOT
 network 192.168.20.0 255.255.255.0
 default-router 192.168.20.1
 dns-server 8.8.8.8

ip dhcp pool Guest
 network 192.168.30.0 255.255.255.0
 default-router 192.168.30.1
 dns-server 8.8.8.8
```

## IP Routing
Our Office pool should be able to access the IOT and Guest pools. The IOT and Guest pools however, should not be able to access any other pool. This is called IP Routing. The first thing we do to enable it, is:

`ip routing`

Next we will configure IP addresses on the router's subinterfaces for VLANs 10, 20, and 30.<br/>
Each VLAN has its own IP address within its respective subnet. For example, devices in VLAN 10 will use the router's IP address 192.168.10.1 as their default gateway.
```bash
interface vlan 10
 ip address 192.168.10.1 255.255.255.0
 exit

interface vlan 20
 ip address 192.168.20.1 255.255.255.0
 exit

interface vlan 30
 ip address 192.168.30.1 255.255.255.0
 exit
```

Now we will use an Access Control List (or ACL for short) to manage trafic between all subnets.

There are two types of ACLs:
- Standard ACLs: These filter traffic based on source IP addresses.
- Extended ACLs: These provide more detailed filtering, considering both source and destination IP addresses, protocols, and ports.

In our case, we can use Standard ACLs, since we are going to deny any traffic to other subnets from IOT (20) and Guest (30). We will allow all traffic for the Office (10), so they can access everything.

```bash
ip access-list extended OFFICE_ACL
 permit ip 192.168.10.0 0.0.0.255 any

ip access-list extended IOT_ACL
 deny ip 192.168.20.0 0.0.0.255 192.168.10.0 0.0.0.255
 permit ip 192.168.20.0 0.0.0.255 any

ip access-list extended GUEST_ACL
 deny ip 192.168.30.0 0.0.0.255 192.168.10.0 0.0.0.255
 deny ip 192.168.30.0 0.0.0.255 192.168.20.0 0.0.0.255
 permit ip 192.168.30.0 0.0.0.255 any
```

Next up we must actually link our made ACLs with our VLANs. We can simply do this by executing:
```bash
interface vlan 10
 ip access-group OFFICE_ACL in
 exit

interface vlan 20
 ip access-group IOT_ACL in
 exit

interface vlan 30
 ip access-group GUEST_ACL in
 exit
```

## Saving our configuration
Wow you did it! Though do not turn off your router just yet. It has not saved anything you've done just yet. Simply type:

`write memory`

And you'll be good to go!


## All commands without explaination

```bash
enable

configure terminal

show ip interface

# Replace FastEthernet0/0 with whatever your ports are called.
interface FastEthernet0/0
ip address dhcp
duplex auto
speed auto
exit

interface FastEthernet0/1
switchport mode trunk
exit

vlan 10
name Office
exit

vlan 20
name IOT
exit

vlan 30
name Guest
exit

ip dhcp pool Office
 network 192.168.10.0 255.255.255.0
 default-router 192.168.10.1
 dns-server 8.8.8.8

ip dhcp pool IOT
 network 192.168.20.0 255.255.255.0
 default-router 192.168.20.1
 dns-server 8.8.8.8

ip dhcp pool Guest
 network 192.168.30.0 255.255.255.0
 default-router 192.168.30.1
 dns-server 8.8.8.8

ip routing

interface vlan 10
 ip address 192.168.10.1 255.255.255.0
 exit

interface vlan 20
 ip address 192.168.20.1 255.255.255.0
 exit

interface vlan 30
 ip address 192.168.30.1 255.255.255.0
 exit

ip access-list extended OFFICE_ACL
 permit ip 192.168.10.0 0.0.0.255 any

ip access-list extended IOT_ACL
 deny ip 192.168.20.0 0.0.0.255 192.168.10.0 0.0.0.255
 permit ip 192.168.20.0 0.0.0.255 any

ip access-list extended GUEST_ACL
 deny ip 192.168.30.0 0.0.0.255 192.168.10.0 0.0.0.255
 deny ip 192.168.30.0 0.0.0.255 192.168.20.0 0.0.0.255
 permit ip 192.168.30.0 0.0.0.255 any

interface vlan 10
 ip access-group OFFICE_ACL in
 exit

interface vlan 20
 ip access-group IOT_ACL in
 exit

interface vlan 30
 ip access-group GUEST_ACL in
 exit

write memory
```

## Sources and useful links
DHCP Client. (n.d.). https://www.cisco.com/c/en/us/td/docs/ios-xml/ios/ipaddr_dhcp/configuration/xe-3se/3850/dhcp-xe-3se-3850-book/config-dhcp-client.pdf

Cisco. (2019). Configuring IP Access Lists. Cisco. https://www.cisco.com/c/en/us/support/docs/security/ios-firewall/23602-confaccesslists.html

Cisco Content Hub - Basic IP Routing. (n.d.). Content.cisco.com. Retrieved November 29, 2023, from https://content.cisco.com/chapter.sjs?uri=/searchable/chapter/content/en/us/td/docs/ios-xml/ios/iproute_pi/configuration/15-mt/iri-15-mt-book/iri-iprouting.html.xml

rfc791. (n.d.). Datatracker.ietf.org. https://datatracker.ietf.org/doc/html/rfc791

Educative Answers - Trusted Answers to Developer Questions. (n.d.). Educative. Retrieved November 29, 2023, from https://www.educative.io/answers/what-is-trunking-in-networking