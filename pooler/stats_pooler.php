<?php

include_once dirname(__FILE__) . "/../configs/db/queries.php";
include_once dirname(__FILE__) . "/../configs/db/creds.php";
include_once dirname(__FILE__)."/../configs/configs.php";
include_once dirname(__FILE__) . "/../engine/losino_stats_engine.php";

$possible_operations = array(
    "get_trans_shares" => "GetTransShares",
    "get_sub_trend_stats" => "GetSubTrendStats",
    "get_total_subs_count" => "GetTotalSubsCount",
    "get_total_cust_accounts_count" => "GetTotalCustAccounts",
    "get_total_issuer_subs_count" => "GetTotalIsserSubsCount"
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
    $past_date = date('Y-m-d', strtotime("-".PAST_DATE_NO." days"));
    $sel_qr = str_replace("{past_n_days_date}", $past_date, GET_TRANS_SHARES);
    $trans_shares = $stats_engine->get_trans_shares($sel_qr);
    echo json_encode(array('resp_code' => 0, 'data' => $trans_shares));
}
elseif ($operation != "" && $operation == $possible_operations['get_total_issuer_subs_count']) {
    $trans_shares = $stats_engine->get_issuer_sub_shares(GET_ISSUER_SUB_SHARES);
    echo json_encode(array('resp_code' => 0, 'data' => $trans_shares));
}
elseif ($operation != "" && $operation == $possible_operations['get_sub_trend_stats']) {
    //Get N days ago total subs
    $past_date = date('Y-m-d', strtotime("-".PAST_DATE_NO." days"));
    $sel_qr = str_replace("{past_n_days_date}", $past_date, GET_PAST_DATE_TOTAL_SUBS);
    $past_date_total_subs = $stats_engine->get_total_subs($sel_qr);

    //Get total subs each day after N days ago
    $sel_qr = str_replace("{past_n_days_date}", $past_date, GET_DAY_REG_TREND);
    $past_date_subs_and_dates = $stats_engine->get_total_reg_trend($sel_qr);
    $past_date_subs = isset($past_date_subs_and_dates['subs']) ? $past_date_subs_and_dates['subs'] : array();
    $past_date_dates = isset($past_date_subs_and_dates['dates']) ? $past_date_subs_and_dates['dates'] : array();
    $past_date_cum_subs = array();
    for($i = 0; $i < count($past_date_subs); $i++){
        if($i == 0){
            $past_date_cum_subs[$i] = $past_date_total_subs + $past_date_subs[$i];
        }
        else{
            $past_date_cum_subs[$i] = $past_date_cum_subs[($i - 1)] + $past_date_subs[$i];
        }
        $past_date_subs[$i] = $past_date_subs[$i] + $past_date_total_subs; //Just to normalize the chart look
    }
    echo json_encode(array('resp_code'=> 0, 'dates'=> $past_date_dates, 'subs' => $past_date_subs, 'cum_subs' => $past_date_cum_subs));
} else {
    echo "Invalid Parameters!";
}
mysqli_close($db_connection);
