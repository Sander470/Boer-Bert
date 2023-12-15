<body>
    <section class="bookForm">
        <div class="bookingForm">
            <div class="title">Reserveren</div>
            <form>
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
                <?php if (isset($bookQuantity)) { ?>
                    <input type="hidden" id="bookQuantity" name="bookQuantity" value="<?php echo htmlspecialchars($_GET['bookQuantity']); ?>">
                <?php } elseif (empty($bookQuantity)) { ?>
                    <input type="hidden" id="bookQuantity" name="bookQuantity" value="">
                <?php } ?>

                <label for="bookStart">Aankomst:</label>
                <input type="date" name="bookStart" id="bookStart" required>
                <?php if (isset($bookStart)) { ?>
                    <input type="hidden" id="bookStart" name="bookStart" value="<?php echo htmlspecialchars($_GET['bookStart']); ?>">
                <?php } elseif (empty($bookStart)) { ?>
                    <input type="hidden" id="bookStart" name="bookStart" value="">
                <?php } ?>

                <label for="bookEnd">Vertrek:</label>
                <input type="date" name="bookEnd" id="bookEnd" required>
                <?php if (isset($bookEnd)) { ?>
                    <input type="hidden" id="bookEnd" name="bookEnd" value="<?php echo htmlspecialchars($_GET['bookEnd']); ?>">
                <?php } elseif (empty($bookEnd)) { ?>
                    <input type="hidden" id="bookEnd" name="bookEnd" value="">
                <?php } ?>

                <label>Tent opzet service:</label>
                <input type="checkbox" />
                <input class="submit" type="submit" />
            </form>
            <script>
                document.getElementById('bookStart').value = "<?php echo isset($_GET['bookStart']) ? htmlspecialchars($_GET['bookStart']) : ''; ?>";
                document.getElementById('bookEnd').value = "<?php echo isset($_GET['bookEnd']) ? htmlspecialchars($_GET['bookEnd']) : ''; ?>";
                document.getElementById('bookQuantity').value = "<?php echo isset($_GET['bookQuantity']) ? htmlspecialchars($_GET['bookQuantity']) : ''; ?>";
            </script>
        </div>
        <div class="map">
            <img src="wwwroot/img/BoerBert.jpeg" />
        </div>
    </section>
    <section id="cartBooking">
        <div class="bookOptions">
            Opties
            <div class="container">
                <div class="screen-togo">
                    <h2>To Go Menu</h2>
                    <ul class="menu-items">
                        <!--    Menu Item 1    -->
                        <li class="menu-item">
                            <img src="./img/plate__french-fries.webp" alt="French Fries with Ketchup" class="menu-image">
                            <div class="menu-item-dets">
                                <p class="menu-item-heading">French Fries with Ketchup</p>
                                <p class="g-price">$2.23</p>
                            </div>
                            <button class="add-button" data-title="French Fies with Ketchup" data-price="2.23">Add to Cart</button>
                        </li>
                        <!--    Menu Item 2    -->
                        <li class="menu-item">
                            <img src="./img/plate__salmon-vegetables.webp" alt="Salmon and Vegetables" class="menu-image">
                            <div class="menu-item-dets">
                                <p class="menu-item-heading">Salmon and Vegetables</p>
                                <p class="g-price">$8.99</p>
                            </div>
                            <button class="add-button" data-title="Salmon and Vegetables" data-price="8.99">Add to Cart</button>
                        </li>
                        <!--    Menu Item 3    -->
                        <li class="menu-item">
                            <img src="./img/plate__spaghetti-meat-sauce.webp" alt="Spaghetti with Sauce" class="menu-image">
                            <div class="menu-item-dets">
                                <p class="menu-item-heading">Spaghetti with Sauce</p>
                                <p class="g-price">$7.89</p>
                            </div>
                            <button class="add-button" data-title="Spaghetti with Sauce" data-price="7.89">Add to Cart</button>
                        </li>
                        <!--    Menu Item 4    -->
                        <li class="menu-item">
                            <img src="./img/plate__tortellini.webp" alt="Tortellini" class="menu-image">
                            <div class="menu-item-dets">
                                <p class="menu-item-heading">Tortellini</p>
                                <p class="g-price">$8.99</p>
                            </div>
                            <button class="add-button" data-title="Tortellini" data-price="8.99">Add to Cart</button>
                        </li>
                        <!--    Menu Item 5    -->
                        <li class="menu-item">
                            <img src="./img/plate__chicken-salad.webp" alt="Chicken Salad" class="menu-image">
                            <div class="menu-item-dets">
                                <p class="menu-item-heading">Chicken Salad</p>
                                <p class="g-price">$5.75</p>
                            </div>
                            <button class="add-button" data-title="Chicken Salad" data-price="5.75">Add to Cart</button>
                        </li>
                    </ul>
                </div>

                <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
                <script src='wwwroot/js/cart.js'></script>
            </div>
        </div>
        </div>

        <div class="bookCart">
            Winkelmandje
            <div class="screen-cart">
                <h2>Your Cart</h2>
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