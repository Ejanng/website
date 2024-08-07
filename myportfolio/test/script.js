document.addEventListener('DOMContentLoaded', () => {
    const calendarDiv = document.getElementById('calendar');

    // Fetch activities for today
    fetch('get_activities.php?date=' + new Date().toISOString().split('T')[0])
        .then(response => response.json())
        .then(data => {
            if (data.length > 0) {
                data.forEach(activity => {
                    const div = document.createElement('div');
                    div.classList.add('activity');
                    div.innerHTML = `<h3>${activity.title}</h3>
                                     <p>${activity.message}</p>
                                     <p>${activity.time}</p>`;
                    calendarDiv.appendChild(div);
                });
            } else {
                calendarDiv.innerHTML = 'No activities for today.';
            }
        });
});
