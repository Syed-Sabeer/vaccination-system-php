var options = {
  chart: {
    width: 360,
    type: "pie",
  },
  labels: ["Cardiology", "Orthopedics", "Neurology", "Gastroenterology", "Anatomy"],
  series: [50, 40, 30, 20, 10],
  legend: {
    position: "bottom",
  },
  dataLabels: {
    enabled: false,
  },
  stroke: {
    width: 0,
  },
  colors: [
    "#238781", "#4f9f9a", "#7bb7b3", "#a7cfcd", "#d3e7e6", "#e9f3f2"
  ],
};
var chart = new ApexCharts(document.querySelector("#total-department"), options);
chart.render();