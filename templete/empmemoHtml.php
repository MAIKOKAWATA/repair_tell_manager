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
        <h3>社員メモ</h3>
        <ul data-role="listview" data-filter="true" data-filter-reveal="false" data-filter-placeholder="絞込み" data-inset="true" data-autodividers="false" data-split-icon="arrow-u" class="ui-listview ui-listview-inset ui-corner-all ui-shadow">
          <?php
          //emp_id	社員管理ID
          //emp_name	社員名
          //emp_ruby	社員名ルビ
          for($i=0;$i<count($data);$i++)
          {
            if(mb_strlen($data[$i]["emp_memo"])>0)
            {
              echo "<li>";
              echo "<h3>".$data[$i]["emp_memo"]."</h3>";
              echo "<p class='ui-li-aside'>".$data[$i]["emp_name"]."<br>(".$data[$i]["emp_ruby"].")";
              echo "</p></li>";
            }
          }
          ?>
        </ul>
      </div>
      <div data-role="footer" data-position="fixed" data-tap-toggle="false">
        <div data-role="navbar">
          <ul>
            <li><a href="javascript:void(0);" data-icon="none" data-transition="pop">　</a></li>
            <li><a href="javascript:void(0);" data-icon="none" data-transition="pop">　</a></li>
            <li><a href="../htdocs/index.php" data-icon="arrow-l">戻る</a></li>
          </ul>
        </div>
      </div>
    </div>
    <form name="up_data" id="up_data" method="post">
      <input type="hidden" name="emp_id" id="emp_id">
    </form>
  </body>
</html>