var options = {
  series: [80],
  chart: {
    height: 260,
    type: 'radialBar',
    offsetY: 0,
  },

  stroke: {
    dashArray: 20,
    curve: 'smooth',
    lineCap: 'round',
  },
  grid: {
    padding: {
      top: 0,
      left: 0,
      right: 0,
      bottom: 0,
    },
  },
  plotOptions: {
    radialBar: {
      startAngle: -145,
      endAngle: 145,
      hollow: {
        size: '75%',
        image: 'assets/images/ellipse-bg.svg',
        imageWidth: 120,
        imageHeight: 120,
        imageClipped: false,
      },
      track: {
        show: true,
        background: '#d8e2eb',
        strokeWidth: '80%',
        opacity: 0.6,
      },
      dataLabels: {
        show: true,
        name: {
          show: true,
          fontSize: '16px',
          fontFamily: undefined,
          fontWeight: 600,
          color: undefined,
          offsetY: -10,
        },
        value: {
          show: true,
          colors: '#848789',
          fontSize: '20px',
          fontWeight: 700,
          offsetY: 6,
          formatter: function (val) {
            return val + '%';
          },
        },
      },
    },
  },
  labels: ['New: 600', 'Returning: 360'],
  colors: ['#238781', '#d8e2eb'],
  legend: {
    show: true,
    position: 'bottom',
    markers: {
      width: 18,
      height: 18,
      strokeWidth: 5,
    },
    onItemClick: {
      toggleDataSeries: false,
    },
    onItemHover: {
      highlightDataSeries: false,
    },
  },
};

var chart = new ApexCharts(document.querySelector("#patients2"), options);
chart.render();