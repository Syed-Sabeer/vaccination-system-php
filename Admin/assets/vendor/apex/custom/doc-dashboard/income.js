var options = {
  chart: {
    height: 250,
    type: "area",
    toolbar: {
      show: false,
    },
  },
  dataLabels: {
    enabled: false,
  },

  plotOptions: {
    bar: {
      columnWidth: "30%",
      borderRadius: 4,
    },
  },
  series: [
    {
      name: "Appointments",
      type: "column",
      data: [10, 40, 15, 40, 20, 35, 20, 10, 31, 43, 56, 29],
    },
    {
      name: "Surgeries",
      type: "area",
      data: [2, 8, 25, 7, 20, 20, 51, 35, 42, 20, 33, 67],
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
  colors: ["#116aef", "#b9c3ca", "#66a4ff"],
  markers: {
    size: 0,
    opacity: 0.3,
    colors: ["#116aef", "#b9c3ca", "#66a4ff"],
    strokeColor: "#ffffff",
    strokeWidth: 2,
    hover: {
      size: 7,
    },
  },
  tooltip: {
    y: {
      formatter: function (val) {
        return '$' + val + 'k';
      },
    },
  },
};

var chart = new ApexCharts(document.querySelector("#income"), options);

chart.render();