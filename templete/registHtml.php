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
        <h3>電話対応虎の巻</h3>
        <h4>▼ペタ社員が増えたらこちら</h4>
        <a href="../htdocs/emp_regist.php" data-role="button" data-icon="edit">社員情報登録</a>
        <h4>▼お客様先情報の追加はこちら</h4>
        <a href="../htdocs/cus_regist.php" data-role="button" data-icon="edit">お客様情報登録</a>
        <h4>▼ペタ社員⇔お客様企業の情報が増えたらこちら</h4>
        <a href="../htdocs/empinfo_regist.php" data-role="button" data-icon="edit">担当情報登録</a>
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
  </body>
</html>