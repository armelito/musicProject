const $drumkit = document.querySelector('.drumkit') /* on récupère la classe drumkit dans le dom*/
const $buttons = Array.from($drumkit.querySelectorAll('.button')) /* renvoi quasi un tableau => soucis de perf, c'est pourquoi on rajoute Array.from pour avoir les propriétés d'un vrai tableau  */ 
const $sounds = Array.from($drumkit.querySelectorAll('.sound')) /* All car il y a plusieurs sons */ 

console.log($drumkit)
console.log($buttons)
console.log($sounds)

/* ancienne version

for(let i = 0; i < $buttons.length; i++)
{
    const $button = $buttons[i]
    console.log($button)
}
*/
window.addEventListener('load', () =>
{
    TweenMax.to('.start_article', 0.65, {opacity:1, top:-45})
})

for (const $button of $buttons)
{
    $button.addEventListener('mousedown', (event) => /* addEventListener ecouteur d'evenement*/
    {
        event.preventDefault()
        playSound($button.dataset.sound) /*permet de recupérer le son en question dans la date*/
        console.log($button.dataset.sound) /* dataset pour récupérer tous les éléments avec la data-XXX */ 
    })
}

/* ancienne version 
function playSound(soundName)
{
} */ 

document.addEventListener('keydown', (event) => 
{
    const $button = $buttons.find((element) => element.classList.contains(`key-${event.keyCode}`))
    if($button)
    {
        playSound($button.dataset.sound)
    }
})

const playSound = (soundName) => 
{
    const $sound = $sounds.find((element) => element.classList.contains(soundName))

    
    $sound.currentTime = 0
    $sound.play()
}

/* l'idée est de créer un tableau et d'appeler la méthode find. Il nous passe une fonction, qui en paramètre contient element. 
il va boucler et à chaque boucle "element" va être égal aux éléments du tableau. Si le fonction renvoie vrai = il nous renvoi l'element, si c'est pas l'elt qu'on cherche, il renvoi false et recherche à nouveau */  

/* "mousedown" pour + de réactivité */ 

/* find = nouvelle technique pour récupérer un son précis, voir explication plus bas */
