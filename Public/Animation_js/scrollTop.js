/**
 * @author Théo Cornu
*/

function Top() {
    
    function scrollTop() {
        window.scrollTo({
            behavior: "smooth",
            top: 0
            
        });
    }

    // Sélectionnez le bouton pour remonter en haut
    const scrollToTopButton = document.querySelector(".scroll-to-top");

    // Ajoutez un gestionnaire d'événement pour le clic sur le bouton
    scrollToTopButton.addEventListener("click", scrollTop);
    
}

window.addEventListener("load", Top);