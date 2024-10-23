$(document).ready(function () {
  // Create an array of random colors
  var colors = ["#238781", "#4f9f9a", "#7bb7b3", "#a7cfcd"];

  // Iterate over all td elements in the table
  $(".randomTableColors.table td").each(function () {
    // Get a random color from the array
    var color = colors[Math.floor(Math.random() * colors.length)];

    // Set the background color of the td element to the random color
    $(this).css("color", color);
  });
});