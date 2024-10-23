var options = {
  chart: {
    height: 300,
    type: "bar",
    toolbar: {
      show: false,
    },
  },
  dataLabels: {
    enabled: false,
  },
  plotOptions: {
    bar: {
      columnWidth: "40%",
    },
  },
  stroke: {
    width: 0,
  },
  series: [
    {
      name: "Requested",
      data: [10, 20, 10, 15, 24, 12],
    },
    {
      name: "Approved",
      data: [8, 16, 6, 10, 18, 8],
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
      bottom: 10,
      left: 0,
    },
  },
  xaxis: {
    categories: ["Jan-Feb", "Mar-Apr", "May-June", "Jul-Aug", "Sep-Oct", "Nov-Dec"],
  },
  yaxis: {
    labels: {
      show: false,
    },
  },
  colors: ["#116aef", "#d0dfe9"],
  markers: {
    size: 0,
    opacity: 0.3,
    colors: ["#116aef", "#d0dfe9"],
    strokeColor: "#ffffff",
    strokeWidth: 2,
    hover: {
      size: 7,
    },
  },
};

var chart = new ApexCharts(document.querySelector("#insuranceClaims"), options);

chart.render();
