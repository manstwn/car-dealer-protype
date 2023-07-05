<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <br>
    <div>
        <h1 class="row justify-content-center">Dashboard</h1>
    </div>
    <h4>Sales Graph</h4>
    <button class="btn btn-primary" onclick="showGraph(3)">Last 3 Days</button>
    <button class="btn btn-primary" onclick="showGraph(7)">Last 7 Days</button>
    <button class="btn btn-primary" onclick="showGraph(30)">Last 30 Days</button>
    <button class="btn btn-primary" onclick="showGraph(365)">Last 1 Year</button>

    <canvas id="chart"></canvas>


    <div class="container">
        <div class="row mt-4">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Duration</th>
                            <th>Total Sales</th>
                            <th>Profit Margin</th>
                            <th>Total Profit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Last 3 Days</td>
                            <td id="totalSales3Days">-</td>
                            <td>15%</td>
                            <td id="totalProfit3Days">-</td>
                        </tr>
                        <tr>
                            <td>Last 7 Days</td>
                            <td id="totalSales7Days">-</td>
                            <td>15%</td>
                            <td id="totalProfit7Days">-</td>
                        </tr>
                        <tr>
                            <td>Last 30 Days</td>
                            <td id="totalSales30Days">-</td>
                            <td>15%</td>
                            <td id="totalProfit30Days">-</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <script>
        // Retrieve the data passed from the controller
        var prices = <?php echo json_encode($prices); ?>;
        var dates = <?php echo json_encode($dates); ?>;

        // Format the dates without the time
        var formattedDates = dates.map(function(date) {
            var dateObj = new Date(date);
            return dateObj.toLocaleDateString(); // Format date to local string without time
        });

        // Format the value to Indonesian Rupiah currency format
        function formatCurrency(value) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(value);
        }

        // Calculate total sales for each duration
        function calculateTotalSales(prices) {
            var total = prices.reduce(function(sum, price) {
                var priceValue = parseFloat(price.replace(/[^\d.-]/g, ''));
                return sum + priceValue;
            }, 0);
            return total;
        }

        // Calculate total profit for each duration (15% of total sales)
        function calculateTotalProfit(totalSales) {
            var profit = (totalSales * 0.15).toFixed(0);
            return formatCurrency(profit);
        }

        // Calculate total sales for each duration
        var totalSales3Days = calculateTotalSales(prices.slice(-3));
        var totalSales7Days = calculateTotalSales(prices.slice(-7));
        var totalSales30Days = calculateTotalSales(prices.slice(-30));

        // Update the table with the formatted total sales values
        document.getElementById("totalSales3Days").textContent = formatCurrency(totalSales3Days);
        document.getElementById("totalSales7Days").textContent = formatCurrency(totalSales7Days);
        document.getElementById("totalSales30Days").textContent = formatCurrency(totalSales30Days);

        // Update the table with the calculated total profit values
        document.getElementById("totalProfit3Days").textContent = calculateTotalProfit(totalSales3Days);
        document.getElementById("totalProfit7Days").textContent = calculateTotalProfit(totalSales7Days);
        document.getElementById("totalProfit30Days").textContent = calculateTotalProfit(totalSales30Days);

        // Create a chart using Chart.js
        var ctx = document.getElementById('chart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: formattedDates, // Use the formatted dates without time
                datasets: [{
                    label: 'Sales',
                    data: prices,
                    backgroundColor: 'rgba(0, 123, 255, 0.2)',
                    borderColor: 'rgba(0, 123, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Sales Transaction',
                        position: 'top',
                        align: 'center',
                        font: {
                            size: 16
                        }
                    }
                },
                scales: {
                    x: {
                        display: true,
                        reverse: false, // Display latest day on the right side
                        title: {
                            display: true,
                            text: 'Date'
                        },
                        animation: {
                            from: "right" // Start the animation from the right
                        }
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Sales'
                        }
                    }
                },
                tooltips: {
                    callbacks: {
                        label: function(context) {
                            var label = context.dataset.label || '';
                            var value = context.dataset.data[context.dataIndex];
                            return label + ': ' + formatCurrency(value);
                        }
                    }
                }
            }
        });

        function showGraph(days) {
            // Update the chart data based on the selected number of days
            var filteredPrices = prices.slice(-days);
            var filteredDates = formattedDates.slice(-days);

            chart.data.labels = filteredDates;
            chart.data.datasets[0].data = filteredPrices;
            chart.update();

            // Update the table with total sales and total profit values
            var totalSales = calculateTotalSales(filteredPrices);
            var totalProfit = calculateTotalProfit(totalSales);

            if (days === 3) {
                document.getElementById("totalSales3Days").textContent = formatCurrency(totalSales);
                document.getElementById("totalProfit3Days").textContent = totalProfit;
            } else if (days === 7) {
                document.getElementById("totalSales7Days").textContent = formatCurrency(totalSales);
                document.getElementById("totalProfit7Days").textContent = totalProfit;
            } else if (days === 30) {
                document.getElementById("totalSales30Days").textContent = formatCurrency(totalSales);
                document.getElementById("totalProfit30Days").textContent = totalProfit;
            }
        }
    </script>





</div>
<?= $this->endSection(); ?>