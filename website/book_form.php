<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <p class="title">Reserveren</p>

    <div class="formRow inlineFormRow">
        <input type="text" id="firstName" name="firstName" required placeholder="Voornaam">
        <input type="text" name="infix" id="infix" placeholder="">
        <input type="text" name="lastName" id="lastName" required placeholder="Achternaam">
    </div>

    <div class="formRow inlineFormRow">
    <label for="mail">E-mail</label>
        <input type="email" id="mail" name="mail" class="formInput" required placeholder="E-mail">
    </div>

    <div class="formRow inlineFormRow">
        <label for="birthDate">Geboortedatum</label>
        <input type="date" id="birthDate" name="birthDate" required class="formInput">
    </div>

    <div class="formRow inlineFormRow">
        <label for="fieldNr">Veldnummer</label>
        <select name="fieldNr" id="fieldNr" class="formInput">
            <option value="A0">A0</option>
            <option value="A1">A1</option>
            <option value="A2">A2</option>
            <option value="A3">A3</option>
            <option value="A4">A4</option>
            <option value="A5">A5</option>
            <option disabled>etc...</option>
        </select>
    </div>

    <div class="formRow inlineFormRow">
        <label for="placeType">Plaats type</label>
        <select name="placeType" id="placeType" class="formInput">
            <option value="camper">camper</option>
            <option value="caravan">caravan</option>
            <option value="tent">tent</option>
        </select>
    </div>

    <div class="formRow inlineFormRow">
        <label for="bookQuantity">Aantal personen</label>
        <input class="formInput" type="number" id="numOfPeople" name="numOfPeople" min="1" max="10" placeholder="0">
    </div>

    <div class="formRowStack">
        <div class="formRow stackedFormRow">
            <label for="bookStart">Aankomst</label>
            <input class="formInput" type="date" name="bookStart" id="bookStart" value="" min="<?php echo date("Y-m-d"); ?>" required>
        </div>

        <div class="formRow stackedFormRow">
            <label for="bookEnd">Vertrek</label>
            <input class="formInput" type="date" name="bookEnd" id="bookEnd" value="" min="<?php echo date("Y-m-d"); ?>" required>
        </div>
    </div>

    <div class="formRowStack">
        <div class="formRow stackedFormRow">
            <input type="text" id="street" name="street" placeholder="straat" required>
            <input type="text" id="houseNr" name="houseNr" placeholder="huisnummer" required>
        </div>
        <div class="formRow stackedFormRow">
            <input type="text" id="postalCode" name="postalCode" placeholder="postcode" required>
            <input type="text" id="city" name="city" placeholder="stad" required>
        </div>
        <div class="formRow stackedFormRow">
            <select name="country" id="country" class="formInput">
                <option value="Nederland">Nederland</option>
                <option value="Deutschland">Deutschland</option>
                <option value="England">England</option>
                <option value="France">France</option>
                <option value="etc..." disabled>etc...</option>
            </select>
        </div>
    </div>

    <div class="formRow inlineFormRow">
        <input type="text" id="phoneNr" name="phoneNr" placeholder="telefoonnummer">
    </div>

    <div class="formRow inlineFormRow">
        <label for="setupHelp">Hulp bij opzetten tent/caravan/camper</label>
        <select name="setupHelp" id="setupHelp" class="formInput">
            <option value="ja">ja</option>
            <option value="nee" selected>nee</option>
        </select>
    </div>

    <input class="submit" type="submit">
</form>