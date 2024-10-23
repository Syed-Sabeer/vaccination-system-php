// BP Levels
var options1 = {
  chart: {
    type: 'area',
    height: 50,
    sparkline: {
      enabled: true
    },
    dropShadow: {
      enabled: true,
      enabledOnSeries: undefined,
      top: 7,
      left: 0,
      blur: 1,
      color: '#238781',
      opacity: 0.15
    }
  },
  stroke: {
    show: true,
    curve: 'smooth',
    lineCap: 'butt',
    colors: undefined,
    width: 1.5,
    dashArray: 0,
  },
  fill: {
    type: 'gradient',
    gradient: {
      shadeIntensity: 1,
      opacityFrom: 0.4,
      opacityTo: 0.1,
      stops: [0, 90, 100],
      colorStops: [
        [
          {
            offset: 0,
            color: "#e5f5f4",
            opacity: 1
          },
          {
            offset: 75,
            color: "#f2faf9",
            opacity: 1
          },
          {
            offset: 100,
            color: "#ffffff",
            opacity: 1
          }
        ]
      ]
    }
  },
  series: [{
    name: 'BP Levels',
    data: [46, 34, 40, 35, 21, 46, 37, 22, 34, 34, 40, 44, 28, 23, 18, 15, 18, 16, 17, 12, 14]
  }],
  yaxis: {
    min: 0,
    show: false
  },
  xaxis: {
    axisBorder: {
      show: false
    },
  },
  yaxis: {
    axisBorder: {
      show: false
    },
  },
  colors: ["#238781"],
  tooltip: {
    y: {
      formatter: function (val) {
        return val;
      },
    },
  },
}
document.getElementById('bpLevels').innerHTML = '';
var options1 = new ApexCharts(document.querySelector("#bpLevels"), options1);
options1.render();

// Sugar Levels
var options2 = {
  chart: {
    type: 'area',
    height: 50,
    sparkline: {
      enabled: true
    },
    dropShadow: {
      enabled: true,
      enabledOnSeries: undefined,
      top: 7,
      left: 0,
      blur: 1,
      color: '#238781',
      opacity: 0.15
    }
  },
  stroke: {
    show: true,
    curve: 'smooth',
    lineCap: 'butt',
    colors: undefined,
    width: 1.5,
    dashArray: 0,
  },
  fill: {
    type: 'gradient',
    gradient: {
      shadeIntensity: 1,
      opacityFrom: 0.4,
      opacityTo: 0.1,
      stops: [0, 90, 100],
      colorStops: [
        [
          {
            offset: 0,
            color: "#e5f5f4",
            opacity: 1
          },
          {
            offset: 75,
            color: "#f2faf9",
            opacity: 1
          },
          {
            offset: 100,
            color: "#ffffff",
            opacity: 1
          }
        ]
      ]
    }
  },
  series: [{
    name: 'Sugar Levels',
    data: [34, 40, 44, 28, 23, 18, 46, 34, 40, 35, 21, 46, 37, 22, 34, 15, 18, 16, 17, 12, 14]
  }],
  yaxis: {
    min: 0,
    show: false
  },
  xaxis: {
    axisBorder: {
      show: false
    },
  },
  yaxis: {
    axisBorder: {
      show: false
    },
  },
  colors: ["#238781"],
  tooltip: {
    y: {
      formatter: function (val) {
        return val;
      },
    },
  },
}
document.getElementById('sugarLevels').innerHTML = '';
var options2 = new ApexCharts(document.querySelector("#sugarLevels"), options2);
options2.render();

// Heart Rate
var options3 = {
  chart: {
    type: 'area',
    height: 50,
    sparkline: {
      enabled: true
    },
    dropShadow: {
      enabled: true,
      enabledOnSeries: undefined,
      top: 7,
      left: 0,
      blur: 1,
      color: '#238781',
      opacity: 0.15
    }
  },
  stroke: {
    show: true,
    curve: 'smooth',
    lineCap: 'butt',
    colors: undefined,
    width: 1.5,
    dashArray: 0,
  },
  fill: {
    type: 'gradient',
    gradient: {
      shadeIntensity: 1,
      opacityFrom: 0.4,
      opacityTo: 0.1,
      stops: [0, 90, 100],
      colorStops: [
        [
          {
            offset: 0,
            color: "#e5f5f4",
            opacity: 1
          },
          {
            offset: 75,
            color: "#f2faf9",
            opacity: 1
          },
          {
            offset: 100,
            color: "#ffffff",
            opacity: 1
          }
        ]
      ]
    }
  },
  series: [{
    name: 'Heart Rate',
    data: [44, 28, 23, 18, 15, 18, 16, 17, 12, 14, 46, 34, 40, 35, 21, 46, 37, 22, 34, 34, 40]
  }],
  yaxis: {
    min: 0,
    show: false
  },
  xaxis: {
    axisBorder: {
      show: false
    },
  },
  yaxis: {
    axisBorder: {
      show: false
    },
  },
  colors: ["#238781"],
  tooltip: {
    y: {
      formatter: function (val) {
        return val;
      },
    },
  },
}
document.getElementById('heartRate').innerHTML = '';
var options3 = new ApexCharts(document.querySelector("#heartRate"), options3);
options3.render();

// Clolesterol Levels
var options4 = {
  chart: {
    type: 'area',
    height: 50,
    sparkline: {
      enabled: true
    },
    dropShadow: {
      enabled: true,
      enabledOnSeries: undefined,
      top: 7,
      left: 0,
      blur: 1,
      color: '#238781',
      opacity: 0.15
    }
  },
  stroke: {
    show: true,
    curve: 'smooth',
    lineCap: 'butt',
    colors: undefined,
    width: 1.5,
    dashArray: 0,
  },
  fill: {
    type: 'gradient',
    gradient: {
      shadeIntensity: 1,
      opacityFrom: 0.4,
      opacityTo: 0.1,
      stops: [0, 90, 100],
      colorStops: [
        [
          {
            offset: 0,
            color: "#e5f5f4",
            opacity: 1
          },
          {
            offset: 75,
            color: "#f2faf9",
            opacity: 1
          },
          {
            offset: 100,
            color: "#ffffff",
            opacity: 1
          }
        ]
      ]
    }
  },
  series: [{
    name: 'Clolesterol Levels',
    data: [14, 12, 17, 16, 18, 15, 18, 23, 28, 44, 40, 34, 34, 22, 37, 46, 21, 35, 40, 34, 46]
  }],
  yaxis: {
    min: 0,
    show: false
  },
  xaxis: {
    axisBorder: {
      show: false
    },
  },
  yaxis: {
    axisBorder: {
      show: false
    },
  },
  colors: ["#238781"],
  tooltip: {
    y: {
      formatter: function (val) {
        return val;
      },
    },
  },
}
document.getElementById('clolesterolLevels').innerHTML = '';
var options4 = new ApexCharts(document.querySelector("#clolesterolLevels"), options4);
options4.render();