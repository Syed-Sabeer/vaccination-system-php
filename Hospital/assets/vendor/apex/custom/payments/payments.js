var options = {
  chart: {
    height: 320,
    type: 'rangeBar',
    offsetY: 13,
    toolbar: {
      show: false,
    },
  },
  dataLabels: {
    enabled: false,
  },
  plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: '50%',
      borderRadius: 20,
    },
  },
  stroke: {
    show: true,
    width: 6,
    colors: ['transparent']
  },
  series: [
    {
      data: [
        {
          x: 'January',
          y: [210, 400],
        },
        {
          x: 'February',
          y: [300, 490],
        },
        {
          x: 'March',
          y: [350, 500],
        },
        {
          x: 'April',
          y: [210, 390],
        },
        {
          x: 'May',
          y: [280, 400],
        },
        {
          x: 'June',
          y: [110, 250],
        },
        {
          x: 'July',
          y: [210, 400],
        },
        {
          x: 'August',
          y: [290, 390],
        },
        {
          x: 'September',
          y: [250, 490],
        },
        {
          x: 'October',
          y: [210, 390],
        },
        {
          x: 'November',
          y: [190, 310],
        },
        {
          x: 'December',
          y: [250, 450],
        },
      ],
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
      "January",
      "February",
      "March",
      "April",
      "May",
      "June",
      "July",
      "August",
      "September",
      "October",
      "November",
      "December",
    ],
  },
  yaxis: {
    labels: {
      show: false,
    },
  },
  colors: ["#238781", "#ff3939", "#436ccf", "#dcad10", "#828382"],
  markers: {
    size: 0,
    opacity: 0.3,
    colors: ["#238781", "#ff3939", "#436ccf", "#dcad10", "#828382"],
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

var chart = new ApexCharts(document.querySelector("#payments"), options);
chart.render();