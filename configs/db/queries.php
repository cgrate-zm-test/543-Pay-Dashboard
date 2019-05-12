<?php
define("GET_TRANS_SHARES", "select operation_type, count(*) as oper_type_total from transaction_log group by operation_type");
define("GET_DAY_REG_TREND", "select date_format(regist_date, '%Y-%m-%d') as regist_date, count(*) as total_day_sub from customer where date_format(regist_date, '%Y-%m-%d') >= [{1}] group by date_format(regist_date, '%Y-%m-%d')");
define("GET_REG_CUSTOMERS", "select COUNT(*) AS total_subs from customer");
define("GET_CUST_ACCOUNTS", "select count(distinct account_number) as total_unique_custm_accounts from customer_account");