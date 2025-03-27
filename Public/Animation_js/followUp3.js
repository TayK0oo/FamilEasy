


/**
 * @author Lola Cohidon
 * @author Théo Cornu
*/
function showDetailed() {
    hideGlobal();

    var contentDiv;
    if (document.getElementById("content") == null) {
        var contentDiv = viewFollowUp.appendChild(document.createElement("div"));

        // Add id to contentDiv
        contentDiv.id = "content";
        contentDiv.innerHTML = "";

        // Add text for Detailed View
        var boutonDetails = [
            { id: "followCleaning", nom: "Cleaning", image: "Public/image/page_followUp/img_cleaning2.png" },
            { id: "followShopping", nom: "Shopping", image: "Public/image/page_followUp/img_shopping2.png" },
            { id: "followCooking", nom: "Cooking", image: "Public/image/page_followUp/img_cooking2.png" },
            { id: "followDishes", nom: "Dishes", image: "Public/image/page_followUp/img_dishes2.png" },
            { id: "followLaundry", nom: "Laundry", image: "Public/image/page_followUp/img_laundry2.png" },
            { id: "followChildrensCare", nom: "Children's Care", image: "Public/image/page_followUp/img_childrenCare2.png" },
            { id: "followChildsPlay", nom: "Child's Play", image: "Public/image/page_followUp/img_childsPlay2.png" },
            { id : "followChildrensJourney", nom: "Children's Journey", image: "Public/image/page_followUp/img_childrensJourney2.png" },
            { id : "followParentCare", nom: "Parent Care", image: "Public/image/page_followUp/img_parentCare2.png" },
            { id : "followAdministrative", nom: "Administrative", image: "Public/image/page_followUp/img_administrative2.png" },
            { id : "followPetCare", nom: "Pet Care", image: "Public/image/page_followUp/img_petCare2.png" },
            { id : "followGardening", nom: "Gardening", image: "Public/image/page_followUp/img_gardening2.png" },
            { id : "followdiy", nom: "DIY", image: "Public/image/page_followUp/img_diy2.png" },
            { id : "followhousehold", nom: "Household", image: "Public/image/page_followUp/img_householdManagement2.png" },
        ];

        

        /**
         * @author Théo Cornu
        */

        // Get the task percentages from the hidden input
        const taskPercentages = JSON.parse(document.getElementById('data3').value);

        // Get the global percentage from the hidden input
        const globalPercentages = JSON.parse(document.getElementById('data4').value);

        // Create a flip card for each task
        boutonDetails.forEach(function (bouton) {
            var flipCard = document.createElement("div");
            flipCard.className = "flip-card";

            var flipCardInner = document.createElement("div");
            flipCardInner.className = "flip-card-inner";

            // Front of the card

                var flipCardFront = document.createElement("div");
                flipCardFront.className = "flip-card-front";

                // Title of the card
                var heading = document.createElement("p");
                heading.className = "heading_8264";
                heading.innerText = "Task";
                flipCardFront.appendChild(heading);

                // Image of the task
                var imageFront = document.createElement("img");
                imageFront.src = bouton.image;
                imageFront.alt = bouton.nom;
                imageFront.className = "image";
                flipCardFront.appendChild(imageFront);

                // Name of the task
                var nameTask = document.createElement("p");
                nameTask.className = "nameTask";
                nameTask.innerText = bouton.nom;
                flipCardFront.appendChild(nameTask);

            // Back of the card
                flipCardInner.appendChild(flipCardFront);

                var flipCardBack = document.createElement("div");
                flipCardBack.className = "flip-card-back";

                // Percentage of the task
                var taskPercentage = taskPercentages[bouton.nom] || 0; // Get the percentage for the task, or 0 if it doesn't exist

                var data = document.createElement("div");
                data.className = "data";
                flipCardBack.appendChild(data);
                var pourcent = document.createElement("p");
                pourcent.className = "pourcent";
                pourcent.innerText = "Contribution : " + taskPercentage + "%"; // Display the task percentage
                data.appendChild(pourcent);

                // Global percentage of the task for the home
                var globalPercentage = globalPercentages[bouton.nom] || 0; // Get the percentage for the task, or 0 if it doesn't exist

                
                var pourcent2 = document.createElement("p");
                pourcent2.className = "HourGlobal";
                pourcent2.innerText = "Global " + globalPercentage + "h"; // Display the task hour
                flipCardBack.appendChild(pourcent2);

                // Image of the task
                var imageBack = document.createElement("img");
                imageBack.src = bouton.image;
                imageBack.alt = bouton.nom;
                imageBack.className = "image";
                flipCardBack.appendChild(imageBack);

            flipCardInner.appendChild(flipCardBack);

            flipCard.appendChild(flipCardInner);

            contentDiv.appendChild(flipCard);
        });

        // Change button color
        var suiviDButton = document.getElementById("suiviD");
        var suiviGButton = document.getElementById("suiviG");
        suiviDButton.style.backgroundColor = "#b3938e";
        suiviGButton.style.backgroundColor = "";
    }

}





/**
 * @author Théo Cornu
 */
function showGlobal() {
    var global;
    var contentDiv;
    if(contentDiv = document.getElementById("content")) {
    // Supprimer l'élément contentDiv du parent
    contentDiv.parentNode.removeChild(contentDiv);
    }

    if (document.getElementById("global") == null) {
    global = viewFollowUp.appendChild(document.createElement("div"));
    global.id = "global";

    var globalText = global.appendChild(document.createElement("p"));
    globalText.id = "globalText";
    globalText.innerText = "Année 2023/2024";
    
    var GraphGlobal = global.appendChild(document.createElement("canvas"));
    GraphGlobal.id = "myChart2";
    
    // Récupérez la valeur de l'élément 'data2' et convertissez-la en objet
    const data2 = JSON.parse(document.getElementById('data2').value);

    console.log(data2);
    // Un tableau pour stocker les tâches
    var tasks = [];

    // Un tableau pour stocker les valeurs
    var values = [];

    // Parcourez l'objet de données
    for (var year in data2) {
        for (var month in data2[year]) {
            for (var task in data2[year][month]) {
                // Ajoutez chaque tâche au tableau tasks
                tasks.push(task.trim());
                // Ajoutez chaque valeur au tableau values
                values.push(data2[year][month][task]);
            }
        }
    }

    // Maintenant, 'tasks' contient toutes les tâches et 'values' contient toutes les valeurs associées aux tâches
    console.log(tasks);
    console.log(values);
    
    
    const ctx2 = document.getElementById('myChart2');

    const colors = ['36A2EB', 'FF6384', 'FF9F40', 'FFCD56', '4BC0C0', '9966FF'];
    const backgroundColors = colors.map((color, index) => {
        const repeatedIndex = index % colors.length;
        return `#${colors[repeatedIndex]}`;
    });

    new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: tasks,
            datasets: [{
                label: 'Tasks Count on' + ' ' + month + '/' + year,
                data: values,
                backgroundColor: backgroundColors,
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            indexAxis: 'x',
            plugins: {
                
                
            }
        }
    });

    var suiviDButton = document.getElementById("suiviD");
    var suiviGButton = document.getElementById("suiviG");
    suiviDButton.style.backgroundColor = "";
    suiviGButton.style.backgroundColor = "#b3938e";
    }
}

/**
 * @author Théo Cornu
*/
function hideGlobal() {
    var global;
    if(global = document.getElementById("global")) {
        viewFollowUp.removeChild(global);
    }
}



/**
 * @author Théo Cornu
*/
function ActionDetail() {
    const viewFollowUp = document.getElementById("viewFollowUp");


    document.addEventListener("DOMContentLoaded", function() {
    
        
    });

    const suiviD = document.getElementById("suiviD");
    const suiviG = document.getElementById("suiviG");
    suiviD.addEventListener("click", showDetailed);
    suiviG.addEventListener("click", showGlobal);
}




window.addEventListener('load', ActionDetail);



