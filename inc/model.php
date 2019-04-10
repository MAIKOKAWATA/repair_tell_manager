<?php

class Indexinfo //index.phpで使用するclass
{
  private $db;     //DB接続

  //コンストラクター(newのときに呼ばれる関数)
  function __construct($db){
    $this->db=$db; //DBを保持
  }
  function outdata(){
    $data=[];
    $sql="SELECT
            t_employinfo.empinfo_id
          , mt_employ.emp_id
          , t_employinfo.now_in_fir
          , t_employinfo.now_in_sec
          , t_employinfo.cus_id
          , mt_employ.emp_name
          , mt_employ.emp_ruby
          , mt_employ.emp_in
          , mt_employ.sec_emp_in
          , mt_employ.emp_memo
          , mt_employ.retire_flag
          , mt_customer.cus_com
          , mt_customer.cus_ruby
          , mt_customer.cus_depart
          , mt_customer.cus_name
          , mt_customer.cus_memo
          , mt_customer.err_flag
          FROM
          t_employinfo
          RIGHT JOIN mt_employ
          ON t_employinfo.emp_id = mt_employ.emp_id
          LEFT JOIN mt_customer
          ON t_employinfo.cus_id = mt_customer.cus_id
          ORDER BY mt_employ.emp_ruby";
          $stmt=$this->db->query($sql);
          $data=getTableData($stmt);
          return $data;
  }
}

class Empinfodata //data.phpで使用するclass
  {
    function selempinfoid($db,$empinfo_id){
      $data=[];
      $sql="SELECT
            t_employinfo.empinfo_id
          , mt_employ.emp_id
          , t_employinfo.now_in_fir
          , t_employinfo.now_in_sec
          , t_employinfo.cus_id
          , mt_employ.emp_name
          , mt_employ.emp_ruby
          , mt_employ.emp_in
          , mt_employ.sec_emp_in
          , mt_employ.emp_memo
          , mt_employ.retire_flag
          , mt_customer.cus_com
          , mt_customer.cus_ruby
          , mt_customer.cus_depart
          , mt_customer.cus_name
          , mt_customer.cus_memo
          , mt_customer.err_flag
          FROM
          t_employinfo
          RIGHT JOIN mt_employ
          ON t_employinfo.emp_id = mt_employ.emp_id
          LEFT JOIN mt_customer
          ON t_employinfo.cus_id = mt_customer.cus_id
      WHERE t_employinfo.empinfo_id=?";
      $stmt=$db->prepare($sql);
      $stmt->execute(array($empinfo_id));
      $data=getTableData($stmt);
      return $data;
    }
  }

class Empdata //nondata.phpで使用するclass
  {
    function selempid($db,$emp_id){
      $data=[];
      $sql="SELECT
            t_employinfo.empinfo_id
          , mt_employ.emp_id
          , t_employinfo.now_in_fir
          , t_employinfo.now_in_sec
          , t_employinfo.cus_id
          , mt_employ.emp_name
          , mt_employ.emp_ruby
          , mt_employ.emp_in
          , mt_employ.sec_emp_in
          , mt_employ.emp_memo
          , mt_employ.retire_flag
          , mt_customer.cus_com
          , mt_customer.cus_ruby
          , mt_customer.cus_depart
          , mt_customer.cus_name
          , mt_customer.cus_memo
          , mt_customer.err_flag
          FROM
          t_employinfo
          RIGHT JOIN mt_employ
          ON t_employinfo.emp_id = mt_employ.emp_id
          LEFT JOIN mt_customer
          ON t_employinfo.cus_id = mt_customer.cus_id
      WHERE mt_employ.emp_id=?";
      $stmt=$db->prepare($sql);
      $stmt->execute(array($emp_id));
      $data=getTableData($stmt);
      return $data; 
    }
  }


class Editdata //editdata_comp.phpで使用するclass
  {
    function mt_employ_up($db,$emp_in,$sec_emp_in,$emp_memo,$retire_flag,$emp_id){
      $sql="UPDATE mt_employ SET emp_in=? , sec_emp_in=? , emp_memo=? , retire_flag=? WHERE emp_id=?";
      $stmt=$db->prepare($sql);
      $stmt->execute(array($emp_in,$sec_emp_in,$emp_memo,$retire_flag,$emp_id));
    }
    function t_employinfo_up($db,$now_in_fir,$now_in_sec,$empinfo_id){
      $sql="UPDATE t_employinfo SET now_in_fir=? , now_in_sec=? WHERE empinfo_id=?";
      $stmt=$db->prepare($sql);
      $stmt->execute(array($now_in_fir,$now_in_sec,$empinfo_id));
    }
    function mt_customer_up($db,$cus_memo,$cus_id){
      $sql="UPDATE mt_customer SET cus_memo=? WHERE cus_id=?";
      $stmt=$db->prepare($sql);
      $stmt->execute(array($cus_memo,$cus_id));
    }
  }

  class Editnondata //editnondata_comp.phpで使用するclass
  {
    function mt_employ_up($db,$emp_in,$sec_emp_in,$emp_memo,$retire_flag,$emp_id){
      $sql="UPDATE mt_employ SET emp_in=? , sec_emp_in=? , emp_memo=? , retire_flag=? WHERE emp_id=?";
      $stmt=$db->prepare($sql);
      $stmt->execute(array($emp_in,$sec_emp_in,$emp_memo,$retire_flag,$emp_id));
    }
  }

  class Secinfo //secin.phpで使用するclass
  {
    private $db;     //DB接続
  
    //コンストラクター(newのときに呼ばれる関数)
    function __construct($db){
      $this->db=$db; //DBを保持
    }
    function selsecindata(){
      $data=[];
      $sql="SELECT
              emp_id
            , emp_name
            , emp_ruby
            , sec_emp_in
            , retire_flag
            FROM
            mt_employ
            WHERE retire_flag=0
            ORDER BY mt_employ.emp_ruby";
            $stmt=$this->db->query($sql);
            $data=getTableData($stmt);
            return $data;
    }
  }

  class Empmemoinfo //empmemo.phpで使用するclass
  {
    private $db;     //DB接続
  
    //コンストラクター(newのときに呼ばれる関数)
    function __construct($db){
      $this->db=$db; //DBを保持
    }
    function selempmemodata(){
      $data=[];
      $sql="SELECT
              emp_id
            , emp_name
            , emp_ruby
            , emp_memo
            , retire_flag
            FROM
            mt_employ
            WHERE retire_flag=0
            ORDER BY mt_employ.emp_ruby";
            $stmt=$this->db->query($sql);
            $data=getTableData($stmt);
            return $data;
    }
  }

  class Empreg //emp_registcomp.phpで使用するclass
  {
    function mt_employ($db,$emp_name,$emp_ruby,$emp_in,$sec_emp_in,$emp_memo,$retire_flag){
      $sql="INSERT INTO `mt_employ`(`emp_name`, `emp_ruby`, `emp_in`, `sec_emp_in`, `emp_memo`,`retire_flag`) VALUES (?,?,?,?,?,?)";
      $stmt=$db->prepare($sql);
      $stmt->bindValue(1,$emp_name,PDO::PARAM_STR);
      $stmt->bindValue(2,$emp_ruby,PDO::PARAM_STR);
      $stmt->bindValue(3,$emp_in,PDO::PARAM_STR);
      $stmt->bindValue(4,$sec_emp_in,PDO::PARAM_STR);
      $stmt->bindValue(5,$emp_memo,PDO::PARAM_STR);
      $stmt->bindValue(6,$retire_flag,PDO::PARAM_INT);
      $stmt->execute();
    }
  }

  class Cusreg //cus_registcomp.phpで使用するclass
  {
    function mt_customer($db,$cus_com,$cus_ruby,$cus_depart,$cus_name,$cus_memo,$err_flag){
      $sql="INSERT INTO `mt_customer`(`cus_com`, `cus_ruby`, `cus_depart`, `cus_name`, `cus_memo`,`err_flag`) VALUES (?,?,?,?,?,?)";
      $stmt=$db->prepare($sql);
      $stmt->bindValue(1,$cus_com,PDO::PARAM_STR);
      $stmt->bindValue(2,$cus_ruby,PDO::PARAM_STR);
      $stmt->bindValue(3,$cus_depart,PDO::PARAM_STR);
      $stmt->bindValue(4,$cus_name,PDO::PARAM_STR);
      $stmt->bindValue(5,$cus_memo,PDO::PARAM_STR);
      $stmt->bindValue(6,$err_flag,PDO::PARAM_INT);
      $stmt->execute();
    }
  }

  class Empinforeg //empinfo_regist.phpで使用するclass
  {
    public $employ;   //mt_employ一覧が入る
    public $customer;//mt_customer一覧が入る
    private $db;

    //コンストラクター(newのときに呼ばれる関数)
    function __construct($db){
      $this->db=$db;
      $this->mt_employ();
      $this->mt_customer();
    }

    private function mt_employ(){
      $sql="SELECT emp_id,emp_name,emp_ruby from mt_employ WHERE retire_flag=0 ORDER BY emp_ruby";
      $stmt=$this->db->query($sql);
      $data=getTableData($stmt);
      $this->employ=$data;
    }

    private function mt_customer(){
      $sql="SELECT cus_id,cus_com,cus_ruby,cus_depart,cus_name from mt_customer ORDER BY cus_ruby ";
      $stmt=$this->db->query($sql);
      $data=getTableData($stmt);
      $this->customer=$data;
    }

  }

  class Empinforegcomp //empinfo_registcomp.phpで使用するclass
  {
    function t_employinfo($db,$emp_id,$now_in_fir,$now_in_sec,$cus_id){
      $sql="INSERT INTO `t_employinfo`(`emp_id`, `now_in_fir`, `now_in_sec`, `cus_id`) VALUES (?,?,?,?)";
      $stmt=$db->prepare($sql);
      $stmt->bindValue(1,$emp_id,PDO::PARAM_INT);
      $stmt->bindValue(2,$now_in_fir,PDO::PARAM_STR);
      $stmt->bindValue(3,$now_in_sec,PDO::PARAM_STR);
      $stmt->bindValue(4,$cus_id,PDO::PARAM_INT);
      $stmt->execute();
    }
  }  

?>