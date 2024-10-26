// Morris Negative values
var neg_data = [
  { period: "2023-02-12", a: 100 },
  { period: "2023-01-03", a: 75 },
  { period: "2022-08-08", a: 50 },
  { period: "2022-05-10", a: 25 },
  { period: "2022-03-14", a: 0 },
  { period: "2022-01-10", a: -25 },
  { period: "2021-12-10", a: -50 },
  { period: "2021-10-07", a: -75 },
  { period: "2021-09-25", a: -100 },
];
Morris.Line({
  element: "negativeValues",
  data: neg_data,
  xkey: "period",
  ykeys: ["a"],
  labels: ["Series A"],
  units: "%",
  resize: true,
  hideHover: "auto",
  gridLineColor: "#dfd6ff",
  pointFillColors: ["#ffffff"],
  pointStrokeColors: [
    "#207a5a",
    "#248a65",
    "#238781",
    "#3ea37e",
    "#53ad8d",
    "#69b89b",
    "#7ec2a9",
    "#94ccb8",
    "#a9d6c6",
  ],
  lineColors: [
    "#207a5a",
    "#248a65",
    "#238781",
    "#3ea37e",
    "#53ad8d",
    "#69b89b",
    "#7ec2a9",
    "#94ccb8",
    "#a9d6c6",
  ],
});
