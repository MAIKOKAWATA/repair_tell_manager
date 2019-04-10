<?php

  require_once("../inc/condb.php");
  require_once("../inc/model.php");

  $db=db();

  $empmemoinfo = new Empmemoinfo($db);
  $data = $empmemoinfo -> selempmemodata();

  require_once("../templete/empmemoHtml.php");

?>