document.addEventListener("DOMContentLoaded", function () {
  var calendarEl = document.getElementById("dayGrid");
  var calendar = new FullCalendar.Calendar(calendarEl, {
    headerToolbar: {
      left: "prevYear,prev,next,nextYear today",
      center: "title",
      right: "dayGridMonth,dayGridWeek,dayGridDay",
    },
    initialDate: "2024-05-10",
    navLinks: true, // can click day/week names to navigate views
    editable: true,
    dayMaxEvents: true, // allow "more" link when too many events
    events: [
      {
        title: "Annual Meeting",
        start: "2024-05-01",
        color: "#238781",
      },
      {
        title: "Clinical Research Conference",
        start: "2024-05-07",
        end: "2024-05-10",
        color: "#4f9f9a",
      },
      {
        groupId: 999,
        title: "Gynecological Ultrasound",
        start: "2024-05-09T16:00:00",
        color: "#7bb7b3",
      },
      {
        groupId: 999,
        title: "Ultrafest Conference",
        start: "2024-05-16T16:00:00",
        color: "#a7cfcd",
      },
      {
        title: "Conference",
        start: "2024-05-11",
        end: "2024-05-13",
        color: "#d3e7e6",
      },
      {
        title: "Meeting",
        start: "2024-05-14T10:30:00",
        end: "2024-05-14T12:30:00",
        color: "#e9f3f2",
      },
      {
        title: "Lunch",
        start: "2024-05-16T12:00:00",
        color: "#e9f3f2",
      },
      {
        title: "Ultrafest",
        start: "2024-05-18T14:30:00",
        color: "#d3e7e6",
      },
      {
        title: "Interview",
        start: "2024-05-21T17:30:00",
        color: "#a7cfcd",
      },
      {
        title: "Meeting",
        start: "2024-05-22T20:00:00",
        color: "#7bb7b3",
      },
      {
        title: "Conference",
        start: "2024-05-13T07:00:00",
        color: "#4f9f9a",
      },
      {
        title: "Click for Google",
        url: "http://bootstrap.gallery/",
        start: "2024-05-28",
        color: "#238781",
      },
      {
        title: "Interview",
        start: "2024-05-20",
        color: "#7bb7b3",
      },
      {
        title: "Surgery Meet",
        start: "2024-05-29",
        color: "#d3e7e6",
      },
      {
        title: "Management Meet",
        start: "2024-05-25",
        color: "#7bb7b3",
      },
    ],
  });

  calendar.render();
});
