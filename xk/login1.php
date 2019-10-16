<?php
header( 'Content-Type:text/html;charset=utf-8 '); 
//连接数据服务器
  $id = mysql_connect("localhost","root","root");
//选择数据库
  mysql_select_db("xk",$id);
//   本页函数
function js_alert($message,$url){
    echo "<script language=javascript>alert('";
    echo $message;
    echo "');location.href='";
    echo $url;
    echo "';</script>";
}
 //接收数据信息
  $user_tag = $_POST["user_tag"];
  $user_name = $_POST["user_name"];
  $user_pw = $_POST["user_pw"];
//判断用户登录信息
if($user_tag == 1){
  if ($user_name =="" or $user_pw ==""){
    js_alert("用户名或密码均不能为空！","login.php");
    exit;
  }
  // 查询用户是否存在
  $query = "select * from manage_info where user_name='$user_name'";
  $rst = mysql_query($query);
  if(mysql_num_rows($rst) < 1){
    js_alert("用户名不存在，请重试！","login.php");
    exit;
  }else{
    // 用户存在,验证密码是否正确
    $info = mysql_fetch_array($rst);
    if($user_pw == $info["user_pw"]){
      // 密码正确，注册session
      $_SESSION["user_name"] = $info["user_name"];
      $_SESSION["user_tag"] = $info["user_tag"];
      $_SESSION["id"] = $info["id"];
      // 更新最后登录时间
      $time = date("Y-m-d H:i:s");
      $qeury2 = "update manage_info set time='$time' where user_name='$user_name'";
      if(mysql_query($qeury2)){
        js_alert("恭喜你登录成功！","course.php");
        exit;
      }
    }else{
      // 密码不存在
      js_alert("你输入的密码不正确，请重新输入！","login.php");
      exit;
    }
  }
}
if($user_tag == 0){
  $stu_xh = $user_name;
  $stu_pw = $user_pw;
  if($stu_xh != "" and $stu_pw != ""){
    // 查询用户是否存在
    $query3 = "select * from stu_info where stu_xh='$stu_xh'";
    $rst = mysql_query($query3);
    if(mysql_num_rows($rst)<1){
      js_alert("用户名不存在，请重试！","login.php");
      exit;
    }else{
      $info = mysql_fetch_array($rst);
      // 判断密码是否正确
      if($info["stu_pw"] == $stu_pw){
        // 注册session信息
        $_SESSION["id"] = $info["id"];
        $_SESSION["stu_xh"] = $info["stu_xh"];
        $_SESSION["stu_name"] = $info["stu_name"];
        $_SESSION["class_name"] = $info["class_name"];
        js_alert("恭喜你，登录成功！","index.php");
        exit;
      }else{
        js_alert("用户密码错误，请重试！","login.php");
        exit;
      }
    }
  }
}
?>