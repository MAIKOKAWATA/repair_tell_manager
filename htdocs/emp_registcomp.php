<?php

  require_once("../inc/condb.php");
  require_once("../inc/model.php");

  $db=db();

  $empreg = new Empreg();
  $empreg -> mt_employ($db,$_POST["emp_name"],$_POST["emp_ruby"],$_POST["emp_in"],$_POST["sec_emp_in"],$_POST["emp_memo"],$_POST["retire_flag"]);

  $indexinfo = new Indexinfo($db);
  $data = $indexinfo -> outdata();

  require_once("../templete/indexHtml.php");

?>