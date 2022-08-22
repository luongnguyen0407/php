new Chart(document.getElementById("line-chart"), {
  type: "line",
  data: {
    labels: [
      "Tháng 1",
      "Tháng 2",
      "Tháng 3",
      "Tháng 4",
      "Tháng 5",
      "Tháng 6",
      "Tháng 7",
      "Tháng 8",
      "Tháng 9",
      "Tháng 10",
      "Tháng 11",
      "Tháng 12",
    ],
    datasets: [
      {
        data: [86, 114, 106, 106, 107, 111, 133, 221, 783, 2478, 3002, 2978],
        label: "Doanh Số",
        borderColor: "#6c7ee1",
        fill: false,
      },
      {
        data: [282, 350, 411, 502, 635, 809, 947, 1402, 3700, 5267, 7003, 6873],
        label: "Doanh Thu",
        borderColor: "#ffc4a4",
        fill: false,
      },
      {
        data: [168, 170, 178, 190, 203, 276, 408, 547, 675, 734, 940, 1300],
        label: "Nhân Viên",
        borderColor: "#c688eb",
        fill: false,
      },
      {
        data: [40, 20, 10, 16, 24, 38, 74, 167, 508, 784, 792, 985],
        label: "Hàng Tổn",
        borderColor: "#fba2d0",
        fill: false,
      },
      {
        data: [6, 3, 2, 2, 7, 26, 82, 172, 312, 433, 603, 845],
        label: "Thành Viên",
        borderColor: "#c45850",
        fill: false,
      },
    ],
  },
  options: {
    title: {
      display: true,
      text: "World population per region (in millions)",
    },
  },
});
