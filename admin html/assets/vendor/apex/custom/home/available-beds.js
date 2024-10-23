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
    width: 3,
  },
  series: [
    {
      name: "Occupied",
      data: [10, 40, 15, 40, 20, 35, 20, 10, 31, 43, 56, 29],
    },
    {
      name: "Reserved",
      data: [9, 20, 30, 51, 8, 25, 7, 35, 42, 20, 18, 35],
    },
    {
      name: "Available",
      data: [29, 8, 71, 35, 42, 20, 33, 67, 25, 7, 10, 20],
    },
    {
      name: "Cleanup",
      data: [12, 17, 51, 65, 42, 20, 25, 7, 10, 20, 25, 67],
    },
    {
      name: "Other",
      data: [51, 35, 42, 2, 8, 25, 7, 10, 20, 20, 33, 48],
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
};

var chart = new ApexCharts(document.querySelector("#availableBeds"), options);

chart.render();