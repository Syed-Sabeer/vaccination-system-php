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
    width: 3,
  },
  series: [
    {
      name: "Sales",
      data: [10, 40, 15, 40, 20, 35, 20, 10, 31, 43, 56, 29],
    },
    {
      name: "Revenue",
      data: [2, 8, 25, 7, 20, 20, 51, 35, 42, 20, 33, 67],
    },
  ],
  grid: {
    borderColor: "#dfd6ff",
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
  colors: [
    "#207a5a",
    "#248a65",
    "#116aef",
    "#3ea37e",
    "#53ad8d",
    "#69b89b",
    "#7ec2a9",
    "#94ccb8",
    "#a9d6c6",
  ],
  markers: {
    size: 0,
    opacity: 0.3,
    colors: [
      "#2f477a",
      "#35508a",
      "#3b5999",
      "#4f6aa3",
      "#627aad",
      "#768bb8",
      "#899bc2",
      "#9daccc",
    ],
    strokeColor: "#ffffff",
    strokeWidth: 2,
    hover: {
      size: 7,
    },
  },
};

var chart = new ApexCharts(document.querySelector("#areaGraph"), options);

chart.render();
