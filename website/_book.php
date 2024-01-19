<link rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"/>
<link rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0"/>

<body>
<div class="formContainer">
    <div class="bookingForm">
        <script>
            window.onload = function get() {
                // cleanup link
                var urlWithoutParams = window.location.href.split('?')[0];
                history.replaceState({}, document.title, urlWithoutParams);


                // get from local storage
                var obfuscatedData = localStorage.getItem("obfuscatedData");

                if (obfuscatedData) {
                    // deobfuscate data
                    var deobfuscatedData = JSON.parse(atob(obfuscatedData));

                    // log information
                    console.log(deobfuscatedData.bookQuantity);
                    console.log(deobfuscatedData.bookStart);
                    console.log(deobfuscatedData.bookEnd);

                    // set values to input
                    document.getElementById('bookQuantity').value = deobfuscatedData.bookQuantity;
                    document.getElementById('bookStart').value = deobfuscatedData.bookStart;
                    document.getElementById('bookEnd').value = deobfuscatedData.bookEnd;
                }
            }
        </script>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo "<p style=\"color: white;\">Form submitted successfully!";
            include "book_order.php";
        } else {
            include "book_form.php";
        }
        ?>
    </div>
    <div class="map">
        <img src="wwwroot/img/BoerBert.jpeg" alt="map of the boer himself"/>
    </div>
</div>
<section id="cartBooking">
    <div class="bookOptions">
        Opties
        <div class="containerCart">
            <ul class="menu-items">
                <!--    1    -->
                <li class="menu-item">
                    <div class="menu-item-dets">
                        <p class="menu-item-heading">Plot 3, 1 week, caravan</p>
                        <p class="g-price">€150</p>
                    </div>
                    <button class="add-button" data-title="Plot 3, 1 week, caravan" data-price="150">Add to Cart
                    </button>
                </li>
                <!--    2    -->
                <li class="menu-item">
                    <div class="menu-item-dets">
                        <p class="menu-item-heading">Plot 3, 1 week, tent</p>
                        <p class="g-price">€100</p>
                    </div>
                    <button class="add-button" data-title="Plot 3, 1 week, tent" data-price="100">Add to Cart</button>
                </li>
                <!--    3    -->
                <li class="menu-item">
                    <div class="menu-item-dets">
                        <p class="menu-item-heading">Plot 3, 2 weken, caravan</p>
                        <p class="g-price">€300</p>
                    </div>
                    <button class="add-button" data-title="Plot 3, 2 weken, caravan" data-price="300">Add to Cart
                    </button>
                </li>
                <!--    4    -->
                <li class="menu-item">
                    <div class="menu-item-dets">
                        <p class="menu-item-heading">Plot 3, 2 weken, tent</p>
                        <p class="g-price">€200</p>
                    </div>
                    <button class="add-button" data-title="Plot 3, 2 weken, tent" data-price="200">Add to Cart</button>
                </li>
            </ul>
        </div>
        <!-- Javascript and JQuery -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
        <script src='wwwroot/js/cart.js'></script>
    </div>
    <div class="bookCart">
        Winkelwagen
        <!--  Cart Items -->
        <ul class="cart-items">
        </ul>

        <div class="cart-math">
            <p>Add items to cart</p>
        </div>
    </div>
</section>
<!-- Chatbox and chatbot -->
<div class="chatBot">
    <script src="wwwroot/js/chat.js" defer></script>
    <button class="chatbot-toggler">
        <span class="material-symbols-rounded">mode_comment</span>
        <span class="material-symbols-outlined">close</span>
    </button>
    <div class="chatbot">
        <header>
            <h2>Chatbot</h2>
            <span class="close-btn material-symbols-outlined">close</span>
        </header>
        <ul class="chatbox">
            <li class="chat incoming">
                <span class="material-symbols-outlined">smart_toy</span>
                <p>Hi there! How can I help you today?</p>
            </li>
        </ul>
        <div class="chat-input">
            <textarea placeholder="Enter a message..." spellcheck="false" required></textarea>
            <span id="send-btn" class="material-symbols-rounded">send</span>
        </div>
    </div>
</div>
</body>

</html>