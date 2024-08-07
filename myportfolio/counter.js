document.addEventListener("DOMContentLoaded", () => {
  const countElement = document.getElementById("count");
  const incrementButton = document.getElementById("increment-btn");
  const saveButton = document.getElementById("save-btn");
  const messageElement = document.getElementById("message");

/*
  // Load the current count from the server
  fetch("counter.txt")
    .then((response) => response.text())
    .then((text) => {
      countElement.textContent = text.trim() || "0";
    })
    .catch((error) => console.error("Error fetching count:", error));
*/

  incrementButton.addEventListener("click", () => {
    let currentCount = parseInt(countElement.textContent, 10) || 0;
    currentCount++;
    countElement.textContent = currentCount;
  });

  saveButton.addEventListener("click", () => {
    let currentCount = parseInt(countElement.textContent, 10) || 0;

    // Send the updated count to the server
    fetch("update-counter.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: `count=${currentCount}`,
    })
      .then((response) => response.text())
      .then((text) => {
        messageElement.textContent = text;
        messageElement.style.color = text.includes('successfully') ? 'green' : 'red';
      })
      .catch((error) => {
        console.error("Error sending count to server:", error);
        messageElement.textContent = "Error saving count.";
        messageElement.style.color = 'red';
      });
  });
});