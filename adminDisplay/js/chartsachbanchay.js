const ctx2 = document.getElementById("chart-4").getContext("2d");
const myChart2 = new Chart(ctx2, {
  type: "bar",
  data: {
    labels: [
      "CF01", "T02", "F01", "CF21", "CF02","T06","CF05","F04"
    ],
    datasets: [
      {
        label: "Số sản phẩm được bán",
        data: [
          1000,2000,1500,3660,2911,2412,2004,1009
        ],
        backgroundColor: [
            "rgba(255, 99, 132, 1)"
        ],
      },
    ],
  },
  options: {
    responsive: true,
  },
});