<?php
include_once dirname(__FILE__) . "./head_elements.php";
?>
</div> -->
<div class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-chart">
                <div class="card-header ">
                    <h5 class="card-title">Transaction Shares</h5>
                    <p class="card-category">Transaction type percentages</p>
                </div>
                <div class="card-body ">
                    <canvas id="trans_type_share_pie_chart"></canvas>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-history"></i> Data is refreshed every 10 minutes
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-title">Registration Trend</h5>
                    <p class="card-category">Line Chart with Points</p>
                </div>
                <div class="card-body">
                    <canvas id="speedChart"></canvas>
                </div>
                <div class="card-footer">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-history"></i> Data is refreshed every 5 hours
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-chart">
                <div class="card-header ">
                    <h5 class="card-title">Registered Users</h5>
                    <p class="card-category">Total count of registered customers</p>
                </div>
                <div class="card-body ">
                    <h1 class="text-center" id="total_subs_card">0</h1>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats" id="total_subs_refresh_eta">
                        <i class="fa fa-history" id="total_subs_refresh_eta"></i> Data is refreshed every 10 seconds
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-chart">
                <div class="card-header ">
                    <h5 class="card-title">Total Unique Accounts</h5>
                    <p class="card-category">Total count of registered customer unique accounts</p>
                </div>
                <div class="card-body ">
                    <h1 class="text-center" id="total_sub_accounts_card">0</h1>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats" id="total_subs_refresh_eta">
                        <i class="fa fa-history" id="total_sub_accounts_refresh_eta"></i> Data is refreshed every 10 seconds
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once dirname(__FILE__) . "./bottom_elements.php";
?>
<script src="assets/js/dashboard.js"></script>
<script>
    $(document).ready(function () {
        // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
        dashboard.getTotalCustomers();
        dashboard.getTotalCustomerAccounts();
        dashboard.getTransSharesCounts();
        demo.initChartsPages();
    });
</script>
</body>

</html>