/**
 * @author Théo Cornu
*/

function ShowGraph1() {
    const labels = JSON.parse(document.getElementById('labels').value);
    
    const data1 = JSON.parse(document.getElementById('data1').value);
    

    const ctx1 = document.getElementById('myChart1');
    

    new Chart(ctx1, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                label: 'Distribution Duration',
                data: data1,
                borderWidth: 0,
                // backgroundColor: (context) => {
                //     const index = context.dataIndex;
                //     const count = context.dataset.data.length;
                //     const startColor = [90, 74, 71]; // Couleur de départ (noir)
                //     const endColor = [236, 228, 227]; // Couleur de fin (blanc)
                //     const color = [];

                //     // Calculer les valeurs de couleur pour chaque canal (rouge, vert, bleu)
                //     for (let i = 0; i < 3; i++) {
                //         const startValue = startColor[i];
                //         const endValue = endColor[i];
                //         const value = Math.round(startValue + (endValue - startValue) * (index / (count - 1)));
                //         color.push(value);
                //     }

                //     return `rgb(${color.join(',')})`;
                // }
            }]
        },
        options: {
            responsive: true,
            onClick: (event, elements) => {
                if (elements.length > 0) {
                    const clickedIndex = elements[0].index;
                    const clickedLabel = labels[clickedIndex];
                    console.log(`Clicked label: ${clickedLabel}`);
                }
            }
            
        }
    });

    
};

function ShowGraph2(){
    const labels = JSON.parse(document.getElementById('labels').value);
    const ctx2 = document.getElementById('myChart2');
    const data2 = JSON.parse(document.getElementById('data2').value);
    
    const colors = ['36A2EB', 'FF6384', 'FF9F40', 'FFCD56', '4BC0C0', '9966FF'];
    const backgroundColors = colors.map((color, index) => {
        const repeatedIndex = index % colors.length;
        return `#${colors[repeatedIndex]}`;
    });

    new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Average Duration',
                data: data2,
                backgroundColor: backgroundColors,
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            indexAxis: 'y',
            plugins: {
                
                
            }
        }
    });
};

function ShowGraphs(){
    ShowGraph1();
    ShowGraph2();
};

window.addEventListener('load',ShowGraphs);