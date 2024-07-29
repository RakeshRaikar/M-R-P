<!DOCTYPE html>
<html>
<head>
    
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body{
            background: #c5c6c7;
        }
        h1{
            display: flex;
            justify-content: center;
            align-items: center;
            letter-spacing: 5px;
            font-size: 40px;
            text-shadow: 4px 5px 8px rgba(0, 0, 0, 0.7);
        }
        .div1 {
            display: flex;
            justify-content: center;
            align-items: center;
            
            margin-left: 400px;
        }
        #chartDataText
        {
           
            font-size: 20px;
            display: flex; /* Display contents horizontally */
            white-space: nowrap; /* Prevent line breaks within the paragraph */
            letter-spacing: 2px;
        
        }
       
    </style>

</head>
<body>
    <h1>WAREHOUSE MANAGEMENT</h1>
    <div  class='div1' style="max-width: 400px;">
        <canvas id="pieChart"></canvas>
    
    <p id="chartDataText"></p>
    </div>
    <script>
        // Replace the database credentials with your actual values
        const db_host = 'localhost:8080';
        const db_user = 'root';
        const db_pass = '';
        const db_name = 'clients123';

        // Function to fetch data from the database and update the pie chart and data text
        function fetchDataAndUpdateChart() {
            // Create a connection to the database using AJAX or fetch API
            // Here, I'll use fetch API for simplicity
            fetch('fetch_data.php')
                .then(response => response.json())
                .then(data => {
                    const slotData = data.slotData;
                    const slotStatusCounts = { booked: 0, available: 0 };

                    // Calculate the counts of booked and available slots
                    slotData.forEach(slot => {
                        if (slot.slotstatus === '1') {
                            slotStatusCounts.booked++;
                        } else if (slot.slotstatus === '0') {
                            slotStatusCounts.available++;
                        }
                    });

                    // Calculate percentage ratios
                    const totalSlots = slotData.length;
                    const bookedPercentage = (slotStatusCounts.booked / totalSlots) * 100;
                    const availablePercentage = (slotStatusCounts.available / totalSlots) * 100;

                    // Update the pie chart
                    const ctx = document.getElementById('pieChart').getContext('2d');
                    const pieChart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: ['Booked', 'Available'],
                            datasets: [{
                                data: [slotStatusCounts.booked, slotStatusCounts.available],
                                backgroundColor: ['#1f2833', '#037e97'],
                            }]
                        }
                    });

                    // Update the data text
                    const chartDataText = document.getElementById('chartDataText');
                    chartDataText.innerHTML = `Booked: ${bookedPercentage.toFixed(2)}% (${slotStatusCounts.booked} slots)<br>Available: ${availablePercentage.toFixed(2)}% (${slotStatusCounts.available} slots)`;
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        }

        // Call the function to initially populate the chart and data text
        fetchDataAndUpdateChart();
    </script>
</body>
</html>
