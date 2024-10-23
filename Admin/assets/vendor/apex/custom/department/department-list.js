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
    "#116aef",
    "#02b86f",
    "#50C660",
    "#9FD551",
    "#EDE342",
    "#86CEB3",
    "#9CDCC4",
  ],
};
var chart = new ApexCharts(document.querySelector("#total-department"), options);
chart.render();