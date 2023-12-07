<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Reserveer nu! - Bos Mortuus</title>
</head>

<body>
    <section class="bookform">
        <div class="formB">
            <div class="title">Reserveren</div>
            <form>
                <label for="name">Naam:</label>
                <input type="text" id="name" name="name"/>
                <label for="tent">Tent:</label>
                <input type="checkbox" id="tent" name="tent"/>
                <label for="camper">Camper:</label>
                <input type="checkbox" id="camper" name="camper"/>
                <label for="caravan">Caravan:</label>
                <input type="checkbox" id="caravan" name="caravan" />
                <label for="quantity">Aantal personen:</label>
                <input type="number" id="quantity" name="quantity" min="1" max="10" placeholder="0"/>
                <label for="start">Aankomst:</label>
                <input type="date" name="start" id="start">
                <label for="end" >Vertrek:</label>
                <input type="date" name="end" id="end">
                <label>Tent opzet service:</label>
                <input type="checkbox" />
                <input class="submit" type="submit" />
            </form>
        </div>
        <div class="map">
            <img src="img/BoerBert.jpeg" />
        </div>
    </section>
</body>
</html>