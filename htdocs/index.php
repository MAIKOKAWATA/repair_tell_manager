<?php

  require_once("../inc/condb.php");
  require_once("../inc/model.php");

  $db = db();

  $indexinfo = new Indexinfo($db);
  $data = $indexinfo->outdata();

  require_once("../templete/indexHtml.php");

?>