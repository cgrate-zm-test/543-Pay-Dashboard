<?php

include_once dirname(__FILE__) . "/../configs/db/queries.php";
include_once dirname(__FILE__) . "/../configs/db/creds.php";
include_once dirname(__FILE__) . "/../engine/losino_stats_engine.php";

$possible_operations = array(
    "get_trans_shares" => "GetTransShares",
    "get_each_day_sub_counts" => "GetSubCountsPerDay",
    "get_each_day_cum_sub_counts" => "GetSubCumCountsPerDay",
    "get_total_subs_count" => "GetTotalSubsCount",
    "get_total_cust_accounts_count" => "GetTotalCustAccounts"
);

$operation = isset($_POST['operation']) ? stripslashes($_POST['operation']) : "";


$db_connection = mysqli_connect(DB_HOST_NAME, DB_USER_NAME, DB_PASSWORD, DB_NAME) or die("Unable to get DB resource connection");
$stats_engine = new LosinoStatsEngine($db_connection);

if ($operation != "" && $operation == $possible_operations['get_total_subs_count']) {
    $total_subs = $stats_engine->get_total_subs(GET_REG_CUSTOMERS);
    echo $total_subs;
}
elseif ($operation != "" && $operation == $possible_operations['get_total_cust_accounts_count']) {
    $total_subs = $stats_engine->get_total_subs(GET_CUST_ACCOUNTS);
    echo $total_subs;
}
elseif ($operation != "" && $operation == $possible_operations['get_trans_shares']) {
    $trans_shares = $stats_engine->get_trans_shares(GET_TRANS_SHARES);
    echo json_encode(array('resp_code' => 0, 'data' => $trans_shares));
}
elseif ($operation != "" && $operation == $possible_operations['get_each_day_sub_counts']) {

}
elseif ($operation != "" && $operation == $possible_operations['get_each_day_cum_sub_counts']) {

} else {
    echo "Invalid Parameters!";
}
mysqli_close($db_connection);