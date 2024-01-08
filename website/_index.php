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
                <label for="bookStart">Aankomst:</label>
                <input type="date" name="bookStart" id="bookStart">
            </div>
            <div class="endDate">
                <label for="bookEnd">Vertrek:</label>
                <input type="date" name="bookEnd" id="bookEnd">
            </div>
            <div class="peopleAmount">
                <label for="bookQuantity">Hoeveel mensen:</label>
                <input type="number" id="bookQuantity" name="bookQuantity" min="1" max="10" placeholder="0">
            </div>
        </div>
        <script>
            function go() {
        // variables
        var bookQuantity = document.getElementById("bookQuantity").value;
        var bookStart = document.getElementById("bookStart").value;
        var bookEnd = document.getElementById("bookEnd").value;

        // save to session storage
        sessionStorage.setItem("bookQuantity", bookQuantity);
        sessionStorage.setItem("bookStart", bookStart);
        sessionStorage.setItem("bookEnd", bookEnd);
            }
        </script>
        <button class="submit" type="submit" value="GO" onclick="go()">Go!</button>
    </form>
    <section class="infoHome">
        <p class="title">Informatie over de camping</p>
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
                <p class="title">Reviews</p>
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
                <p class="title">Over ons</p>
                <div class="abtext"></div>
            </div>
        </div>
    </section>