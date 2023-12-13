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

            </div>
        </div>
        <div class="bookCart">
            Winkelmandje
        </div>
    </section>
</body>

</html>