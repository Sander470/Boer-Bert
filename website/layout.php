<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php global $title;
            echo $title; ?></title>
    <link rel="stylesheet" href="wwwroot/css/style.css" />
    <link rel="icon" href="wwwroot/img/cowlogo.ico" />

    <meta property="og:title" content="Bos Mortuus - Development Branch">
    <meta property="og:description" content="Vier vakantie met Boer Bert!<br> <br>De vakantieplek voor vrienden en familie!">
    <meta property="og:image" content="https://dev.bosmortuus.nl/wwwroot/img/main/cowlogo.png">
    <meta property="og:url" content="https://dev.bosmortuus.nl/">
</head>

<body>
    <div class="navbar">
        <img src="wwwroot/img/main/cowlogo.png" alt="Logo">
        <a href="index.php">Home</a>
        <a href="#">Over ons</a>
        <a href="#">Activiteiten</a>
        <a href="book.php">Reserveer</a>
        <a href="#">FAQ</a>
        <a href="#">Registreer/Log in</a>
        <select class="dropdownLang" name="lang" id="lang">
            <option selected value="nl">NL</option>
            <option value="du">DE</option>
            <option value="fr">FR</option>
            <option value="en">EN</option>
        </select>
    </div>

    <?php global $childView;
    include $childView ?>

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
                    <img src="wwwroot/img/main/IDEAL_Logo.png" />
                    <img src="wwwroot/img/main/PayPal-Logo-PNG.png" />
                </div>
            </div>
        </div>
        <div class="copyright">Copyright © CookieMonsters™</div>
    </div>
</body>

</html>