<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />

<body>
    <section class="bookForm">
        <div class="bookingForm">
            <p class="title">Reserveren</p>
            <script>
                window.onload = function get() {
                    // get from session storage
                    var bookQuantity = sessionStorage.getItem("bookQuantity");
                    var bookStart = sessionStorage.getItem("bookStart");
                    var bookEnd = sessionStorage.getItem("bookEnd");

                    // log the information
                    console.log(bookQuantity);
                    console.log(bookStart);
                    console.log(bookEnd);

                    // Set values to input fields
                    document.getElementById('bookQuantity').value = bookQuantity;
                    document.getElementById('bookStart').value = bookStart;
                    document.getElementById('bookEnd').value = bookEnd;
                }
            </script>
            <form method="post" action="">
                <label for="name">Naam:</label>
                <input type="text" id="name" name="name" required />

                <label for="tent">Tent:</label>
                <input type="checkbox" id="tent" name="tent" />
                <label for="camper">Camper:</label>
                <input type="checkbox" id="camper" name="camper" />
                <label for="caravan">Caravan:</label>
                <input type="checkbox" id="caravan" name="caravan" />

                <label for="bookQuantity">Aantal personen:</label>
                <input type="number" id="bookQuantity" name="bookQuantity" min="1" max="10" placeholder="0" />

                <label for="bookStart">Aankomst:</label>
                <input type="date" name="bookStart" id="bookStart" value="" required>

                <label for="bookEnd">Vertrek:</label>
                <input type="date" name="bookEnd" id="bookEnd" value="" required>

                <label>Tent opzet service:</label>
                <input type="checkbox" />
                <input class="submit" type="submit" />
            </form>
        </div>
        <div class="map">
            <img src="wwwroot/img/BoerBert.jpeg" />
        </div>
    </section>
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