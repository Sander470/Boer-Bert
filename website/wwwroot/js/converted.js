class CampingChatbot {
    constructor() {
        this.name = "";
        this.toilet = "";
        this.speeltuin = "";
    }

    stopProgram() {
        console.log("Isgoed. Doei doei!");
        process.exit();
    }

    getUserInfo(um, phase, callback) {
        switch (phase) {
            case 0:
                this.name = um;
                return `Leuk je te ontmoeten, ${this.name}! Ik zal je nu aan paar vragen stellen om de beste plek voor jouw uit te kiezen.\n\nMoet ik een kampeerplek regelen die niet te ver van het toilet is?\n(Ja/Nee)`;
            case 1:
                this.toilet = um;
                return "Wil je een plekje dichtbij de speeltuin?\n\n(Ja/Nee)"
            case 2:
                this.speeltuin = um;
                return this.suggestCampingLocation();
            case 3:
                return this.chatBot(um, callback);
            default:
                return "ERROR: Phase got totally destroyed lmao. Please refresh your browser"
        }
    }

    suggestCampingLocation() {
        let locationtxtStart = (`${this.name}, gebaseerd op jouw keuzes, raad ik deze plek aan:`);
        let locationtxtEnd = ("is de juiste plek voor jou!\n\nAls je nog verdere vragen hebt kun je die gerust stellen!")
        if (this.toilet.toLowerCase().includes("ja") && this.speeltuin.toLowerCase().includes("ja")) {
            return (`${locationtxtStart} A ${locationtxtEnd}`);
        } else if (this.toilet.toLowerCase().includes("ja") && this.speeltuin.toLowerCase().includes("nee")) {
            return (`${locationtxtStart} B ${locationtxtEnd}`);
        } else if (this.toilet.toLowerCase().includes("nee") && this.speeltuin.toLowerCase().includes("ja")) {
            return (`${locationtxtStart} C ${locationtxtEnd}`);
        } else if (this.toilet.toLowerCase().includes("nee") && this.speeltuin.toLowerCase().includes("nee")) {
            return (`${locationtxtStart} D ${locationtxtEnd}`);
        } else if (!(this.toilet.toLowerCase().includes("ja") || this.toilet.toLowerCase().includes("nee")) || !(this.speeltuin.toLowerCase().includes("ja") || this.speeltuin.toLowerCase().includes("nee"))) {
            return  'Het was voor mij niet duidelijk, ik begin suggestiecheck opnieuw!\n\nMoet ik een kampeerplek regelen die niet te ver van het toilet is?\n(Ja/Nee)';
        }
    }

    chatBot(um, callback) {
        let userInput = um.toLowerCase();
    
        fetch('./wwwroot/js/knowledge_base.json')
            .then(response => response.json())
            .then(data => {
                console.log(data);
                console.log(userInput);
    
                let answer = "Ik weet het antwoord op deze vraag niet.\nJe kan altijd bellen met een medewerker: +31 6 12345678"; // Default answer
    
                for (const qna of data.questions) {
                    const lowercaseQuestion = qna.question.toLowerCase();
                    console.log(lowercaseQuestion);
    
                    if (userInput.includes(lowercaseQuestion)) {
                        console.log(qna.answer);
                        answer = qna.answer;
                        break;
                    }
                    console.log("did not find a match :(")
                }
    
                callback(answer); // Call the callback function with the result
            })
            .catch(error => {
                console.error('Error loading JSON file:', error);
                callback("Error loading knowledge base"); // Handle errors by calling the callback with an error message
            });
    }
}

export default CampingChatbot;