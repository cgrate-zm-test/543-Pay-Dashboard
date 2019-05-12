var dashboard = {
    poolerUrl: "/cgratezm/paydashboard/pooler/stats_pooler.php",
    timerDurFetchTotalCustomers: 10000,
    timerDurFetchTotalCustomerAccounts: 10000,
    timerDurFetchTotalTransShares:600000,
    allowedOperations: {
        get_total_subs_count: "GetTotalSubsCount",
        get_trans_shares:"GetTransShares",
        get_total_cust_accounts_count:"GetTotalCustAccounts"
    },
    getTotalCustomers: function () {
        //Display a loader if required
        $.ajax({
                url: dashboard.poolerUrl,
                dateType: 'json',
                method: 'POST',
                data: {operation: dashboard.allowedOperations.get_total_subs_count},
                success: function (data) {
                    //The request only returns a number, we display as is on the total subs card.
                    $('#total_subs_card').html(parseInt(data));
                    setTimeout(dashboard.getTotalCustomers, dashboard.timerDurFetchTotalCustomers);
                }
            }
        )
    },
    getTotalCustomerAccounts:function(){
        //Display a loader if required
        $.ajax({
                url: dashboard.poolerUrl,
                dateType: 'json',
                method: 'POST',
                data: {operation: dashboard.allowedOperations.get_total_cust_accounts_count},
                success: function (data) {
                    //The request only returns a number, we display as is on the total customer accounts card.
                    $('#total_sub_accounts_card').html(parseInt(data));
                    setTimeout(dashboard.getTotalCustomerAccounts, dashboard.timerDurFetchTotalCustomerAccounts);
                }
            }
        )
    },
    getTransSharesCounts:function(){
        //Display a loader if required
        $.ajax({
                url: dashboard.poolerUrl,
                dateType: 'json',
                method: 'POST',
                data: {operation: dashboard.allowedOperations.get_trans_shares},
                success: function (data) {
                    //The request must return an associative array
                    data = JSON.parse(data);
                    if(parseInt(data.resp_code) === 0) {
                        dashboard.initTransactionSharesPieChart(data);
                        setTimeout(dashboard.getTransSharesCounts, dashboard.timerDurFetchTotalTransShares);
                    }
                }
            }
        )
    },
    initTransactionSharesPieChart: function (data) {
        ctx = document.getElementById('trans_type_share_pie_chart').getContext("2d");
        myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['PAY', 'BUY', 'SEND', 'CASH_IN', 'CASH_OUT', 'BALANCE', 'REVERSE'],
                datasets: [{
                    labels: ['PAY', 'BUY', 'SEND', 'CASH_IN', 'CASH_OUT', 'BALANCE', 'REVERSE'],
                    pointRadius: 0,
                    pointHoverRadius: 0,
                    backgroundColor: ['#e3e3e3','#4acccd','#fcc468','#ef8157','#ef3893','#89f567','#012356'],
                    borderWidth: 0,
                    data: [parseInt(data.data.PAY), parseInt(data.data.BUY), parseInt(data.data.SEND), parseInt(data.data.CASH_IN), parseInt(data.data.CASH_OUT), parseInt(data.data.BALANCE), parseInt(data.data.REVERSE)]
                }]
            },

            options: {
                legend: {
                    display: true,
                    position: 'right'
                },

                plugins: {
                    labels: {
                        render: 'percentage',
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
    }
}