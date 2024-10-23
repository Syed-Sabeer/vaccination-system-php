var options = {
  series: [60],
  chart: {
    height: 300,
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
      startAngle: -135,
      endAngle: 135,
      hollow: {
        size: '75%',
        background: '#f0f6f7',
        image: undefined,
        imageWidth: 150,
        imageHeight: 150,
        imageOffsetX: 0,
        imageOffsetY: 0,
        imageClipped: true,
        position: 'front',
        dropShadow: {
          enabled: false,
          top: 0,
          left: 0,
          blur: 3,
          opacity: 0.5
        }
      },
      track: {
        show: true,
        background: '#d8e2eb',
        strokeWidth: '90%',
        opacity: 0.4,
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
          colors: '#238781',
          fontWeight: 600,
          fontSize: '20px',
          color: '#238781',
          offsetY: 6,
          formatter: function (val) {
            return val + '%';
          },
        },
      },
    },
  },
  labels: ['Male - 18', 'Female - 12'],
  colors: ['#238781', '#d8e2eb'],
  legend: {
    show: true,
    position: 'bottom',
    fontSize: '14px',
    markers: {
      width: 18,
      height: 18,
      strokeWidth: 5,
      colors: '#ffffff',
      strokeColors: '#d8e2eb',
      radius: 20,
    },
    onItemClick: {
      toggleDataSeries: false,
    },
    onItemHover: {
      highlightDataSeries: false,
    },
  },
};

var chart = new ApexCharts(document.querySelector("#surgeries"), options);

chart.render();