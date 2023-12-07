<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>
        <?php global $title;
        echo $title; ?>
    </title>
</head>

<body>
    <section class="hero">
        <div class="hero-content">
            <p class="hero-title">Bos Mortuus</p>
            <p class="hero-subtitle">Vier vakantie met boer Bert!</p>
        </div>
    </section>
    <form class="bookHome1">
        <div class="bookHome2">
            <div class="startDate">
                <label for="start">Aankomst:</label>
                <input type="date" name="start" id="start">
            </div>
            <div class="endDate">
                <label for="end">Vertrek:</label>
                <input type="date" name="end" id="end">
            </div>
            <div class="peopleAmount">
                <label for="quantity">Hoeveel mensen:</label>
                <input type="number" id="quantity" name="quantity" min="1" max="10" placeholder="0">
            </div>
        </div>
        <button class="submit" type="submit">Go!</button>
    </form>
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
            <div class="HomeReview">
                <div class="title">Reviews</div>
                <div class="bigReview">
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
            <img src="img/BoerBert.jpeg">
            <div class="aboutCard" onclick="location.href='#'">
                <div class="title">Over ons</div>
                <div class="abtext"></div>
            </div>
        </div>
    </section>