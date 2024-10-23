// BP Levels
var options2 = {
  chart: {
    height: 100,
    type: "area",
    zoom: {
      enabled: false,
    },
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
      name: "BP Level",
      data: [100, 140, 120, 150, 130, 160],
    },
  ],
  grid: {
    show: false,
  },
  xaxis: {
    labels: {
      show: false,
    },
  },
  yaxis: {
    show: false,
  },
  colors: ["#ff3939"],
  tooltip: {
    y: {
      formatter: function (val) {
        return val;
      },
    },
  },
};
var chart2 = new ApexCharts(document.querySelector("#bpLevels"), options2);
chart2.render();


// Sugar Levels
var options3 = {
  chart: {
    height: 100,
    type: "area",
    zoom: {
      enabled: false,
    },
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
      name: "Sugar Level",
      data: [100, 140, 120, 150, 130, 160],
    },
  ],
  grid: {
    show: false,
  },
  xaxis: {
    labels: {
      show: false,
    },
  },
  yaxis: {
    show: false,
  },
  colors: ["#28a8f6"],
  tooltip: {
    y: {
      formatter: function (val) {
        return val;
      },
    },
  },
};
var chart3 = new ApexCharts(document.querySelector("#sugarLevels"), options3);
chart3.render();


// Heart Rate Levels
var options4 = {
  chart: {
    height: 100,
    type: "area",
    zoom: {
      enabled: false,
    },
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
      name: "Heart Rate",
      data: [100, 140, 120, 150, 130, 160],
    },
  ],
  grid: {
    show: false,
  },
  xaxis: {
    labels: {
      show: false,
    },
  },
  yaxis: {
    show: false,
  },
  colors: ["#02b86f"],
  tooltip: {
    y: {
      formatter: function (val) {
        return val;
      },
    },
  },
};
var chart4 = new ApexCharts(document.querySelector("#heartRate"), options4);
chart4.render();


// Clolesterol Levels
var options5 = {
  chart: {
    height: 100,
    type: "area",
    zoom: {
      enabled: false,
    },
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
      name: "Clolesterol",
      data: [100, 140, 120, 150, 130, 160],
    },
  ],
  grid: {
    show: false,
  },
  xaxis: {
    labels: {
      show: false,
    },
  },
  yaxis: {
    show: false,
  },
  colors: ["#f1b15b"],
  tooltip: {
    y: {
      formatter: function (val) {
        return val;
      },
    },
  },
};
var chart5 = new ApexCharts(document.querySelector("#clolesterolLevels"), options5);
chart5.render();

