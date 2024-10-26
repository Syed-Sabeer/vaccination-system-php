var options = {
  chart: {
    height: 300,
    type: "line",
    toolbar: {
      show: false,
    },
  },
  dataLabels: {
    enabled: false,
  },
  fill: {
    type: 'solid',
    opacity: [0.1, 1],
  },
  stroke: {
    curve: "smooth",
    width: [0, 5]
  },
  series: [{
    name: 'New',
    type: 'area',
    data: [400, 500, 300, 450, 300, 350, 450, 300, 500, 400, 300, 600]
  }, {
    name: 'Return',
    type: 'line',
    data: [300, 400, 200, 350, 200, 250, 350, 200, 400, 300, 200, 500]
  }],
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
      left: 0,
    },
  },
  xaxis: {
    categories: [
      "Jan",
      "Feb",
      "Mar",
      "Apr",
      "May",
      "Jun",
      "Jul",
      "Aug",
      "Sep",
      "Oct",
      "Nov",
      "Dec",
    ],
  },
  yaxis: {
    labels: {
      show: false,
    },
  },
  legend: {
    position: 'bottom',
    horizontalAlign: 'center',
  },
  colors: ["#238781", "#4f9f9a", "#7bb7b3", "#a7cfcd", "#d3e7e6", "#e9f3f2"],
  markers: {
    size: 0,
    opacity: 0.3,
    colors: ["#238781", "#4f9f9a", "#7bb7b3", "#a7cfcd", "#d3e7e6", "#e9f3f2"],
    strokeColor: "#ffffff",
    strokeWidth: 1,
    hover: {
      size: 7,
    },
  },
  tooltip: {
    y: {
      formatter: function (val) {
        return val;
      },
    },
  },
};

var chart = new ApexCharts(document.querySelector("#patients"), options);

chart.render();