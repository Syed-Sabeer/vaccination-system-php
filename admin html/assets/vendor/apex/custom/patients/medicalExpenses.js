var options = {
  chart: {
    height: 300,
    type: "area",
    toolbar: {
      show: false,
    },
  },
  dataLabels: {
    enabled: false,
  },
  stroke: {
    curve: "straight",
    width: 3,
  },
  series: [
    {
      name: "Cash",
      data: [28, 15, 30, 18, 35, 13, 43],
    },
    {
      name: "Card",
      data: [10, 39, 20, 36, 15, 32, 17],
    },
  ],
  grid: {
    borderColor: "#d8dee6",
    strokeDashArray: 5,
    xaxis: {
      lines: {
        show: true,
      },
    },
    yaxis: {
      lines: {
        show: false,
      },
    },
    padding: {
      top: 0,
      right: 30,
      bottom: 10,
      left: 30,
    },
  },
  xaxis: {
    categories: ["Jan-Feb", "Mar-Apr", "May-June", "Jul-Aug", "Sep-Oct", "Nov-Dec"],
  },
  colors: ["#116aef", "#d0dfe9"],
  yaxis: {
    show: false,
  },
  markers: {
    size: 0,
    opacity: 0.2,
    colors: ["#116aef", "#d0dfe9"],
    strokeColor: "#fff",
    strokeWidth: 2,
    hover: {
      size: 7,
    },
  },
  tooltip: {
    y: {
      formatter: function (val) {
        return "$" + val;
      },
    },
  },
};

var chart = new ApexCharts(document.querySelector("#medicalExpenses"), options);

chart.render();