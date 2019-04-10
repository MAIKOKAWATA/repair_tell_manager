<?php

session_start();

  require_once("../inc/condb.php");
  require_once("../inc/model.php");
  
$db=db();

$editdata = new Editdata();
$editdata -> mt_employ_up($db,$_POST["emp_in"],$_POST["sec_emp_in"],$_POST["emp_memo"],$_POST["retire_flag"],$_POST["emp_id"]);
$editdata -> t_employinfo_up($db,$_POST["now_in_fir"],$_POST["now_in_sec"],$_POST["empinfo_id"]);
$editdata -> mt_customer_up($db,$_POST["cus_memo"],$_POST["cus_id"]);

include_once("../htdocs/index.php");
?>