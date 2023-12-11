<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" type="image/png" href="/bos-mortuus/website/img/cowlogo.png"/>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <div class="navbar">
        <img src="/bos-mortuus/website/img/cowlogo.png" alt="Logo">
        <a href="/bos-mortuus/website/index.php">Home</a>
        <a href="#">Over ons</a>
        <a href="#">Activiteiten</a>
        <a href="/bos-mortuus/website/book/book.php">Reserveer</a>
        <a href="#">FAQ</a>
        <a href="#">Registreer/Log in</a>
            <select class="dropdownlang" name="lang" id="lang">
                <option selected value="ne">NL</option>
                <option value="du">DE</option>
                <option value="fr">FR</option>
                <option value="en">EN</option>
            </select>
    </div>

    <?php global $childView; include $childView ?>

    <div class="footer">
        <div class="footercontent">
            <svg height="100" width="5">
                <line x1="0" y1="0" x2="0" y2="200" />
            </svg>
            <a href="#">Privacy Notice</a>
            <svg height="100" width="5">
                <line x1="0" y1="0" x2="0" y2="200" />
            </svg>
            <a href="#">Toegankelijkheid</a>
            <svg height="100" width="5">
                <line x1="0" y1="0" x2="0" y2="200" />
            </svg>
            <a href="#">Disclaimer</a>
            <svg height="100" width="5">
                <line x1="0" y1="0" x2="0" y2="200" />
            </svg>
            <a href="#">Algemene voorwaarden</a>
            <svg height="100" width="5">
                <line x1="0" y1="0" x2="0" y2="200" />
            </svg>
            <div class="pay">
                <a href="#">Betaalmogelijkheden</a>
                <div class="payimg">
                    <img src="/bos-mortuus/website/img/IDEAL_Logo.png" />
                    <img src="/bos-mortuus/website/img/PayPal-Logo-PNG.png" />
                </div>
            </div>
        </div>
        <div class="copyright">Copyright © CookieMonsters™</div>
    </div>
</body>

</html>