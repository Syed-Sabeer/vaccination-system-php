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
    curve: "smooth",
    width: 4,
  },
  series: [
    {
      name: "Expenses",
      data: [0, 1000, 4000, 3000, 6000, 2000],
    }
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
      right: 0,
      bottom: 0,
      left: 20,
    },
  },
  xaxis: {
    categories: [
      "Han",
      "Feb",
      "Mar",
      "Apr",
      "May",
      "Jun",
    ],
  },
  yaxis: {
    labels: {
      show: false,
    },
  },
  colors: ["#238781", "#b9c3ca", "#66a4ff"],
  markers: {
    size: 0,
    opacity: 0.3,
    colors: ["#238781", "#b9c3ca", "#66a4ff"],
    strokeColor: "#ffffff",
    strokeWidth: 1,
    hover: {
      size: 7,
    },
  },
  tooltip: {
    y: {
      formatter: function (val) {
        return '$' + val;
      },
    },
  },
};

var chart = new ApexCharts(document.querySelector("#medicalExpenses"), options);

chart.render();