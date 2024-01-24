<link rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"/>
<link rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0"/>

<body>
<div class="formContainer">
    <div class="bookingForm">
        <script defer>
            window.onload = function get() {
                // cleanup link
                var urlWithoutParams = window.location.href.split('?')[0];
                history.replaceState({}, document.title, urlWithoutParams);


                // get from local storage
                var obfuscatedData = localStorage.getItem("obfuscatedData");

                if (obfuscatedData) {
                    // deobfuscate data
                    var deobfuscatedData = JSON.parse(atob(obfuscatedData));

                    // log information
                    console.log(deobfuscatedData.bookQuantity);
                    console.log(deobfuscatedData.bookStart);
                    console.log(deobfuscatedData.bookEnd);

                    // set values to input
                    document.getElementById('numOfPeople').value = deobfuscatedData.bookQuantity;
                    document.getElementById('bookStart').value = deobfuscatedData.bookStart;
                    document.getElementById('bookEnd').value = deobfuscatedData.bookEnd;
                    
                    // clear local storage
                    localStorage.clear();
                }
            }
        </script>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo "<p class=\"confirmBook\">Form submitted successfully!";
            include "book_order.php";
        } else {
            echo "<p>Form not submitted.";
            include "book_form.php";
        }
        ?>
    </div>
    <div class="map">
        <img src="wwwroot/img/mapBM.jpg" alt="map of camping"/>
    </div>
</div>

    <!-- Chatbox and chatbot -->
    <div class="chatBot">
        <script type="module" src="wwwroot/js/chat.js" defer></script>
        <script type="javascript" src="wwwroot/js/converted.js" defer></script>
        <button class="chatbot-toggler">
            <span class="material-symbols-rounded">mode_comment</span>
            <span class="material-symbols-outlined">close</span>
        </button>
        <div class="chatbot">
            <header>
                <h2>BertBot</h2>
                <span class="close-btn material-symbols-outlined">close</span>
            </header>
            <ul class="chatbox">
                <li class="chat incoming">
                    <span class="material-symbols-outlined">smart_toy</span>
                    <p>Hi! Ik ben jouw camping chatbot.<br>Ik kan jouw helpen met het kiezen van de juiste plek en eventuele andere vragen.<br><br>Hoe kan ik je noemen?</p>
                </li>
            </ul>
            <div class="chat-input">
                <textarea placeholder="Enter a message..." spellcheck="false" required></textarea>
                <span id="send-btn" class="material-symbols-rounded">send</span>
            </div>
        </div>
    </div>
</body>