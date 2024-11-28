document.addEventListener("DOMContentLoaded", function() {
    // Datu apstrāde diagrammai
    const labels = chartData.map(row => row.datuma_diena); // Datumu saraksts
    const values = chartData.map(row => row.pieteikumu_skaits); // Skaitļu saraksts

    // Diagrammas konfigurācija
    const ctx = document.getElementById('pieteikumuDiagramma').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'line', // Diagrammas veids: līkne
        data: {
            labels: labels, // Ass "x" vērtības (datumi)
            datasets: [{
                label: 'darbi', // The label exists but won't be shown
                data: values, // Ass "y" vērtības (skaits)
                backgroundColor: '#e69999', // Aizpildījuma krāsa
                borderColor: 'red', // Līnijas krāsa
                borderWidth: 2,
                fill: true, // Aizpildīt zem līnijas
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false // Hide the legend, so the label won't be shown
                },
                tooltip: {
                    enabled: true
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false
                    }
                },
                y: {
                    beginAtZero: true, // Skala sākas no nulles
                    ticks: {
                        stepSize: 1, // Ensures only whole numbers are displayed
                        callback: function(value) {
                            return Number.isInteger(value) ? value : null; // Display only integers
                        }
                    }
                }
            }
        }
    });
});
