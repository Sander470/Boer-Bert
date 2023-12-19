<body>
    <section class="bookForm">
        <div class="bookingForm">
            <div class="title">Reserveren</div>
            <script>
                function get() {
                    // get from session storage
                    var one = sessionStorage.getItem("one"),
                        two = JSON.parse(sessionStorage.getItem("two"));

                    // log the information
                    console.log(one);
                    console.log(two);
                }
            </script>
            <input type="button" value="GET" onclick="get()">
            <form method="post" action="">
                <label for="name">Naam:</label>
                <input type="text" id="name" name="name" value="" required />

                <label for="tent">Tent:</label>
                <input type="checkbox" id="tent" name="tent" />
                <label for="camper">Camper:</label>
                <input type="checkbox" id="camper" name="camper" />
                <label for="caravan">Caravan:</label>
                <input type="checkbox" id="caravan" name="caravan" />

                <label for="bookQuantity">Aantal personen:</label>
                <input type="number" id="bookQuantity" name="bookQuantity" min="1" max="10" value="" placeholder="0" />

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
</body>

</html>