


/**
 * @author Lola Cohidon
 * @author Théo Cornu
*/
function showDetailed() {
    hideGlobal();

    var contentDiv;
    if (document.getElementById("content") == null) {
        var contentDiv = viewFollowUp.appendChild(document.createElement("div"));
        contentDiv.id = "content";
        contentDiv.innerHTML = "";

        const tasksData = JSON.parse(document.getElementById('tasksData').value);
        const taskPercentages = JSON.parse(document.getElementById('data3').value);
        const globalPercentages = JSON.parse(document.getElementById('data4').value);

        console.log(tasksData);
        console.log(taskPercentages);
        console.log(globalPercentages);

        tasksData.forEach(function (task) {
            var flipCard = document.createElement("div");
            flipCard.className = "flip-card";

            var flipCardInner = document.createElement("div");
            flipCardInner.className = "flip-card-inner";

            // Front of the card
            var flipCardFront = document.createElement("div");
            flipCardFront.className = "flip-card-front";

            var heading = document.createElement("p");
            heading.className = "heading_8264";
            heading.innerText = "Task";
            flipCardFront.appendChild(heading);

            var imageFront = document.createElement("img");
            imageFront.src = "Public/image/page_reference/" + task.image;
            imageFront.alt = task.activity;
            imageFront.className = "image";
            flipCardFront.appendChild(imageFront);

            var nameTask = document.createElement("p");
            nameTask.className = "nameTask";
            nameTask.innerText = task.activity;
            flipCardFront.appendChild(nameTask);

            flipCardInner.appendChild(flipCardFront);

            // Back of the card
            var flipCardBack = document.createElement("div");
            flipCardBack.className = "flip-card-back";

            var taskPercentage = taskPercentages[task.activity] || 0;
            var data = document.createElement("div");
            data.className = "data";
            flipCardBack.appendChild(data);
            var pourcent = document.createElement("p");
            pourcent.className = "pourcent";
            pourcent.innerText = "Contribution : " + taskPercentage + "%";
            data.appendChild(pourcent);

            var globalPercentage = globalPercentages[task.activity] || 0;
            var pourcent2 = document.createElement("p");
            pourcent2.className = "HourGlobal";
            pourcent2.innerText = "Global " + decimalToHoursMinutes(globalPercentage);
            flipCardBack.appendChild(pourcent2);

            var imageBack = document.createElement("img");
            imageBack.src = "Public/image/page_reference/" + task.image;
            imageBack.alt = task.activity;
            imageBack.className = "image";
            flipCardBack.appendChild(imageBack);

            flipCardInner.appendChild(flipCardBack);
            flipCard.appendChild(flipCardInner);
            contentDiv.appendChild(flipCard);

        });

        var suiviDButton = document.getElementById("suiviD");
        var suiviGButton = document.getElementById("suiviG");
        suiviDButton.style.backgroundColor = "#b3938e";
        suiviGButton.style.backgroundColor = "";
    }
}


// Fonction pour convertir les heures décimales en format "Xh Ymin"
function decimalToHoursMinutes(decimalHours) {
    const hours = Math.floor(decimalHours);
    const minutes = Math.round((decimalHours - hours) * 60);

    // Gestion du cas où les minutes arrondies dépassent 59
    if (minutes >= 60) {
        return `${hours + 1}h`;
    }
    if (minutes === 0) {
        return `${hours}h`;
    }

    return `${hours}h ${minutes.toString().padStart(2, '0')}min`;
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



