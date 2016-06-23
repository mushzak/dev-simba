$(function () {

var tooltipTable = function () {
    if (this.points.length != Object.keys(pct).length) return tthtml; // !!!workaround: change series color rizes tooltip!!!
    var _color = '#fff', _pct = 0, _sum = 0;
    tthtml  = '<table><thead><tr>';
    tthtml += '<th colspan="3">Performance chart</th>';
    tthtml += '</tr></thead><tbody>';
    $.each(this.points, function (i, x) {
        _color = colors[i];
        tthtml += '<tr>';
        tthtml += '<td style="color: ' + _color + '">' + this.series.name + '</td>';
        tthtml += '<td style="color: ' + _color + '">' + numeral(pct[this.series.name]).format('0.0%') +'</td>';
        tthtml += '<td style="color: ' + _color + '">+' + numeral(this.y).format('$0,0') + '</td>';
        tthtml += '</tr>';
        _pct += pct[this.series.name];
        _sum += this.y;
    });
    tthtml += '</tbody><tfoot><tr>';
    tthtml += '<td>Estimated Additional Return</td>';
    tthtml += '<td>' + numeral(_pct).format('0.0%') +'</td>';
    tthtml += '<td>+' + numeral(_sum).format('$0,0') + '</td>';
    tthtml += '</tr></tfoot></table>';
    return tthtml;
};

//    var colors     = ['#6bff84', '#30d94c', '#27ae60', '#00ccff', '#0099ff'];
//    var colorsDark = ['#4bb35c', '#24a63a', '#1c8045', '#008fb3', '#006bb3'];
var colors     = ['#ffdb4d', '#bdd15f', '#70bb83', '#39ac9e', '#00cccc'];
var colorsDark = ['#ffb137', '#8fa444', '#508d5e', '#297f73', '#008f8f'];
var pct = {
    "Index Funds Over Mutual Funds": 0.021,
    "Tax-Loss Harvesting":           0.010,
    "Tax-Aware Allocation":          0.006,
    "Optimal Allocation":            0.005,
    "Automatic Rebalancing":         0.004
};

// Show tooltip on start or mouse leave
var showDefaultTooltip = function () {
    var tooltipPoints = [];
    var n = chart.series[0].data.length - 1;
    for (var key in chart.series) {
        tooltipPoints.push(chart.series[key].data[n]);
    }
    chart.tooltip.refresh(tooltipPoints);
};

var chart = new Highcharts.Chart({
    credits: {
        enabled: false
    },
    chart: {
        renderTo: 'perf-chart',
        backgroundColor: '#292b33',
        type: 'column'
    },
    title: {
        text: ''
    },
    yAxis: {
        min: 0,
        labels: {
            style: {
                color: '#fff'
            },
            formatter: function () {
                return '+' + (this.value / 1000) + 'k';
            }
        },
        title: {
            enabled: false,
        },
        gridLineColor: '#666',
        lineColor: '#666',
        tickColor: '#666',
        opposite: true
    },
    xAxis: {
        labels: {
            enabled: true,
            step: 10,
            style: {
                color: '#fff'
            },
            formatter: function () {
                return this.value == 0 ? '' : '' + (this.value / 4) + ' years';
            }
        },
        gridLineWidth: 0,
        gridLineColor: '#666',
        lineColor: '#666',
        tickColor: '#666',
        minorGridLineColor: '#666',
        tickInterval: 4,
        minorTickInterval: 4
    },
    legend: {
        enabled: false
    },
    tooltip: {
        shared: true,
        formatter: tooltipTable,
        crosshairs: [{color: '#999'}, false],

        backgroundColor: 'transparent',
        borderWidth: 0,
        borderColor: '#666',
        shadow: false,
        useHTML: true,
        padding: 2,
        positioner: function () {
            return {x: 16, y: 1};
        }
    },

    plotOptions: {
        series: {
            pointPadding: 0.1,
            groupPadding: 0.1,
            animation: false
        },
        column: {
            stacking: 'normal',
            grouping: true,
            shadow: false,
            borderWidth: 0
        }
    },
    series: [
        {
            name: 'Index Funds Over Mutual Funds',
            color: colors[0],
            data: [0, 525, 1050, 1575, 2100, 2665.7925, 3231.585, 3797.3775, 4363.17, 4972.925, 5582.68, 6192.435, 6802.19, 7459.3225, 8116.455, 8773.5875, 9430.72, 10138.9125, 10847.105, 11555.2975, 12263.49, 13026.7075, 13789.925, 14553.1425, 15316.36, 16138.88, 16961.4, 17783.92, 18606.44, 19492.87, 20379.3, 21265.73, 22152.16, 23107.465, 24062.77, 25018.075, 25973.38, 27002.9125, 28032.445, 29061.9775, 30091.51, 31201.0375, 32310.565, 33420.0925, 34529.62, 35725.36, 36921.1, 38116.84, 39312.58, 40601.225, 41889.87, 43178.515, 44467.16, 45855.935, 47244.71, 48633.485, 50022.26, 51518.9425, 53015.625, 54512.3075, 56008.99, 57621.965, 59234.94, 60847.915, 62460.89, 64199.1925, 65937.495, 67675.7975, 69414.1, 71287.47, 73160.84, 75034.21, 76907.58, 78926.51, 80945.44, 82964.37, 84983.3, 87159.1, 89334.9, 91510.7, 93686.5]
        },
        {
            name: 'Tax-Loss Harvesting',
            color: colors[1],
            data: [0, 250, 500, 750, 1e3, 1269.425, 1538.85, 1808.275, 2077.7, 2368.06, 2658.42, 2948.78, 3239.14, 3552.06, 3864.98, 4177.9, 4490.82, 4828.0525, 5165.285, 5502.5175, 5839.75, 6203.1875, 6566.625, 6930.0625, 7293.5, 7685.1775, 8076.855, 8468.5325, 8860.21, 9282.32, 9704.43, 10126.54, 10548.65, 11003.5575, 11458.465, 11913.3725, 12368.28, 12858.5325, 13348.785, 13839.0375, 14329.29, 14857.6375, 15385.985, 15914.3325, 16442.68, 17012.0775, 17581.475, 18150.8725, 18720.27, 19333.9125, 19947.555, 20561.1975, 21174.84, 21836.16, 22497.48, 23158.8, 23820.12, 24532.8275, 25245.535, 25958.2425, 26670.95, 27439.0325, 28207.115, 28975.1975, 29743.28, 30571.0425, 31398.805, 32226.5675, 33054.33, 33946.4125, 34838.495, 35730.5775, 36622.66, 37584.055, 38545.45, 39506.845, 40468.24, 41504.335, 42540.43, 43576.525, 44612.62]
        },
        {
            name: 'Tax-Aware Allocation',
            color: colors[2],
            data: [0, 150, 300, 450, 600, 761.655, 923.31, 1084.965, 1246.62, 1420.835, 1595.05, 1769.265, 1943.48, 2131.2325, 2318.985, 2506.7375, 2694.49, 2896.83, 3099.17, 3301.51, 3503.85, 3721.9125, 3939.975, 4158.0375, 4376.1, 4611.1075, 4846.115, 5081.1225, 5316.13, 5569.395, 5822.66, 6075.925, 6329.19, 6602.135, 6875.08, 7148.025, 7420.97, 7715.1225, 8009.275, 8303.4275, 8597.58, 8914.5875, 9231.595, 9548.6025, 9865.61, 10207.2475, 10548.885, 10890.5225, 11232.16, 11600.345, 11968.53, 12336.715, 12704.9, 13101.6925, 13498.485, 13895.2775, 14292.07, 14719.695, 15147.32, 15574.945, 16002.57, 16463.42, 16924.27, 17385.12, 17845.97, 18342.6275, 18839.285, 19335.9425, 19832.6, 20367.8475, 20903.095, 21438.3425, 21973.59, 22550.4275, 23127.265, 23704.1025, 24280.94, 24902.5975, 25524.255, 26145.9125, 26767.57]
        },
        {
            name: 'Optimal Allocation',
            color: colors[3],
            data: [0, 125, 250, 375, 500, 634.7125, 769.425, 904.1375, 1038.85, 1184.03, 1329.21, 1474.39, 1619.57, 1776.03, 1932.49, 2088.95, 2245.41, 2414.0275, 2582.645, 2751.2625, 2919.88, 3101.5975, 3283.315, 3465.0325, 3646.75, 3842.5875, 4038.425, 4234.2625, 4430.1, 4641.155, 4852.21, 5063.265, 5274.32, 5501.775, 5729.23, 5956.685, 6184.14, 6429.2675, 6674.395, 6919.5225, 7164.65, 7428.8225, 7692.995, 7957.1675, 8221.34, 8506.04, 8790.74, 9075.44, 9360.14, 9666.96, 9973.78, 10280.6, 10587.42, 10918.08, 11248.74, 11579.4, 11910.06, 12266.4125, 12622.765, 12979.1175, 13335.47, 13719.5125, 14103.555, 14487.5975, 14871.64, 15285.5225, 15699.405, 16113.2875, 16527.17, 16973.21, 17419.25, 17865.29, 18311.33, 18792.0275, 19272.725, 19753.4225, 20234.12, 20752.1675, 21270.215, 21788.2625, 22306.31]
        },
        {
            name: 'Automatic Rebalancing',
            color: colors[4],
            data: [0, 100, 200, 300, 400, 507.77, 615.54, 723.31, 831.08, 947.2225, 1063.365, 1179.5075, 1295.65, 1420.82, 1545.99, 1671.16, 1796.33, 1931.2225, 2066.115, 2201.0075, 2335.9, 2481.275, 2626.65, 2772.025, 2917.4, 3074.07, 3230.74, 3387.41, 3544.08, 3712.925, 3881.77, 4050.615, 4219.46, 4401.4225, 4583.385, 4765.3475, 4947.31, 5143.4125, 5339.515, 5535.6175, 5731.72, 5943.0575, 6154.395, 6365.7325, 6577.07, 6804.83, 7032.59, 7260.35, 7488.11, 7733.5675, 7979.025, 8224.4825, 8469.94, 8734.4675, 8998.995, 9263.5225, 9528.05, 9813.1325, 10098.215, 10383.2975, 10668.38, 10975.6125, 11282.845, 11590.0775, 11897.31, 12228.415, 12559.52, 12890.625, 13221.73, 13578.5625, 13935.395, 14292.2275, 14649.06, 15033.6175, 15418.175, 15802.7325, 16187.29, 16601.73, 17016.17, 17430.61, 17845.05]
        }
    ]
});

var darken = false;
var darkenTimeout = null;

$('#perf-chart').mouseover(function () {
        clearTimeout(darkenTimeout);
        if (darken) return;
        darken = true;
        for (var key in chart.series) {
            chart.series[key].options.color = colorsDark[key];
            chart.series[key].update(chart.series[key].options);
        }
    })
    .mouseout(function () {
        clearTimeout(darkenTimeout);
        if (!darken) return;
        darkenTimeout = setTimeout(function () {
            darken = false;
            for (var key in chart.series) {
                chart.series[key].options.color = colors[key];
                chart.series[key].update(chart.series[key].options);
            }
            showDefaultTooltip();
        }, 100);
    });

showDefaultTooltip();

// Do not hide tooltip
(function (H) {
    H.wrap(H.Tooltip.prototype, 'hide', function (defaultCallback) { });
}(Highcharts));

var sliderChange = function() {
    var num = b.getValue();
    $('.calculator-control-value').text(numeral(num).format('$0,0'));
    $('.calculator-value').text(numeral(Math.max(0, .0025*(num-1e4)/12)).format('$0,0.00'));
};
var b = $('#B').slider()
    .on('change', sliderChange)
    .data('slider');
sliderChange();

});
