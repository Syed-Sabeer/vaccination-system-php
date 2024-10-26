// Europe
$(function () {
  $("#mapEurope").vectorMap({
    map: "europe_mill",
    zoomOnScroll: false,
    series: {
      regions: [
        {
          values: gdpData,
          scale: ["#238781"],
          normalizeFunction: "polynomial",
        },
      ],
    },
    backgroundColor: "transparent",
  });
});
