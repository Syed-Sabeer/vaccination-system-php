var options = {
  chart: {
    height: 400,
    type: "bar",
    toolbar: {
      show: false,
    },
  },
  dataLabels: {
    enabled: false,
  },
  stroke: {
    curve: "smooth",
    width: 1,
  },
  series: [
    {
      name: "0-5",
      data: [10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65],
    },
    {
      name: "6-15",
      data: [15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70],
    },
    {
      name: "16-25",
      data: [20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70, 75],
    },
    {
      name: "26-45",
      data: [25, 30, 35, 40, 45, 50, 55, 60, 65, 70, 75, 80],
    },
    {
      name: "46+",
      data: [35, 40, 45, 50, 55, 60, 65, 70, 75, 80, 85, 90],
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
  colors: ["#238781", "#4f9f9a", "#7bb7b3", "#a7cfcd", "#d3e7e6", "#e9f3f2"],
  tooltip: {
    y: {
      formatter: function (val) {
        return val + ' Patients';
      },
    },
  },
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
};

var chart = new ApexCharts(document.querySelector("#availableBeds"), options);

chart.render();