var options = {
  chart: {
    width: 240,
    type: "donut",
  },
  labels: ["Male", "Female", "Kids"],
  series: [20, 65, 35],
  legend: {
    position: "bottom",
  },
  dataLabels: {
    enabled: false,
  },
  stroke: {
    width: 0,
  },
  colors: ["#116AEF", "#0ebb13", "#ff5a39", "#3e3e42", "#75C2F6"],
};
var chart = new ApexCharts(document.querySelector("#genderAge"), options);
chart.render();