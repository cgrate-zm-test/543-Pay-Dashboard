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
     * Function : Used to get the total subscriptions per day
     * @param $db_query
     * @return array
     */
    public function get_total_reg_trend($db_query){
        $return_res = array();
        $sel_rs = mysqli_query($this->db_connection, $db_query);
        if($sel_rs && mysqli_num_rows($sel_rs) > 0){
            $row_num = 0;
            while ($sel_res_row = mysqli_fetch_array($sel_rs)){
                $return_res[$row_num]['date'] = $sel_res_row[0];
                $return_res[$row_num]['total'] = $sel_res_row[1];
                ++$row_num;
            }
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