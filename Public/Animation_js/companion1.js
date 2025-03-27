/**
 * @author Théo Deguin
*/
function openCompanion() {
    const companion = document.getElementById("companion");
    companion.style.right = "0%"; // Afficher le compagnon à droite
    window.addEventListener('click', VerifiedClicked);
    setTimeout(() => {
        companion.style.right = "-300%"; // Masquer le compagnon après 20 secondes
    }, 20000);
}

/**
 * @author Théo Cornu
 */
function VerifiedClicked() {
    var divTaskRegistration = document.getElementById('divTaskRegistration');
    var companio = document.getElementById("companion");

    if (divTaskRegistration != null) {
        if (divTaskRegistration.style.right == "4%") {
            companio.style.transition = "top 0.5s";
            companio.style.top = "320px"; // Baisser le compagnon de 50px lorsque la divTaskRegistration est affichée
        }
    }
}

window.addEventListener('load', openCompanion);
