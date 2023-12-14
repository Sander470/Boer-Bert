<head>
<link rel="cartJS" href="wwwroot/js/cart.js" />
</head>
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
            <div class="bookContent">
                <div class="shopping-cart">
                    <div class="product">
                        <div class="product-image">
                        </div>
                        <div class="product-details">
                            <div class="product-title">Dingo Dog Bones</div>
                            <div class="product-price">12.99</div>
                            <div class="product-adding">
                                <button class="addProduct">
                                    Add
                                </button>
                            </div>
                            <div class="product-line-price">25.98</div>
                        </div>

                        <div class="product">
                            <div class="product-image">
                            </div>
                            <div class="product-details">
                                <div class="product-title">Nutro™ Adult Lamb and Rice Dog Food</div>
                                <div class="product-price">45.99</div>
                                <div class="product-adding">
                                    <button class="addProduct">
                                        Add
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bookCart">
            Winkelmandje
            <div class="bookContent">
                <div class="shopping-cart">
                    <div class="product">
                        <div class="product-image">
                        </div>
                        <div class="product-details">
                            <div class="product-title">Dingo Dog Bones</div>
                        </div>
                        <div class="product-price">12.99</div>
                        <div class="product-removal">
                            <button class="remove-product">
                                Remove
                            </button>
                        </div>
                        <div class="product-line-price">25.98</div>
                    </div>

                    <div class="product">
                        <div class="product-image">
                        </div>
                        <div class="product-details">
                            <div class="product-title">Nutro™ Adult Lamb and Rice Dog Food</div>
                        </div>
                        <div class="product-price">45.99</div>
                        <div class="product-removal">
                            <button class="remove-product">
                                Remove
                            </button>
                        </div>
                    </div>
                </div>
                <div class="product-line-price">45.99</div>

                <div class="totals">
                    <div class="totals-item">
                        <label>Total</label>
                        <div class="totals-value" id="cart-total">71.97</div>
                    </div>
                </div>
                <button class="submit" id="checkout">Checkout</button>
            </div>
        </div>
    </section>
</body>

</html>