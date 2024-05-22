// Function to update the clock
function updateClock() {
    // Get the current time
    var now = new Date();

    // Extract hours, minutes, and seconds
    var hours = now.getHours(); // Get the hours in 24-hour format
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();

    // Pad single digit minutes and seconds with leading zeros
    minutes = minutes < 10 ? '0' + minutes : minutes;
    seconds = seconds < 10 ? '0' + seconds : seconds;

    // Format the time as HH:MM:SS
    var timeString = hours + ':' + minutes + ':' + seconds;

    // Update the clock element with the new time
    document.getElementById('clock').textContent = timeString;
}

// Update the clock every second
setInterval(updateClock, 1000);

// Initial call to updateClock to set the initial time
updateClock();