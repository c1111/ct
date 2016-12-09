<?php
// $uid=$_POST["u"];
// $pwd=$_POST["P"];
// include("../DBDA.class.php");
// $db=new DBDA();
// $sql="select password from login where username='{$uid}'";
// $mm=$db->StrQuery($sql);
// if($mm==$pwd && $pwd!=""){
//   echo"OK";
// }else{
//   echo"NO";
// }
  session_start();
  if(isset($_SESSION['username'])){
    header('location:./admin.php');
  }
  if(!empty($_POST)){
    if(isset($_POST['username'])&& $_POST['username']!=''&&isset($_POST['password'])&& $_POST['password']!=''){
      $username=addslashes($_POST['username']);
      $salt="good day";
      $password=ok(ok($_POST['password']).$salt);
      try{
        $config=require_once'./config.php';
        $pdo=new PDO($config['dsn'],$config['user'],$config['password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $res=$pdo->query("select*from user where username='{$username}'");
        $data=$res->fetch(PDO::FETCH_ASSOC);
        if($password==$data['password']){
          $_SESSION['username']=$username;
          header('location:./admin.php');
        }else{
          echo"<script>alert('登录失败')</script>";

        }
      }catch (PDOException $e){
          echo "数据库连接失败";
      }
    }else{
      echo "<script>alert('表单未填完整')</script>";
    }
  }
?>
