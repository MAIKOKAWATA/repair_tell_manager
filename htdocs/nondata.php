<?php

  require_once("../inc/condb.php");
  require_once("../inc/model.php");

  $db=db();

  $empdata = new Empdata($db);
  $data = $empdata -> selempid($db,$_POST["emp_id"]);

  require_once("../templete/nondataHtml.php");

?>