<?php


class LosinoStatsEngine{
    private $db_connection;

    /**
     * LosinoStatsEngine constructor.
     * @param $db_connection
     * @throws Exception
     */
    public function __construct($db_connection){
        if(!mysqli_ping($db_connection)){
            throw new Exception("Invalid DB Connection");
        }
        $this->db_connection = $db_connection;
    }

    /**
     * Function : Used to get the transaction shares
     * @param $db_query
     * @return array
     */
    public function get_trans_shares($db_query){
        $return_res = array();
        $sel_rs = mysqli_query($this->db_connection, $db_query);
        if($sel_rs && mysqli_num_rows($sel_rs) > 0){
            while ($sel_res_row = mysqli_fetch_assoc($sel_rs)){
                $return_res[$sel_res_row['operation_type']] = $sel_res_row['oper_type_total'];
            }
        }

        return $return_res;
    } 
	
	/**
     * Function : Used to get the issuer sub shares
     * @param $db_query
     * @return array
     */
    public function get_issuer_sub_shares($db_query){
        $return_res = array();
        $sel_rs = mysqli_query($this->db_connection, $db_query);
        if($sel_rs && mysqli_num_rows($sel_rs) > 0){
            while ($sel_res_row = mysqli_fetch_assoc($sel_rs)){
                $return_res[$sel_res_row['issuer_name']] = $sel_res_row['total_subs'];
            }
        }

        return $return_res;
    }

    /**
     * Function : Used to get the total subscriptions per day
     * @param $db_query
     * @return array
     */
    public function get_total_reg_trend($db_query){
        $return_res = array();
        $sel_rs = mysqli_query($this->db_connection, $db_query);
        if($sel_rs && mysqli_num_rows($sel_rs) > 0){
            $count = 0;
            $dates = array();
            $subs  = array();
            while ($sel_res_row = mysqli_fetch_assoc($sel_rs)){
                $dates[$count] = substr($sel_res_row['sub_date'], strlen(date('Y-')));
                $subs[$count]  = $sel_res_row['total_day_subs'];
                $count++;
            }
            $return_res = array("dates" => $dates, "subs" => $subs);
        }
        return $return_res;
    }

    /**
     * Function : Used to get the total number of subscribers.
     * @param $db_query
     * @return int
     */
    public function get_total_subs($db_query){
        $return_res = 0;
        $sel_rs = mysqli_query($this->db_connection, $db_query);
        if($sel_rs && mysqli_num_rows($sel_rs) > 0){
            $sel_res_row = mysqli_fetch_array($sel_rs);
            $return_res = $sel_res_row[0];
        }

        return $return_res;
    }
}
