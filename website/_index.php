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
                <input type="date" name="bookStart" id="bookStart" max="">
            </div>
            <div class="endDate">
                <label for="bookEnd">Vertrek:</label>
                <input type="date" name="bookEnd" id="bookEnd" min="">
            </div>
            <div class="peopleAmount">
                <label for="bookQuantity">Hoeveel mensen:</label>
                <input type="number" id="bookQuantity" name="bookQuantity" min="1" max="10" placeholder="0">
            </div>
        </div>
        <script>
            var bookQuantity = document.getElementById("bookQuantity").value;
            var bookStart = document.getElementById("bookStart").value;
            var bookEnd = document.getElementById("bookEnd").value;

            function go() {
                var obfuscatedData = btoa(JSON.stringify({
                    'bookQuantity': bookQuantity,
                    'bookStart': bookStart,
                    'bookEnd': bookEnd
                }));

                // save to local storage
                localStorage.setItem("obfuscatedData", obfuscatedData);
            }

            function validateForm() {
                if (new Date(bookStart) >= new Date(bookEnd)) {
                    document.getElementById("bookStart").value = "";
                    document.getElementById("bookEnd").value = "";
                    alert("Aankomstdatum moet vóór vertrekdatum liggen");
                    event.preventDefault();
                } else {
                    go();
                }
            }
        </script>
        <button class="submit" type="submit" value="GO" onclick="validateForm()">Go!</button>
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