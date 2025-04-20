
function fetchData() {
    fetch('/api/sensor-data/latest')
        .then(response => response.json())
        .then(data => {
            updateDashboard(data);
        });
}

// Poll setiap 5 detik
setInterval(fetchData, 5000);