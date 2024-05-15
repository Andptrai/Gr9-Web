var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4) {
        if (this.status == 200) {
            var data = JSON.parse(this.responseText);

            // Tạo mảng cho labels và data
            var labels = [];
            var totalOrders = [];

            // Đổ dữ liệu từ JSON vào các mảng
            data.forEach(function(item) {
                labels.push(item.full_name);
                totalOrders.push(item.total_orders);
            });

            // Vẽ biểu đồ cột bằng Chart.js
            var ctx = document.getElementById("myBarChart").getContext('2d');
            var myBarChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Total Orders',
                        backgroundColor: 'rgba(2,117,216,1)',
                        borderColor: 'rgba(2,117,216,1)',
                        data: totalOrders
                    }]
                },
                options: {
                    scales: {
                        xAxes: [{
                            ticks: {
                                autoSkip: false
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                stepSize: 1
                            }
                        }]
                    },
                    legend: {
                        display: false
                    }
                }
            });
        } else {
            console.log("Error: " + this.status); // Ghi lại lỗi
        }
    }
};
xhttp.open("GET", "/php/getChartData.php", true);
xhttp.send();
