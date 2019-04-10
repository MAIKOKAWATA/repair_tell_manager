<?php

session_start();

  require_once("../inc/condb.php");
  require_once("../inc/model.php");
  
$db=db();

$editnondata = new Editnondata();
$editnondata -> mt_employ_up($db,$_POST["emp_in"],$_POST["sec_emp_in"],$_POST["emp_memo"],$_POST["retire_flag"],$_POST["emp_id"]);

include_once("../htdocs/index.php");

?>