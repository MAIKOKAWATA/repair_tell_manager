<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta http-equiv="content-language" content="ja">
    <link rel="stylesheet" href="../css/themes/lavender.css" />
    <link rel="stylesheet" href="../css/themes/jquery.mobile.icons.min.css" />
    <link rel="stylesheet" href="../css/themes/lavender.min.css" />
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
   		$(document).on('mobileinit', function() {
			$.mobile.ajaxEnabled = false;
  		});
      function conf(empinfo_id){
        document.getElementById("empinfo_id").value=empinfo_id;
        document.getElementById("up_data").action="../htdocs/data.php";
        document.getElementById("up_data").submit();
      }
      function see(emp_id){
        document.getElementById("emp_id").value=emp_id;
        document.getElementById("up_data").action="../htdocs/nondata.php";
        document.getElementById("up_data").submit();
      }
    </script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <title></title>
    <meta charset="UTF-8">
  </head>
  <body class="ui-mobile-viewport">
    <div data-role="page" data-title="電話対応虎の巻" id="page1" data-url="page1" tabindex="0" class="ui-page ui-page-theme-c ui-page-footer-fixed ui-page-active" style="padding-bottom: 58px;">
      <div data-role="header" role="banner" class="ui-header ui-bar-inherit">
        <h3 class="ui-title" role="heading" aria-level="1">電話対応虎の巻</h3>
      </div>
      <div role="main" class="ui-content">
        <h3>電話対応虎の巻</h3>
        <ul data-role="listview" data-filter="true" data-filter-reveal="false" data-filter-placeholder="絞込み" data-inset="true" data-autodividers="true" data-split-icon="arrow-u" class="ui-listview ui-listview-inset ui-corner-all ui-shadow">
          <?php
          //emp_id	社員管理ID
          //emp_name	社員名
          //emp_ruby	社員名ルビ
                for($i=0;$i<count($data);$i++){
                  if(mb_strlen($data[$i]["empinfo_id"])>0){echo "<li><a href='javascript:conf(".$data[$i]["empinfo_id"].")'>";}else if(mb_strlen($data[$i]["empinfo_id"])<=0){echo "<li><a href='javascript:see(".$data[$i]["emp_id"].")'>";}
                  if($data[$i]["retire_flag"]==1){echo "<img src='../img/retire_flag.png'>";}else{echo "<img src='../img/retire_no.png'>";}
                  echo "<p>".$data[$i]["emp_ruby"]."</p><h3>".$data[$i]["emp_name"]."</h3>";
                  echo "<p class='ui-li-aside'>".$data[$i]["cus_com"]."<br>";
                  if(mb_strlen($data[$i]["cus_ruby"])>0){echo"(".$data[$i]["cus_ruby"].")";}
                  if(mb_strlen($data[$i]["cus_name"])>0){echo "<br>".$data[$i]["cus_name"];}
                  echo "</p></a></li>";
                }
          ?>
        </ul>
      </div>
      <div data-role="footer" data-position="fixed" data-tap-toggle="false">
        <div data-role="navbar">
          <ul>
            <li><a href="../htdocs/regist.php" data-icon="plus">情報登録</a></li>
            <li><a href="../htdocs/secin.php" data-icon="search">担当詳細</a></li>
            <li><a href="../htdocs/empmemo.php" data-icon="search">社員メモ</a></li>
          </ul>
        </div>
      </div>
    </div>
    <form name="up_data" id="up_data" method="post">
      <input type="hidden" name="emp_id" id="emp_id">
      <input type="hidden" name="empinfo_id" id="empinfo_id">
      <?php if(mb_strlen($data[$i]["empinfo_id"])>0){echo '<input type="hidden" name="cus_id" id="cus_id">';} ?>
    </form>
  </body>
</html>