google.charts.load('current', {'packages': ['corechart']});

google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    let jsonData = $.ajax({
        url : '/map/charts/all',
        dataType: "json",
        async: false
    }).responseText;

    let data = new google.visualization.DataTable(jsonData);
    // var data = new google.visualization.DataTable();
    // data.addColumn('string', 'Topping');
    // data.addColumn('number', 'Slices');
    // data.addRows([
    //     ['Mushrooms', test],
    //     ['Onions', 1],
    //     ['Olives', 1],
    // ]);
    //
    var options = {'title': 'hello !', 'width':400, 'height': 300};

    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
    chart.draw(data, options);
}