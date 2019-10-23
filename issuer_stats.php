<?php
$feature_name = 'issuer_stats';
include_once dirname(__FILE__) . "/./head_elements.php";
?>
</div> -->
<div class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-chart">
                <div class="card-header ">
                    <h5 class="card-title">Total Subs Per Issuer</h5>
                    <p class="card-category">Total count of registered customers per issuer</p>
                </div>
                <div class="card-body ">
                    <canvas id="total_issuer_subs_pie_chart"></canvas>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats" id="total_issuer_subs_refresh_eta">
                        <i class="fa fa-history" id="total_issuer_subs_refresh_eta"></i> Data is refreshed every 10 seconds
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-title">Total New Issuer Subs</h5>
                    <p class="card-category">Total count of yesterday's new registration per issuer</p>
                </div>
                <div class="card-body ">
                    <h1 class="text-center" id="total_new_sub_card">0</h1>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats" id="total_new_subs_refresh_eta">
                        <i class="fa fa-history" id="total_new_sub_refresh_eta"></i> Data can only be manually refreshed
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once dirname(__FILE__) . "/./bottom_elements.php";
?>
<script src="assets/js/issuer_stats.js"></script>
<script>
    $(document).ready(function () {
        // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
        dashboard.getTotalIssuerCustomers();
    });
</script>
</body>

</html>
