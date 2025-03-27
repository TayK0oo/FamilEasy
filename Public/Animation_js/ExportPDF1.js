document.addEventListener('DOMContentLoaded', function() {
    

// Create the pdf when the button is clicked
document.getElementById('exportButton').addEventListener('click', function(event) {
    const selectedMonth = document.getElementById('monthPDF').value;
    const selectedYear = document.getElementById('yearPDF').value;
    
    // create new pdf and add our new canvas as an image
    var pdf = new jsPDF(); // 'l', 'pt', [reportPageWidth, reportPageHeight]
    pdf.text(`Recapitulatif de ${getMonthName(selectedMonth)} ${selectedYear}`, 20, 20);
    // pdf.addImage(pdfCanvas.toDataURL('image/png'), 'PNG', 0, 0);
    
    // download the pdf
    pdf.save(`recap_${selectedMonth}_${selectedYear}.pdf`);

    
});

// Fonction pour obtenir le nom du mois en lettres
function getMonthName(month) {
    const months = [
        "Janvier", "Février", "Mars", "Avril", "Mai", "Juin",
        "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre"
    ];

    return months[parseInt(month, 10) - 1];
}
});
