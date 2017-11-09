

// Flot Pie Chart with Tooltips
$(function() {

    var data = [{
        label: " Firefox",
        data: 122
    }, {
        label: "Chrome",
        data: 12
    }, {
        label: "IE",
        data: 92
    }, {
        label: "IE",
        data: 92
    }, {
        label: "Opera",
        data: 1
    }];

    var plotObj = $.plot($("#flot-pie-chart"), data, {
        series: {
            pie: {
                show: true
            }
        },
        grid: {
            hoverable: true
        },
        tooltip: true,
        tooltipOpts: {
            content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
            shifts: {
                x: 20,
                y: 0
            },
            defaultTheme: false
        }
    });

});
