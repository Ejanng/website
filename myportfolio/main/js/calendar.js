const calendarDates = document.getElementById("calendar-dates");
const monthYear = document.getElementById("month-year");
const activityLog = document.querySelector(".activity-log p");
const prevMonthButton = document.getElementById("prev-month");
const nextMonthButton = document.getElementById("next-month");

let currentDate = new Date();
let today = new Date(); // Store the current date

function generateCalendar(date) {
  calendarDates.innerHTML = ""; // Clear previous dates

  const month = date.getMonth();
  const year = date.getFullYear();
  const firstDay = new Date(year, month, 1).getDay();
  const daysInMonth = new Date(year, month + 1, 0).getDate();
  const prevDaysInMonth = new Date(year, month, 0).getDate();

  monthYear.textContent = `${date.toLocaleString("default", {
    month: "long",
  })} ${year}`;

  // Previous month's days for padding
  for (let i = firstDay - 1; i >= 0; i--) {
    const day = document.createElement("div");
    day.textContent = prevDaysInMonth - i;
    day.classList.add("inactive");
    calendarDates.appendChild(day);
  }

  // Current month's days
  for (let i = 1; i <= daysInMonth; i++) {
    const day = document.createElement("div");
    day.textContent = i;
    day.dataset.date = `${year}-${month + 1}-${i}`; // Set a data attribute for comparison

    // Highlight the current date
    if (
      today.getFullYear() === year &&
      today.getMonth() === month &&
      today.getDate() === i
    ) {
      day.classList.add("today");
    }

    day.addEventListener("click", () => {
      document
        .querySelectorAll(".calendar-dates div")
        .forEach((d) => d.classList.remove("active"));
      day.classList.add("active");
      activityLog.textContent = `Activity for ${i} ${date.toLocaleString(
        "default",
        { month: "long" }
      )} ${year}`;
    });
    calendarDates.appendChild(day);
  }
}

function fetchActivitiesForDate(date) {
  $.ajax({
    url: "activity/show_activities.php", // Corrected the file path
    type: "POST",
    data: { date: date },
    success: function (response) {
      console.log(response); // Debug: Check the response in the console
      const activities = JSON.parse(response);
      activityLog.innerHTML = `<h3>Activities for ${new Date(date).toLocaleDateString()}</h3>`;
      if (activities.length > 0) {
        activities.forEach((activity) => {
          activityLog.innerHTML += `<div class="activity">
              <h4>${activity.title}</h4>
              <p>${activity.message}</p>
              <p>Date: ${activity.date} Time: ${activity.time}</p>
            </div>`;
        });
      } else {
        activityLog.innerHTML += "<p>No activities for this date.</p>";
      }
    },
    error: function () {
      activityLog.textContent = 'An error occurred while fetching activities.';
    }
  });
} 

function showPreviousMonth() {
  currentDate.setMonth(currentDate.getMonth() - 1);
  generateCalendar(currentDate);
}

function showNextMonth() {
  currentDate.setMonth(currentDate.getMonth() + 1);
  generateCalendar(currentDate);
}

// Set event listeners for buttons
prevMonthButton.addEventListener("click", showPreviousMonth);
nextMonthButton.addEventListener("click", showNextMonth);

// Generate the initial calendar
generateCalendar(currentDate);
