/**
 * @author Théo Cornu
 * @author Lola Cohidon
*/

const scrollToTopButton = document.getElementById("btn-icon-content");

// Stockez les coordonnées de la recherche précédente
var lastSearchRect = null;

function Search() {
    // Get the text from the input field
    var inputText = document.getElementById("research").value;

    // Get the location of the text on the page by the value of the input text si celle ci n'est pas null
    var location = inputText == "" ? document.getElementById("HouseholdManagement") : document.getElementById(inputText);

    // Stockez les coordonnées actuelles pour une utilisation ultérieure
    lastSearchRect = location.getBoundingClientRect();

    // Effectuez le défilement vers la nouvelle position
    scrollToLocation();
}

function scrollToLocation() {
    if (lastSearchRect) {
        window.scrollTo({
            behavior: "smooth",
            top: lastSearchRect.y
        });
    }
}

// Ajoutez un gestionnaire d'événement pour le clic sur le bouton
scrollToTopButton.addEventListener("click", scrollToLocation);



// Variable to keep track of whether the checkboxes are expanded or not
var expanded = false;

// Function to show/hide the checkboxes
function showDescription() {
  // Get the element with the id "checkboxes"
  var checkboxes = document.getElementsByClassName('tdToNotDisplay')
  // Get the element with the id "selectbox"
  var select = document.getElementsByClassName("tdToDisplay");

  

  // If the checkboxes are not expanded
  if (!expanded) {
    select.style.borderBottomLeftRadius = "0px";
    select.style.borderBottomRightRadius = "0px";

    // Make checkboxes visible with animation
    checkboxes.style.display = "block";
    checkboxes.style.height = "0px";
    checkboxes.style.transition = "height 0.3s ease-out";
    var height = checkboxes.scrollHeight + "px";
    checkboxes.style.height = height;
    checkboxes.style.border = "1px solid #ccc";
    checkboxes.style.overflow = "auto";
   
    expanded = true;
  }
  // If the checkboxes are already expanded 
  else {
    
    // Make checkboxes invisible with animation
    checkboxes.style.height = "0px";
    checkboxes.style.transition = "height 0.3s ease-out";
    setTimeout(function() {
      checkboxes.style.display = "none";
    }, 300);
    expanded = false;
    
}



    

}

document.addEventListener("DOMContentLoaded", function () {
    // Sélectionne tous les éléments tdToDisplay
    var tdToDisplayElements = document.querySelectorAll('.tdToDisplay');
  
    // Ajoute un écouteur d'événement click à chaque élément tdToDisplay
    tdToDisplayElements.forEach(function (element) {
      element.addEventListener('click', function () {
        // Récupère l'élément supplémentaire contenant le descriptif et la valeur
        var extraInfo = element.querySelector('.extra-info');
  
        // Bascule la visibilité de l'élément supplémentaire
        extraInfo.classList.toggle('visible');
      });
    });
  });


// Ajoutez un gestionnaire d'événement pour le clic sur le bouton
scrollToTopButton.addEventListener("click", Search);




