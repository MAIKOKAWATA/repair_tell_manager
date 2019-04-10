<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta http-equiv="content-language" content="ja">
    <meta charset="UTF-8">
    <title></title>
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
    
  </head>
  <body>
  <div data-role="page" data-title="電話対応虎の巻" id="page1" data-url="page1" tabindex="0" class="ui-page ui-page-theme-c ui-page-footer-fixed ui-page-active" style="padding-bottom: 58px;">
      <div data-role="header" role="banner" class="ui-header ui-bar-inherit">
        <h3 class="ui-title" role="heading" aria-level="1">電話対応虎の巻</h3>
      </div>
      <div role="main" class="ui-content" id="content">
        <div id="desc">
        <?php
          //ペタ社員に関する情報
          //        emp_name	社員名
          //        emp_ruby	社員名ルビ
          //        emp_memo	メモ
          //        retire_flag	退職フラグ
          //        now_in_fir	現第一担当
          //        now_in_sec	現第二担当
          //お客様に関する情報
          //        cus_com	所属企業
          //        cus_ruby	企業ルビ
          //        cus_depart	部署
          //        cus_name	お名前
          //        cus_memo	メモ
        ?>        
          <h3>社員情報</h3>
          <h4><?php echo $data[0]["emp_name"]."(".$data[0]["emp_ruby"].")"; ?></h4>
          <p>
            <?php if(mb_strlen($data[0]["emp_in"])>0){echo "<span>所属(担当内容):</span>".$data[0]["emp_in"]."<br>";} ?>
            <?php if(mb_strlen($data[0]["sec_emp_in"])>0){echo "<span>担当内容(2):</span>".$data[0]["sec_emp_in"]."<br>";} ?>
            <?php if(mb_strlen($data[0]["emp_memo"])>0){echo "<span>メモ:</span>".$data[0]["emp_memo"]."<br>";} ?>
            <span>退職フラグ:</span><?php if($data[0]["retire_flag"]==0){echo "在職中";}else{echo "離職済";} ?>
            <br>
            <?php if($data[0]["retire_flag"]=="1"){echo "<span>現在の第一担当者:</span>".$data[0]["now_in_fir"]."<br>"."<span>現在の第二担当者:</span>".$data[0]["now_in_sec"];} ?>
          </p>
          <?php
          if(mb_strlen($data[0]["cus_com"])>0 && mb_strlen($data[0]["cus_ruby"])>0){echo "<h3>お客様先情報</h3>";}
          ?>
          <h4>
            <?php if($data[0]["cus_com"]!=NULL && $data[0]["cus_ruby"]!=NULL){echo $data[0]["cus_com"]."(".$data[0]["cus_ruby"].")";} ?><br>
            <?php if(mb_strlen($data[0]["cus_depart"])>0 || $data[0]["cus_depart"]!=NULL){echo $data[0]["cus_depart"]."&nbsp;";} ?>
            <?php if(mb_strlen($data[0]["cus_name"])>0 || $data[0]["cus_name"]!=NULL){echo $data[0]["cus_name"];} ?><br>
          </h4>
          <p>
            <?php if(mb_strlen($data[0]["cus_memo"])>0 ||$data[0]["cus_memo"]!=NULL){echo $data[0]["cus_memo"];} ?>
            <br>
            <?php if($data[0]["err_flag"]==0){echo "";}else{echo "以前聞き間違えました･･･";} ?>
          </p>
        </div>
      </div>
      <div data-role="footer" data-position="fixed" data-tap-toggle="false">
        <div data-role="navbar">
          <ul>
            <li><a href="#add" data-icon="edit">情報更新</a></li>
            <li><a href="#logout" data-icon="delete" data-transition="pop">　</a></li>
            <li><a href="../htdocs/index.php" data-icon="back">戻る</a></li>
          </ul>
        </div>
      </div>
      <!-- サイドパネル部分書き換え中 -->
        <!-- ページがサイドパネルを持つ場合の始まり  -->
        <div data-role="panel" data-position="left" data-dismissible="true" id="add" data-display="reveal" data-position-fixed="true" data-animate="true" data-theme="a">
        <h3>情報更新</h3>
        <form name="edit" action="../htdocs/editnondata_comp.php" method="POST" id="edit">
          <br>
          <h4>社員の情報更新</h4>
          <span>所属(担当内容)</span><input type="text" value="<?php echo $data[0]["emp_in"]; ?>" name="emp_in">
          <span>担当内容(2)</span><input type="text" value="<?php if(mb_strlen($data[0]["sec_emp_in"])>0){echo $data[0]["sec_emp_in"];} ?>" name="sec_emp_in">
          <span>メモ</span><textarea name="emp_memo"><?php if(mb_strlen($data[0]["emp_memo"])>0){echo $data[0]["emp_memo"];} ?></textarea>
          <fieldset>
            <div data-role="fieldcontain">
              <label for="retire_flag">退職フラグ</label>
              <select id="retire_flag" name="retire_flag" data-role="flipswitch">
                <option value="1" <?php if($data[0]["retire_flag"]=="1") {echo ' selected="selected"';}?>>退職</option>
                <option value="0" <?php if($data[0]["retire_flag"]=="0") {echo ' selected="selected"';}?>>在職</option>
              </select>
            </div>
          </fieldset>
          <br>
          <!--<h4>退職した際の情報更新</h4>
          <span>現在の第一担当</span><input type="text" value="<?php //if(mb_strlen($data[0]["now_in_fir"])>0){echo $data[0]["now_in_fir"];}else{"";} ?>" name="now_in_fir">
          <span>現在の第二担当</span><input type="text" value="<?php //if(mb_strlen($data[0]["now_in_sec"])>0){echo $data[0]["now_in_sec"];}else{"";} ?>" name="now_in_sec">-->
          <input type="hidden" name="emp_id" value="<?php echo $_POST["emp_id"]; ?>">
            <button onclick="document.getElementById('edit').submit();">情報の更新</button>
        </form>
      </div>
      <!-- ページがサイドパネルを持つ場合の終わり  -->

  </div>
  </body>
</html>