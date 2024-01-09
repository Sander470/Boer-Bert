<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />

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
            <form method="post" action="">
            <p class="title">Reserveren</p>

                <div class="formRow inlineFormRow">
                    <input type="text" id="firstName" name="firstName" required 
                    placeholder="Voornaam">
                    <input type="text" name="infix" id="infix"
                    placeholder="">
                    <input type="text" name="lastName" id="lastName" required
                    placeholder="Achternaam">
                </div>

                <div class="formRow inlineFormRow">
                    <label for="birthDate">Geboortedatum</label>
                    <input type="date" id="birthDate" name="birthDate" required class="formInput">
                </div>
                
                <div class="formRow inlineFormRow">
                    <label for="fieldNr">Veldnummer</label>
                    <select name="fieldNr" id="fieldNr" class="formInput">
                        <option value="A0">A0</option>
                        <option value="A1">A1</option>
                        <option value="A2">A2</option>
                        <option value="A3">A3</option>
                        <option value="A4">A4</option>
                        <option value="A5">A5</option>
                        <option disabled>etc...</option>
                    </select>
                </div>

                <div class="formRow inlineFormRow">
                    <label for="placeType">Plaats type</label>
                    <select name="placeType" id="placeType" class="formInput">
                        <option value="camper">camper</option>
                        <option value="caravan">caravan</option>
                        <option value="tent">tent</option>
                    </select>
                </div>

                <div class="formRow inlineFormRow">
                    <label for="bookQuantity">Aantal personen</label>
                    <input class="formInput" type="number" id="numOfPeople" name="numOfPeople" min="1" max="10" placeholder="0">
                </div>

                <div class="formRowStack">
                    <div class="formRow stackedFormRow">
                        <label for="bookStart">Aankomst</label>
                        <input class="formInput" type="date" name="bookStart" id="bookStart" value="" required>
                    </div>

                    <div class="formRow stackedFormRow">
                        <label for="bookEnd">Vertrek</label>
                        <input class="formInput" type="date" name="bookEnd" id="bookEnd" value="" required>
                    </div>
                </div>

                <div class="formRowStack">
                    <div class="formRow stackedFormRow">
                        <input type="text" id="street" name="street" placeholder="straat" required>
                        <input type="text" id="houseNr" name="houseNr" placeholder="huisnummer" required>
                    </div>
                    <div class="formRow stackedFormRow">
                        <input type="text" id="postalCode" name="postalCode" placeholder="postcode" required>
                        <input type="text" id="city" name="city" placeholder="stad" required>
                    </div>
                    <div class="formRow stackedFormRow">
                        <select name="country" id="country" class="formInput">
                            <option value="Nederland">Nederland</option>
                            <option value="Deutschland">Deutschland</option>
                            <option value="England">England</option>
                            <option value="France">France</option>
                            <option value="etc..." disabled>etc...</option>
                        </select>
                    </div>
                </div>

                <div class="formRow inlineFormRow">
                    <input type="text" id="phoneNr" name="phoneNr" placeholder="telefoonnummer">
                </div>

                <div class="formRow inlineFormRow">
                    <label for="setupHelp">Hulp bij opzetten tent/caravan/camper</label>
                    <select name="setupHelp" id="setupHelp" class="formInput">
                        <option value="ja">ja</option>
                        <option value="nee" selected>nee</option>
                    </select>
                </div>

                <input class="submit" type="submit">
            </form>
        </div>
        <div class="map">
            <img src="wwwroot/img/BoerBert.jpeg"  alt="map of the boer himself"/>
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
                        <button class="add-button" data-title="Plot 3, 1 week, caravan" data-price="150">Add to Cart</button>
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
                        <button class="add-button" data-title="Plot 3, 2 weken, caravan" data-price="300">Add to Cart</button>
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