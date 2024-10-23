var options = {
  series: [80, 60],
  chart: {
    height: 240,
    type: "radialBar",
  },
  plotOptions: {
    radialBar: {
      hollow: {
        margin: 2,
        size: "5%",
      },
      dataLabels: {
        name: {
          fontSize: "22px",
        },
        value: {
          fontSize: "16px",
          color: 'white',
        },
        total: {
          show: true,
          label: "Total",
          formatter: function (w) {
            // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
            return 110;
          },
        },
      },
    },
  },
  labels: ["Root Canal", "Dental implant"],
  colors: ["#116aef", "#0ebb13",],
};

var chart = new ApexCharts(document.querySelector("#surgeries"), options);
chart.render();