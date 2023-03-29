const textbox = document.createElement('div');
textbox.classList.add('textbox', 'textbox--hidden');
const textboxDialogue = document.createElement('p');
textboxDialogue.classList.add('textbox__dialogue');
textbox.appendChild(textboxDialogue);
document.body.appendChild(textbox);
const portrait = document.querySelector('.chatbot-icon');

let dialogue;
let dialoguePointer = 0;

switch(window.location.href.split('page=')[1]){
    case "home":
        dialogue = ["Bonjour, on est Ponito et Kohana ! Avez-vous déjà entendu parler des Pueblos ? C’est d’eux que nous descendons, un peuple Amérindien ancestral !", "Quand on dit Amérindiens, on pense souvent aux westerns et aux cow-boys, ou encore à l’Eldorado, mais les Amérindiens, c’est bien plus que ça ! Pas vrai Ponito ?", "Oh oui, c’est tellement plus vaste ! Et les Pueblos regroupent particulièrement bien l’origine de toute cette culture. Il y a même des ressemblances avec le reste du monde !"];
        break;

    case "about":
        dialogue = ["Voici l’histoire derrière cette exposition et les responsables ! Contactez-les si vous avez une demande, ils vous répondront, j’en suis certaine ! (Hésitez pas à leur proposer un stage aussi hein)"];
        break;

    case "visit":
        dialogue = ["Vous retrouverez ici toutes les informations nécessaires pour venir nous voir à l’exposition ! Si vous avez d’autres questions, n’hésitez pas à contacter l’agence. À bientôt !"];
        break;
    
    case "exhibition":
        dialogue = ["Voici un aperçu de ce que vous verrez à l’exposition, mais si vous voulez en savoir plus, venez nous voir à l’exposition ! Une surprise vous attend... À très vite !"];
        break;
}

portrait.addEventListener('click', () => {
    if(dialoguePointer < dialogue.length){
        if(dialoguePointer === 0){
            textbox.classList.remove('textbox--hidden');
        }
        textboxDialogue.innerHTML=dialogue[dialoguePointer];
        dialoguePointer++;
    } else {
        textbox.classList.add('textbox--hidden');
        dialoguePointer = 0;
    }
});