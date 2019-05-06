<?php
include_once dirname(__FILE__)."./head_elements.php";
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
                <canvas id="chartEmail"></canvas>
              </div>
              <div class="card-footer ">
                <div class="chart-legend text-center">
                  <i class="fa fa-circle text-primary"></i> Pay
                  <i class="fa fa-circle text-warning"></i> Buy
                  <i class="fa fa-circle text-danger"></i> Send
                  <i class="fa fa-circle text-gray"></i> Cashin
                  <i class="fa fa-circle text-info"></i> Cashout
                </div>
                  <hr>
                  <div class="stats">
                      <i class="fa fa-history"></i> Updated 3 minutes ago
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
                        <div class="chart-legend text-center">
                            <i class="fa fa-circle text-info"></i> Total Registrations
                            <i class="fa fa-circle text-warning"></i> New Registrations
                        </div>
                        <hr>
                        <div class="stats">
                            <i class="fa fa-history"></i> Updated 3 minutes ago
                        </div>
                    </div>
                </div>
            </div>
        </div>
          <div class="row">
              <div class="col-md-12">
                  <div class="card card-chart">
                      <div class="card-header ">
                          <h5 class="card-title">Registered Users</h5>
                          <p class="card-category">24 Hours performance</p>
                      </div>
                      <div class="card-body ">
                          <h1 class="text-center">5698</h1>
                      </div>
                      <div class="card-footer ">
                          <hr>
                          <div class="stats">
                              <i class="fa fa-history"></i> Updated 3 minutes ago
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
<?php
include_once dirname(__FILE__)."./bottom_elements.php";
?>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
</body>

</html>