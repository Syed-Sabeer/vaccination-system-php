// Sparkline 1
var options1 = {
  series: [80],
  chart: {
    type: "radialBar",
    width: 70,
    height: 70,
    sparkline: {
      enabled: true,
    },
  },
  dataLabels: {
    enabled: false,
  },
  plotOptions: {
    radialBar: {
      hollow: {
        margin: 0,
        size: "50%",
      },
      track: {
        margin: 0,
        background: "#eaf1ff",
      },
      dataLabels: {
        show: false,
      },
    },
  },
  colors: ["#238781", "#d5cdff"],
};

var chart1 = new ApexCharts(document.querySelector("#sparkline1"), options1);
chart1.render();


// Sparkline 2
var options2 = {
  series: [90],
  chart: {
    type: "radialBar",
    width: 70,
    height: 70,
    sparkline: {
      enabled: true,
    },
  },
  dataLabels: {
    enabled: false,
  },
  plotOptions: {
    radialBar: {
      hollow: {
        margin: 0,
        size: "50%",
      },
      track: {
        margin: 0,
        background: "#eaf1ff",
      },
      dataLabels: {
        show: false,
      },
    },
  },
  colors: ["#df2e3f", "#d5cdff"],
};

var chart2 = new ApexCharts(document.querySelector("#sparkline2"), options2);
chart2.render();


// Sparkline 3
var options3 = {
  series: [80],
  chart: {
    type: "radialBar",
    width: 70,
    height: 70,
    sparkline: {
      enabled: true,
    },
  },
  dataLabels: {
    enabled: false,
  },
  plotOptions: {
    radialBar: {
      hollow: {
        margin: 0,
        size: "50%",
      },
      track: {
        margin: 0,
        background: "#eaf1ff",
      },
      dataLabels: {
        show: false,
      },
    },
  },
  colors: ["#238781", "#d5cdff"],
};

var chart3 = new ApexCharts(document.querySelector("#sparkline3"), options3);
chart3.render();