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
//      function conf(empinfo_id){
//        document.getElementById("empinfo_id").value=empinfo_id;
//        document.getElementById("up_data").action="../htdocs/data.php";
//        document.getElementById("up_data").submit();
//      }
//      function see(emp_id){
//        document.getElementById("emp_id").value=emp_id;
//        document.getElementById("up_data").action="../htdocs/nondata.php";
//        document.getElementById("up_data").submit();
//      }
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
        <form action="../htdocs/cus_registcomp.php" method="POST" name="reg" id="reg">
        <h3>お客様先企業の情報の登録</h3>
        <span>所属企業</span><input type="text" name="cus_com">
        <span>企業ルビ</span><input type="text" name="cus_ruby">
        <span>部署</span><input type="text" name="cus_depart">
        <span>お名前</span><input type="text" name="cus_name">
        <span>メモ</span><textarea name="cus_memo"></textarea>
        <fieldset>
          <div data-role="fieldcontain">
            <label for="err_flag">聞き間違いフラグ</label>
            <select id="err_flag" name="err_flag" data-role="flipswitch"> 
              <option value="1">ある</option>
              <option value="0">ない</option>
            </select>
          </div>
        </fieldset>
          <button onclick="document.getElementById('reg').submit();">情報登録</button>
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
  </body>
</html>