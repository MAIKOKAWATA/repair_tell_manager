<?php

  require_once("../inc/condb.php");
  require_once("../inc/model.php");

  $db=db();

  $empinforegcomp = new Empinforegcomp($db);
  $data = $empinforegcomp -> t_employinfo($db,$_POST["emp_id"],$_POST["now_in_fir"],$_POST["now_in_sec"],$_POST["cus_id"]);

  $indexinfo = new Indexinfo($db);
  $data = $indexinfo -> outdata();

  require_once("../templete/indexHtml.php");

?>