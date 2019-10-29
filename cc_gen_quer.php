<?php
$feature_name = 'cc_gen_quer';
$page_title = "General Query Form";
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Merchant Name:</label>
                                    <input type="text" class="form-control" placeholder="Merchant Name"
                                           id="merchant_name" name="merchant_name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Request Deprtmnt</label>
                                    <input type="text" class="form-control" placeholder="Request Department"
                                           id="req_deprtmnt" name="req_deprtmnt">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Agent Name:</label>
                                    <input type="text" class="form-control" placeholder="Agent Name" id="agent_name"
                                           name="agent_name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Narration</label>
                                    <textarea class="form-control" placeholder="Narration..." id="narration"
                                              name="narration" cols="2" ></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Time of Deposit</label>
                                    <input type="text" class="form-control" placeholder="" id="time_of_deposit"
                                           name="time_of_deposit">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Time of Call</label>
                                    <input type="text" class="form-control" placeholder="" id="time_of_call"
                                           name="time_of_call">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Was Delayed</label>
                                    <select id="req_type" name="req_type" class="form-control">
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Correct Narration</label>
                                    <select id="correct_narration" name="correct_narration" class="form-control">
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Request Status</label>
                                    <select id="req_status" name="req_status" class="form-control">
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Request Type</label>
                                    <select id="req_type" name="req_type" class="form-control">
                                        <option>Yes</option>
                                        <option>No</option>
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