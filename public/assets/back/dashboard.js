// function loadNumberOfOnlineUsers() {
//     let reFresh = setTimeout(loadNumberOfOnlineUsers, 1000);
//     $.get(
//         "/users-online",
//         (response) => {
//             $("#user").text(response.userOnline);
//         },
//         "json"
//     );
// }

$(function () {
    $.getJSON("/customers-stat-data", (data) => {
        var donutChartCanvas = $("#donutChart").get(0).getContext("2d");
        const backGroundColors = {
            Unassigned: "#8c8c8c",
            Assigned: "yellow",
            Contacted: "#0000ff",
            "Met Customer": "green",
            "Not Contactable": "red",
        };

        const dataCount = Object.keys(data).length;

        if (dataCount > 0) {
            let label = [],
                value = [],
                backColor = [];

            for (const i in data) {
                label.push(i);
                value.push(data[i]);
                backColor.push(backGroundColors[i]);
            }

            var donutData = {
                labels: label,
                datasets: [
                    {
                        data: value,
                        backgroundColor: backColor,
                    },
                ],
            };

            var donutOptions = {
                maintainAspectRatio: false,
                responsive: true,
            };

            new Chart(donutChartCanvas, {
                type: "doughnut",
                data: donutData,
                options: donutOptions,
            });
        } else {
        }
    });

    $.getJSON("/therapist-stat-data", (data) => {
        var donutChartCanvas = $("#therapistChart").get(0).getContext("2d");
        const backGroundColors = {
            Registered: "red",
            Inactive: "yellow",
            Active: "green",
        };

        const dataCount = Object.keys(data).length;

        if (dataCount > 0) {
            let label = [],
                value = [],
                backColor = [];

            for (const i in data) {
                label.push(i);
                value.push(data[i]);
                backColor.push(backGroundColors[i]);
            }

            var donutData = {
                labels: label,
                datasets: [
                    {
                        data: value,
                        backgroundColor: backColor,
                    },
                ],
            };

            var donutOptions = {
                maintainAspectRatio: false,
                responsive: true,
            };

            new Chart(donutChartCanvas, {
                type: "doughnut",
                data: donutData,
                options: donutOptions,
            });
        } else {
        }
    });
});

// loadNumberOfOnlineUsers();
