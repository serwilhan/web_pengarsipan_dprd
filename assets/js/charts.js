var clientes = document.getElementById('chartClientes').getContext('2d');
var chart = new Chart(clientes, {
    type: 'line',
    data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agt", "Sept", "Okt", "Nov", "Des"],
        datasets: [{
            label: "Surat Masuk",
            backgroundColor: '#fff',
            borderColor: '#4f48ec',
            data: [50, 30, 20, 60, 35, 55, 90, 80, 100]
        }]

    }
});

var receitas = document.getElementById('chartReceitas').getContext('2d');
var chart = new Chart(receitas, {
    type: 'line',
    data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agt", "Sept", "Okt", "Nov", "Des"],
        datasets: [{
            label: "Surat Keluar",
            backgroundColor: '#fff',
            borderColor: '#38d6eb',
            data: [50, 30, 20, 60, 35, 55, 90, 80, 100]
        }]

    }
});