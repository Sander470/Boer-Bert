<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../style.css" />
    <title>Reserveer nu! - Bos Mortuus</title>
</head>

<body>
    <section class="bookform">
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

                <label for="quantity">Aantal personen:</label>
                <input type="number" id="quantity" name="quantity" min="1" max="10" placeholder="0" />
                <?php if (isset ($quantity)) {?>
                <input type="hidden" id="quantity" name="quantity" value="<?php echo htmlspecialchars($_GET['quantity']); ?>">
                 <?php } elseif (empty ($quantity)) { ?>
                    <input type="hidden" id="quantity" name="quantity" value="">
                 <?php } ?>

                <label for="start">Aankomst:</label>
                <input type="date" name="start" id="start" required>
                <?php if (isset ($start)) {?>
                <input type="hidden" id="start" name="start" value="<?php echo htmlspecialchars($_GET['start']); ?>">
                 <?php } elseif (empty ($start)) { ?>
                    <input type="hidden" id="start" name="start" value="">
                 <?php } ?>

                <label for="end">Vertrek:</label>
                <input type="date" name="end" id="end" required>
                <?php if (isset ($end)) {?>
                <input type="hidden" id="end" name="end" value="<?php echo htmlspecialchars($_GET['end']); ?>">
                 <?php } elseif (empty ($end)) { ?>
                    <input type="hidden" id="end" name="end" value="">
                 <?php } ?>

                <label>Tent opzet service:</label>
                <input type="checkbox" />
                <input class="submit" type="submit"/>
            </form>
            <script>
                document.getElementById('start').value = start;
                document.getElementById('end').value = end;
                document.getElementById('quantity').value = quantity;
            </script>
        </div>
        <div class="map">
            <img src="../img/BoerBert.jpeg" />
        </div>
    </section>
    <section class="cart" id="cart">
            <div class="Bookoptions">
                <p>Opties</p>
            </div>
            <div class="Bookcart"></div>
    </section>
</body>

</html>