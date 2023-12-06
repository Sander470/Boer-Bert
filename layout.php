<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <div class="navbar">
        <img src="img/cowlogo.png">
        <a href="_index.html">Home</a>
        <a href="#">Over ons</a>
        <a href="#">Activiteiten</a>
        <a href="#">Reserveer</a>
        <a href="#">FAQ</a>
        <a href="#">Registreer/Log in</a>
            <select class="dropdown" name="lang" id="lang">
                <option selected value="ne">Ne</option>
                <option value="du">De</option>
                <option value="fr">Fr</option>
                <option value="en">En</option>
            </select>
    </div>

    <?php global $childView; include $childView ?>

    <div class="footer">
        <div class="fcon">
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
                    <img src="img/IDEAL_Logo.png" />
                    <img src="img/PayPal-Logo-PNG.png" />
                </div>
            </div>
        </div>
        <div class="copyright">Copyright © CookieMonsters™</div>
    </div>
</body>

</html>