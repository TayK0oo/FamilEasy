/**
 * @author Théo Cornu
*/

// Fonction pour changer le contenu de la page après un clic sur le bouton

function DisplayHomeRegistration() {
    const HeadForm = document.getElementById("HeadForm");
    const HomeForm = document.getElementById("HomeForm");
    const infoSend = document.getElementsByClassName("infoSend")[0];
    const FootForm = document.getElementById("FootForm");
    const labelcode = document.getElementById("labelcode");

    document.getElementById("lienCreatHome").addEventListener("click", function(event) {
        while (HeadForm.firstChild) {
            HeadForm.removeChild(HeadForm.firstChild);
        }
        const heading = document.createElement("h1");
        heading.textContent = "Create Home";
        HeadForm.appendChild(heading);

        const paragraph = document.createElement("p");
        paragraph.textContent = "Create a home to join your family";
        HeadForm.appendChild(paragraph);

        HomeForm.setAttribute("action", "index.php?action=HomeRegistration");

        infoSend.appendChild(document.createElement("br"));
        const labelname = document.createElement("label");
        labelname.setAttribute("id", "labelname");
        labelname.setAttribute("for", "NameHome");
        labelname.textContent = "Name Home";
        infoSend.appendChild(labelname);
        infoSend.appendChild(document.createElement("br"));

        const inputname = document.createElement("input");
        inputname.setAttribute("type", "text");
        inputname.setAttribute("id", "nameHome");
        inputname.setAttribute("name", "NameHome");
        inputname.setAttribute("class", "inputs");
        inputname.setAttribute("required", "required");
        infoSend.appendChild(inputname);
        infoSend.appendChild(document.createElement("br"));
        
        FootForm.remove();
    
    });

    
}

window.addEventListener('load', DisplayHomeRegistration);
    