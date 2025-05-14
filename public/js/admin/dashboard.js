// 1. set data then use that data to make cofig
// 2. create chart new Chart(<canvas> element, config);
//   Using ChartJs libraray CDNs

let totalEarning = document.querySelector('.totalEarning');
let notPaid      = totalEarning.dataset.totalbuyamount-totalEarning.dataset.totalpaid;

if (!totalEarning.dataset.totalbuyamount) {
    notPaid = 4;
}
    
const overviewEarning = {
    datasets: [{
        data: [
            totalEarning.dataset.totalpaid,
            notPaid],
        backgroundColor: [
            'rgb(39, 198, 219)',
            'rgb(23, 28, 36)'
        ],
        hoverOffset: 2,
        borderWidth: 0,
        cutout: '85%'
    }]
};

const configForEarning = {
    type: 'doughnut',
    data: overviewEarning,
    options: {
        maintainAspectRatio: false
    }
};

let btc       = new Chart(document.getElementById('btc'), configForEarning);
let totalUser = document.querySelector('.totalUser');

const overviewUser = {
    datasets: [{
        data: [
            totalUser.dataset.userhasorder,
            totalUser.dataset.totaluser-totalUser.dataset.userhasorder],
        backgroundColor: [
            'rgb(39, 198, 219)',
            'rgb(23, 28, 36)'
        ],
        hoverOffset: 2,
        borderWidth: 0,
        cutout: '85%'
    }]
};

const configForUser = {
    type: 'doughnut',
    data: overviewUser,
    options: {
        maintainAspectRatio: false
    }
};

let dollar       = new Chart(document.getElementById('dollar'), configForUser);
let productChart = document.querySelector('.productChart');


const data = {
    labels: productChart.dataset.names.split('-'),
    datasets: [{
        label: 'My First Dataset',
        data: productChart.dataset.values.split('-'),
        backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(4, 112, 235)',
            'rgb(14, 62, 235)',
            'rgb(255, 205, 86)'
        ],
        hoverOffset: 4
    }]
};

const config = {
    type: 'doughnut',
    data: data,
    options: {
        maintainAspectRatio: false
    }
};

let mychart = new Chart(document.getElementById('productCanvas'), config)