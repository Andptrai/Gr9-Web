const ctx2 = document.getElementById("chart-2").getContext("2d");
const myChart2 = new Chart(ctx2, {
  type: "bar",
  data: {
    labels: [
      "T1", "T2", "T3", "T4", "T5", "T6",
      "T7", "T8", "T9", "T10", "T11", "T12"
    ],
    datasets: [
      {
        label: "Số lượng đăng kí mới",
        data: [
          80, 120, 250, 400, 150, 280,
  90, 110, 200, 300, 350, 120
        ],
        backgroundColor: [
          "rgba(75, 192, 192, 1)"
        ],
      },
    ],
  },
  options: {
    responsive: true,
  },
});
