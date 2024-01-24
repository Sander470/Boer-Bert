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
                <label for="bookStart">Aankomst</label>
                <input type="date" name="bookStart" id="bookStart" min="<?php echo date("Y-m-d"); ?>">
            </div>
            <div class="endDate">
                <label for="bookEnd">Vertrek</label>
                <input type="date" name="bookEnd" id="bookEnd" min="<?php echo date("Y-m-d"); ?>">
            </div>
            <div class="peopleAmount">
                <label for="bookQuantity">Hoeveel mensen</label>
                <input type="number" id="bookQuantity" name="bookQuantity" min="1" max="10" placeholder="0">
            </div>
        </div>
        <script>
            function go() {
                var bookQuantity = document.getElementById("bookQuantity").value;
                var bookStart = document.getElementById("bookStart").value;
                var bookEnd = document.getElementById("bookEnd").value;

                var obfuscatedData = btoa(JSON.stringify({
                    'bookQuantity': bookQuantity,
                    'bookStart': bookStart,
                    'bookEnd': bookEnd
                }))
                // save to local storage
                localStorage.setItem("obfuscatedData", obfuscatedData);

            };


            function validateForm() {
                var bookQuantity = document.getElementById("bookQuantity").value;
                var bookStart = document.getElementById("bookStart").value;
                var bookEnd = document.getElementById("bookEnd").value;

                if (new Date(bookStart) >= new Date(bookEnd)) {
                    document.getElementById("bookStart").value = "";
                    document.getElementById("bookEnd").value = "";
                    alert("Aankomstdatum moet vóór vertrekdatum liggen");
                    event.preventDefault();
                } else {
                    go();
                }
            };
        </script>
        <button class="submit" type="submit" value="GO" onclick="validateForm()">Go!</button>
    </form>
    <section class="infoHome">
        <p class="title">Informatie over de camping</p>
        <div class="cards">
            <div class="card">
                <div class="cardTitle">De camping</div>
                <img class="cardIMG" src="wwwroot/img/main/cowlogo.png">
                <div class="cardCon">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Fringilla est ullamcorper eget nulla. Orci nulla pellentesque dignissim enim. Malesuada fames ac turpis egestas maecenas pharetra convallis posuere morbi. Amet justo donec enim diam vulputate ut pharetra sit amet. Sit amet risus nullam eget felis. Sem viverra aliquet eget sit.</div>
            </div>
            <div class="card2">
                <div class="cardTitle">Activiteiten</div>
                <img class="cardIMG" src="wwwroot/img/main/cowlogo.png">
                <div class="cardCon">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Fringilla est ullamcorper eget nulla. Orci nulla pellentesque dignissim enim. Malesuada fames ac turpis egestas maecenas pharetra convallis posuere morbi. Amet justo donec enim diam vulputate ut pharetra sit amet.</div>
            </div>
            <div class="card">
                <div class="cardTitle">Plaatsen</div>
                <img class="cardIMG" src="wwwroot/img/main/cowlogo.png">
                <div class="cardCon">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Fringilla est ullamcorper eget nulla. Orci nulla pellentesque dignissim enim. Malesuada fames ac turpis egestas maecenas pharetra convallis posuere morbi. Amet justo donec enim diam vulputate ut pharetra sit amet. Sit amet risus nullam eget felis. </div>
            </div>
        </div>
    </section>
    <section>
        <div class="reviewHome">
            <div class="HomeReview">
                <p class="title">Reviews</p>
                <div class="bigReview">
                    <div class="bigStar">4.6/5</div>
                    <div class="bigName">gemiddelde beoordeling camping Bos Mortuus</div>
                    <div class="bigText"></div>
                </div>
            </div>
            <div class="revsHome">
                <div class="revHome">
                    <div class="stars">5/5</div>
                    <div class="revName">Lorem ipsum dolor</div>
                    <div class="rev">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Fringilla est ullamcorper eget nulla. Orci nulla pellentesque dignissim enim. Malesuada fames ac turpis egestas maecenas pharetra convallis posuere morbi. Amet justo donec enim diam vulputate ut pharetra sit amet. Sit amet risus nullam eget felis. Sem viverra aliquet eget sit. Auctor urna nunc id cursus metus aliquam eleifend mi. Phasellus egestas tellus rutrum tellus pellentesque eu tincidunt tortor.</div>
                </div>
                <div class="revHome2">
                    <div class="stars">4/5</div>
                    <div class="revName">tempor incididunt</div>
                    <div class="rev">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                </div>
                <div class="revHome">
                    <div class="stars">5/5</div>
                    <div class="revName">consectetur adipiscing</div>
                    <div class="rev">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Fringilla est ullamcorper eget nulla. Orci nulla pellentesque dignissim enim. </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="aboutHome">
            <img src="wwwroot/img/BoerBert.jpeg">
            <div class="aboutCard" onclick="location.href='#'">
                <p class="title">Over ons</p>
                <div class="abtext">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Fringilla est ullamcorper eget nulla. Orci nulla pellentesque dignissim enim. Malesuada fames ac turpis egestas maecenas pharetra convallis posuere morbi. Amet justo donec enim diam vulputate ut pharetra sit amet. Sit amet risus nullam eget felis. Sem viverra aliquet eget sit. Auctor urna nunc id cursus metus aliquam eleifend mi. Phasellus egestas tellus rutrum tellus pellentesque eu tincidunt tortor. Faucibus nisl tincidunt eget nullam. Luctus venenatis lectus magna fringilla urna porttitor rhoncus. Aliquam ut porttitor leo a diam. Cursus risus at ultrices mi tempus. Et pharetra pharetra massa massa ultricies mi quis.</div>
            </div>
        </div>
    </section>