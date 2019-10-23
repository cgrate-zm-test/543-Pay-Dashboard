var dashboard = {
    poolerUrl: "/cgratezm/paydashboard/pooler/stats_pooler.php",
    timerDurFetchTotalIssuerCustomers: 600000,
    timerDurFetchTotalCustomerAccounts: 10000,
    timerDurFetchTotalTransShares:600000,
    timerDurFetchSubTrendStats:60000*(60*5),
    allowedOperations: {
        get_total_issuer_subs_count: "GetTotalIsserSubsCount",
        get_total_cust_accounts_count:"GetTotalCustAccounts"
    },
    getTotalIssuerCustomers:function(){
        //Display a loader if required
        $.ajax({
                url: dashboard.poolerUrl,
                dateType: 'json',
                method: 'POST',
                data: {operation: dashboard.allowedOperations.get_total_issuer_subs_count},
                success: function (data) {
                    //The request must return an associative array
                    data = JSON.parse(data);
                    if(parseInt(data.resp_code) === 0) {
                        dashboard.initIssuerSubsSharesPieChart(data.data);
                        setTimeout(dashboard.getTotalIssuerCustomers, dashboard.timerDurFetchTotalIssuerCustomers);
                    }
                }
            }
        )
    },
    initIssuerSubsSharesPieChart: function (data) {
        ctx    = document.getElementById('total_issuer_subs_pie_chart').getContext("2d");
		keys   = [];
		values = [];
		for(var key in data){
			keys.push(key);
			values.push( parseInt(data[key])); 
		}
		console.log("The data is : "+keys);
        myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: keys,
                datasets: [{
                    labels: keys,
                    pointRadius: 0,
                    pointHoverRadius: 0,
                    backgroundColor: ['#e3e3e3','#4acccd','#fcc468','#ef8157','#ef3893','#89f567','#012356'],
                    borderWidth: 0,
                    data: values
                }]
            },

            options: {
                legend: {
                    display: true,
                    position: 'right'
                },

                plugins: {
                    labels: {
                        render: 'value',
                        fontColor: '#000',
                        precision: 2,
                        position: 'outside'
                    }
                },

                tooltips: {
                    enabled: true
                },

                scales: {
                    yAxes: [{
                        ticks: {
                            display: false
                        },
                        gridLines: {
                            drawBorder: false,
                            zeroLineColor: "transparent",
                            color: 'rgba(255,255,255,0.05)'
                        }

                    }],

                    xAxes: [{
                        barPercentage: 1.6,
                        gridLines: {
                            drawBorder: false,
                            color: 'rgba(255,255,255,0.1)',
                            zeroLineColor: "transparent"
                        },
                        ticks: {
                            display: false,
                        }
                    }]
                },
            }
        });
    },
    initSubscriptionTrendLineChart:function(data){
        var speedCanvas = document.getElementById("sub_trend_line_chart");
        var dataFirst = {
            label:'Per Day',
            data: data.subs,
            fill: false,
            borderColor: '#fbc658',
            backgroundColor: 'transparent',
            pointBorderColor: '#fbc658',
            pointRadius: 4,
            pointHoverRadius: 4,
            pointBorderWidth: 8,
        };

        var dataSecond = {
            label:'Cumulative',
            data: data.cum_subs,
            fill: true,
            borderColor: '#51CACF',
            backgroundColor: 'transparent',
            pointBorderColor: '#51CACF',
            pointRadius: 4,
            pointHoverRadius: 4,
            pointBorderWidth: 8
        };

        var speedData = {
            labels: data.dates,
            datasets: [dataFirst, dataSecond]
        };

        var chartOptions = {
            legend: {
                display: true,
                position: 'top'
            }
        };

        var lineChart = new Chart(speedCanvas, {
            type: 'line',
            hover: false,
            data: speedData,
            options: chartOptions
        });
    }
}