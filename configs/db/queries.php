<?php
define("GET_TRANS_SHARES", "select operation_type, count(*) as oper_type_total from transaction_log where date_format(timestamp, '%Y-%m-%d') >= '{past_n_days_date}' group by operation_type");
define("GET_ISSUER_SUB_SHARES", "select SUBSTRING_INDEX(issuer, '.', -1) as 'issuer_name', count(*) as 'total_subs' from customer_account group by issuer");
define("GET_DAY_REG_TREND", "select date_format(create_date, '%Y-%m-%d') as sub_date, count(*) as total_day_subs from customer where date_format(create_date, '%Y-%m-%d') >= '{past_n_days_date}' group by date_format(create_date, '%Y-%m-%d') order by date_format(create_date, '%Y-%m-%d') asc");
define("GET_PAST_DATE_TOTAL_SUBS", "select count(*) as total_subs from customer where date_format(create_date, '%Y-%m-%d') < '{past_n_days_date}'");
define("GET_REG_CUSTOMERS", "select COUNT(*) AS total_subs from customer");
define("GET_CUST_ACCOUNTS", "select count(account_number) as total_unique_custm_accounts from customer_account");
