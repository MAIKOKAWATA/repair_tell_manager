<?php

  require_once("../inc/condb.php");
  require_once("../inc/model.php");

  $db=db();

  $cusreg = new Cusreg();
  $cusreg -> mt_customer($db,$_POST["cus_com"],$_POST["cus_ruby"],$_POST["cus_depart"],$_POST["cus_name"],$_POST["cus_memo"],$_POST["err_flag"]);

  $indexinfo = new Indexinfo($db);
  $data = $indexinfo -> outdata();

  require_once("../templete/indexHtml.php");

?>