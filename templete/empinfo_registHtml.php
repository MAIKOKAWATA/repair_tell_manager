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
      function empconf(emp_id,emp_name){
        document.getElementById("emp_id").value=emp_id;
        document.getElementById("emp_name_sel").innerHTML=emp_name;
        $.mobile.changePage("#page1");
      }
      function cusconf(cus_id,cus_name){
        document.getElementById("cus_id").value=cus_id;
        document.getElementById("cus_name_sel").innerHTML=cus_name;
        $.mobile.changePage("#page1");
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
        <form action="../htdocs/empinfo_registcomp.php" method="POST" name="reg" id="reg">
        <h3>ペタ社員⇔お客様企業の情報の登録</h3>
        <span>担当社員名</span><a href="#emp_sel" data-transition="pop" data-role="button" id="emp_name_sel" data-icon="search">社員名選択</a>
        <span>現在の第一担当者</span><input type="text" name="now_in_fir">
        <span>現在の第二担当者</span><input type="text" name="now_in_sec">
        <span>お客様先名</span><a href="#cus_sel" data-transition="pop" data-role="button" id="cus_name_sel" data-icon="search">お客様先選択</a>
          <button onclick="document.getElementById('reg').submit();">情報登録</button>
          <input type="hidden" name="emp_id" id="emp_id">
          <input type="hidden" name="cus_id" id="cus_id">
        </form>
      </div>
      <div data-role="footer" data-position="fixed" data-tap-toggle="false">
        <div data-role="navbar">
          <ul>
            <li><a href="javascript:void(0);" data-icon="none" data-transition="pop">　</a></li>
            <li><a href="javascript:void(0);" data-icon="none" data-transition="pop">　</a></li>
            <li><a href="../htdocs/regist.php" data-icon="arrow-l">戻る</a></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- ダイヤログの始まり -->
    <div data-role="page" data-title="社員名選択ダイアログ" id="emp_sel" data-dialog="true" tabindex="0" class="ui-page ui-page-theme-a ui-dialog" style="min-height: 969px;">
      <div data-role="header" role="banner" class="ui-header ui-bar-b"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-left" data-rel="back">Close</a>
        <h2 class="ui-title" role="heading" aria-level="1">社員名選択</h2>
      </div>
      <div class="ui-content" role="main">
        <span>社員名を選択してください</span>
        <ul data-role="listview" data-filter="true" data-filter-reveal="false" data-filter-placeholder="絞込み" data-inset="true" data-autodividers="true" data-split-icon="arrow-u" class="ui-listview ui-listview-inset ui-corner-all ui-shadow">
        <?php
          for($i=0;$i<count($empinforeg->employ);$i++){
            echo "<li><a href='javascript:empconf(".$empinforeg->employ[$i]["emp_id"].",\"".$empinforeg->employ[$i]["emp_name"]."\")'>".
              "<p>".$empinforeg->employ[$i]["emp_ruby"]."</p><h3>".$empinforeg->employ[$i]["emp_name"]."</h3></a></li>";
          }
        ?>
        </ul>
        <a href="#page1" data-role="button" class="ui-link ui-btn ui-shadow ui-corner-all" role="button">閉じる</a>
      </div>
    </div>
    <!-- ダイヤログの終わり -->
    <!-- ダイヤログの始まり -->
    <div data-role="page" data-title="お客様先選択ダイアログ" id="cus_sel" data-dialog="true" tabindex="0" class="ui-page ui-page-theme-a ui-dialog" style="min-height: 969px;">
    <div data-role="header" role="banner" class="ui-header ui-bar-b"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-left" data-rel="back">Close</a>
      <h2 class="ui-title" role="heading" aria-level="1">お客様先選択</h2>
    </div>
    <div class="ui-content" role="main">
      <span>お客様先を選択してください</span>
      <ul data-role="listview" data-filter="true" data-filter-reveal="false" data-filter-placeholder="絞込み" data-inset="true" data-autodividers="true" data-split-icon="arrow-u" class="ui-listview ui-listview-inset ui-corner-all ui-shadow">
      <?php
        for($i=0;$i<count($empinforeg->customer);$i++){
          echo "<li><a href='javascript:cusconf(".$empinforeg->customer[$i]["cus_id"].",\"".$empinforeg->customer[$i]["cus_com"]."&nbsp;(".$empinforeg->customer[$i]["cus_ruby"].")<br>".$empinforeg->customer[$i]["cus_depart"]."<br>".$empinforeg->customer[$i]["cus_name"]."\")'>".
            "<p>".$empinforeg->customer[$i]["cus_ruby"]."</p><h3>".$empinforeg->customer[$i]["cus_com"]."<br>(".$empinforeg->customer[$i]["cus_ruby"].")<br>".$empinforeg->customer[$i]["cus_depart"]."<br>".$empinforeg->customer[$i]["cus_name"]."</h3></a></li>";
        }
      ?>
      </ul>
      <a href="#page1" data-role="button" class="ui-link ui-btn ui-shadow ui-corner-all" role="button">閉じる</a>
    </div>
  </div>
    <!-- ダイヤログの終わり -->
  </body>
</html>