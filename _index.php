<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="style.css"/>
    <title>
        <?php global $title; echo $title;?>
    </title>
</head>

<body>
<section class="hero">
    <div class="hero-content">
        <h1 class="hero-title">Bos Mortuus</h1>

        <h2 class="hero-subtitle">Vier vakantie met boer Bert!</h2>
    </div>
</section>
<div class="bookHome1">
    <div class="bookHome2">
        <label for="start">Start:</label>
        <input type="date" name="start" id="start">
        <label for="end">End:</label>
        <input type="date" name="end" id="end">
        <label for="quantity">Hoeveel mensen:</label>
        <input type="number" id="quantity" name="quantity" min="1" max="10">
    </div>
</div>
<section class="infoHome">
    <div class="title">Informatie over de camping</div>
    <div class="cards">
        <div class="card">
            <div class="cardTitle"></div>
            <div class="cardCon"></div>
        </div>
        <div class="card2">
            <div class="cardTitle"></div>
            <div class="cardCon"></div>
        </div>
        <div class="card">
            <div class="cardTitle"></div>
            <div class="cardCon"></div>
        </div>
    </div>
</section>
<section>
    <div class="reviewHome">
        <div class="HomeR">
            <div class="title">Reviews</div>
            <div class="bigR">
                <div class="bigStar"></div>
                <div class="bigName"></div>
                <div class="bigText"></div>
            </div>
        </div>
        <div class="revsHome">
            <div class="revHome">
                <div class="stars"></div>
                <div class="revName"></div>
                <div class="rev"></div>
            </div>
            <div class="revHome2">
                <div class="stars"></div>
                <div class="revName"></div>
                <div class="rev"></div>
            </div>
            <div class="revHome">
                <div class="stars"></div>
                <div class="revName"></div>
                <div class="rev"></div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="aboutHome">
        <img src="img/BoerBert.jpeg" alt="Boer Bert">
        <div class="abHome" onclick="location.href='#'">
            <div class="title">Over ons</div>
            <div class="abtext"></div>
        </div>
    </div>
</section>
</body>

</html>