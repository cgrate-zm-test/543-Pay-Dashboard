<?php
$feature_name = 'cc_cout_quer';
$page_title = "Cashout Query Form";
include_once dirname(__FILE__) . "/./head_elements.php";
?>
</div> -->
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Query Form</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-md-5 pr-1">
                                <div class="form-group">
                                    <label>Customer No</label>
                                    <input type="text" class="form-control" placeholder="Customer number" id="customer_no" name="customer_no">
                                </div>
                            </div>
                            <div class="col-md-3 px-1">
                                <div class="form-group">
                                    <label>Cashout Code</label>
                                    <input type="text" class="form-control" placeholder="Cashout Code" id="cout_code" name="cout_code">
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label>SMS Status</label>
                                    <select id="sms_status" name="sms_status" class="form-control">
                                        <option>Delivered</option>
                                        <option>Not Delivered</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="update ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary btn-round">Send Query</button>
                            </div>
                        </div>
                    </form>
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