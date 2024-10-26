var options = {
  chart: {
    width: 250,
    type: "donut",
  },
  labels: ["Male", "Female", "Kids"],
  series: [20, 45, 65],
  legend: {
    position: "bottom",
  },
  dataLabels: {
    enabled: false,
  },
  stroke: {
    width: 0,
  },
  colors: ["#116aef", "#ff3939", "#f1b15b", "#3e3e42", "#e91964"],
};
var chart = new ApexCharts(document.querySelector("#gender"), options);
chart.render();