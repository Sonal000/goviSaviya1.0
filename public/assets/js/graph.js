google.load("visualization", {packages:["corechart"]});
google.setOnLoadCallback(drawChart1);
function drawChart1() {
  var data = google.visualization.arrayToDataTable([
    ['Day', 'All', 'Widgets'],
    ['Mon',  5,      3],
    ['Tue',  4,      2],
    ['Wed',  3,       9],
    ['Thu',  7,      5],
    ['Fri',  5,      4],
    ['Sat',  10,      6],
    ['Sun',  3,      4]
  ]);

  var options = {
    chartArea:{left:20,top:20,width:'100%',height:'80%'},
    colors: ["#ee5050" ,"#0948b3"],
 };

var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
  chart.draw(data, options);
}

// -------------------graph 2-------------------------

google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart2);

function drawChart2() {

  var data = google.visualization.arrayToDataTable([
    ['Task', 'Hours per Day'],
    ['Google',     70],
    ['Yahoo',      20],
    ['Yandex',  10]
  ]);

  var options = {
    colors: ["#ee5050" ,"#0948b3" , "#05a677"],
    legend: {postion: "right",textStyle: {color: 'rgb(74, 80, 115)', fontSize:12}},
    chartArea:{left:100,top:0,width:'100%',height:'100%'},
};

  var chart = new google.visualization.PieChart(document.getElementById('chart_div2'));

  chart.draw(data, options);
};

// -------------------graph 3-------------------------

google.charts.load("current",{ packages: ["corechart"] });
google.charts.setOnLoadCallback(drawChart3);

function drawChart3() {

  var data = google.visualization.arrayToDataTable([
    ['Task', 'Hours per Day'],
    ['Organic', 50],
    ['Direct', 20],
    ['Paid', 30]
  ]);

  var options = {
   pieHole: 0.5,
     colors: ["#ee5050" ,"#0948b3" , "#05a677"],
     legend: {postion: "right",textStyle: {color: 'rgb(74, 80, 115)', fontSize:12}},
     chartArea:{left:100,top:0,width:'100%',height:'100%'},
  };

  var chart = new google.visualization.PieChart(document.getElementById('piechart'));

  chart.draw(data, options);
};

// -------------------graph 4-------------------------

var options = {
    chart: {
      type: 'line',
      height:350,
      width:"100%",
      zoom: { enabled: false}
    },
    stroke:{
      width:3,
      colors:['rgb(238, 80, 80)'],
      curve:'smooth' , //(smooth , straight , stepline)
    },
    fill:{
      opacity:0.1,
      colors:"rgb(252, 235, 236)",
      type:'solid'  //(solid, gradient, pattern ,image)
    },
    series: [{
      name: '',
      data: [0,10,30,50,80,50,30],
      type: 'area'
      } 
    ],
    xaxis: {
      categories: ['Mon','Tue','Wed','Thu','Fri','Sat','Sun']
    }
  }
  
  var chart = new ApexCharts(document.querySelector("#chart"), options);
  
  chart.render();

// -----------map-----------------------------
google.charts.load('current', {
  'packages':['geochart'],
});
google.charts.setOnLoadCallback(drawRegionsMap);

function drawRegionsMap() {
  var data = google.visualization.arrayToDataTable([
    ['Country', 'Popularity'],
    ['Germany', 200],
    ['United States', 200],
    ['Brazil', 400],
    ['Canada', 300],
    ['France', 100],
    ['Egypt', 300],
    ['France', 500],
    ['Poland', 230],
  ]);

  var options = {
  colors:["rgb(238, 80, 80)"],
  };

  var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

  chart.draw(data, options);
}