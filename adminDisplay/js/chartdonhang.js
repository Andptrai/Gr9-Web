const statuses = [
  { status: 'Đã giao', value: 613, color: 'rgba(0, 128, 0, 1)' }, // Màu xanh
  { status: 'Đang giao', value: 104, color: 'rgba(255, 206, 86, 1)' }, // Màu vàng
  { status: 'Chờ xác nhận', value: 80, color: 'rgba(0, 119, 172, 1)' }, // Màu Hồng
  { status: 'Đã Hủy', value: 20, color: 'rgba(255, 0, 0, 2)' }, // Màu đỏ
];

const ctx = document.getElementById('myChart').getContext('2d');

const data = {
  labels: statuses.map(item => item.status),
  datasets: [{
    label: "Thống kê đơn hàng trong tháng 12",
    data: statuses.map(item => item.value),
    backgroundColor: statuses.map(item => item.color),
    borderWidth: 1,
  }]
};

const myChart = new Chart(ctx, {
  type: 'bar',
  data: data,
  options: {
    responsive: true,
    legend: {
      display: false,
    },
  },
});
const ctx2 = document.getElementById("chart-3").getContext("2d");
const myChart2 = new Chart(ctx2, {
  type: "bar",
  data: {
    labels: [
      "T1", "T2", "T3", "T4", "T5", "T6",
      "T7", "T8", "T9", "T10", "T11", "T12"
    ],
    datasets: [
      {
        label: "Thống kê đơn hàng năm 2023",
        data: [
          1607, 2300, 1000, 1500, 2800, 4000,
  3500, 4800, 2700, 3100, 4200, 614
        ],
        backgroundColor: [
          "rgba(153, 102, 255, 1)"
        ],
      },
    ],
  },
  options: {
    responsive: true,
  },
});



