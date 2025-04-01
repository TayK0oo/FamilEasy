/**
 * @author Théo Cornu
 * @author Lola Cohidon
 */

document.addEventListener("DOMContentLoaded", function() {
    const scrollToTopButton = document.getElementById("btn-icon-content");
    const searchInput = document.getElementById("research");
    let lastSearchRect = null;

    function scrollToLocation() {
        if (lastSearchRect) {
            window.scrollTo({
                behavior: "smooth",
                top: window.scrollY + lastSearchRect.top - 100 // Ajustement pour le header
            });
        }
    }

    function search() {
        const inputText = searchInput.value.toLowerCase().trim();
        console.log("Texte recherché:", inputText);

        const elements = Array.from(document.querySelectorAll('.action p'));
        console.log("Nombre d'éléments à parcourir:", elements.length);

        const element = elements.find(el => {
            const elementText = el.textContent.toLowerCase().trim();
            console.log("Comparaison:", elementText, "===", inputText);
            return elementText === inputText;
        });

        if (element) {
            console.log("Élément trouvé:", element);
            lastSearchRect = element.closest('.tdToDisplay').getBoundingClientRect();
            console.log("Coordonnées de l'élément:", lastSearchRect);
            scrollToLocation();
        } else {
            console.log("Aucun élément trouvé");
            // Handle case when no element is found
            alert("Aucun élément trouvé pour la recherche: " + inputText);
        }
    }





    scrollToTopButton.addEventListener("click", search);
    searchInput.addEventListener("change", search);

    // Gestion de l'affichage des détails
    const tdToDisplayElements = document.querySelectorAll('.tdToDisplay');
    tdToDisplayElements.forEach(function(element) {
        element.addEventListener('click', function() {
            const extraInfo = this.querySelector('.extra-info');
            extraInfo.classList.toggle('visible');
        });
    });

    // Gestion de la recherche dynamique
    searchInput.addEventListener('input', function() {
        const searchValue = this.value.toLowerCase();
        tdToDisplayElements.forEach(function(row) {
            const activity = row.querySelector('.action p').textContent.toLowerCase();
            row.closest('tr').style.display = activity.includes(searchValue) ? '' : 'none';
        });
    });
});
