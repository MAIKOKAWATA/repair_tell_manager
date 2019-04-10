<?php

  require_once("../inc/condb.php");
  require_once("../inc/model.php");

  $db=db();

  $empinfodata = new Empinfodata($db);
  $data = $empinfodata -> selempinfoid($db,$_POST["empinfo_id"]);

  require_once("../templete/dataHtml.php");

?>