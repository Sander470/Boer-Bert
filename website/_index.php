<body>
    <section class="hero">
        <div class="hero-content">
            <img class="hero-img" src="wwwroot/img/cowphoto.jpg">
            <p class="hero-title">Bos Mortuus</p>
            <p class="hero-subtitle">Vier vakantie met boer Bert!</p>
            
        </div>
    </section>
    <form class="bookHome1" action="book.php">
        <div class="bookHome2">
            <div class="startDate">
                <label for="start">Aankomst:</label>
                <input type="date" name="start" id="bookstart">
            </div>
            <div class="endDate">
                <label for="end">Vertrek:</label>
                <input type="date" name="end" id="bookend">
            </div>
            <div class="peopleAmount">
                <label for="quantity">Hoeveel mensen:</label>
                <input type="number" id="bookquantity" name="quantity" min="1" max="10" placeholder="0">
            </div>
        </div>
        <button class="submit" type="submit" >Go!</button>
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
            <img src="wwwroot/img/BoerBert.jpeg">
            <div class="aboutCard" onclick="location.href='#'">
                <div class="title">Over ons</div>
                <div class="abtext"></div>
            </div>
        </div>
    </section>