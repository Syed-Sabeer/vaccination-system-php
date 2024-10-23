// Africa
$(function () {
  $("#mapAfrica").vectorMap({
    map: "africa_mill",
    backgroundColor: "transparent",
    scaleColors: ["#238781"],
    zoomOnScroll: false,
    zoomMin: 1,
    hoverColor: true,
    series: {
      regions: [
        {
          values: gdpData,
          scale: ["#238781"],
          normalizeFunction: "polynomial",
        },
      ],
    },
  });
});
