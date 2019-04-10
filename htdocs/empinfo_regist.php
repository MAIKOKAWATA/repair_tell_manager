<?php

  require_once("../inc/condb.php");
  require_once("../inc/model.php");

  $db=db();

  $empinforeg = new Empinforeg($db);

  require_once("../templete/empinfo_registHtml.php");

?>