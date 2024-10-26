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
    opacity: [.1, 1, .5],
  },
  stroke: {
    curve: "smooth",
    width: [0, 4, 0]
  },
  series: [{
    name: 'General',
    type: 'bar',
    data: [400, 550, 350, 450, 300, 350, 270, 320, 330, 410, 300, 490]
  }, {
    name: 'Surgery',
    type: 'line',
    data: [200, 400, 250, 350, 200, 350, 370, 520, 440, 610, 600, 380]
  }, {
    name: 'ICU',
    type: 'bar',
    data: [140, 250, 200, 220, 80, 50, 30, 50, 40, 60, 30, 80]
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
  colors: ["#116AEF", "#327FF2", "#5394F5", "#75AAF9", "#96BFFC", "#B7D4FF"],
  markers: {
    size: 0,
    opacity: 0.3,
    colors: ["#116AEF", "#327FF2", "#5394F5", "#75AAF9", "#96BFFC", "#B7D4FF"],
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

var chart = new ApexCharts(document.querySelector("#treatment"), options);

chart.render();