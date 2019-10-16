<?php
header( 'Content-Type:text/html;charset=utf-8'); 
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
// 接收密码
$stu_pw = $_POST["stu_pw"];
$stu_pw1 = $_POST["stu_pw1"];
$stu_pw2 = $_POST["stu_pw2"];
if($_GET["action"] == 1){
    if($stu_pw1 != $stu_pw2){
        js_alert("两次新密码不正确，请重试！","alter.php");
    }else{
        // 判断旧密码是否正确
        $query = "select * from stu_info where stu_xh='$_SESSION[stu_xh]'";
        $rst = mysql_query($query);
        $info = mysql_fetch_array($rst);
        if($info["stu_pw"] != $stu_pw){
            js_alert("原密码不正确，请重试！","alter.php");exit;
        }else{
            $query2 = "update stu_info set stu_pw='$stu_pw1' where stu_xh='$_SESSION[stu_xh]'";
            if(mysql_query($query2)){
                js_alert("密码修改成功!","login.php");
                exit;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>正选</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div class="wrap">
        <div class="header">
            <div class="header-t">
                <h1>欢迎来到选课系统</h1>
            </div>
        </div>
        <div class="count">
            <div class="count-ul">
                <ul>
                    <li><a href="index.php" >正选</a></li>
                    <li><a href="election.php">正选结果</a></li>
                    <li class="active"><a href="alter.php">修改密码</a></li>
                    <li><a href="out.php">退出登录</a></li>
                </ul>
            </div>
            <div class="count-min">
                <div class="count-m">
                    <div class="" style="margin: 50px 220px;">
                        <form action="alter.php?action=1" method="post">
                            <span> 
                               原密码：<input type="text" name="stu_pw" style="color:black;">
                            </span>
                           <br>
                           <span> 
                               新密码：<input type="text" name="stu_pw1" style="color:black;">
                           </span>
                           <br>
                           <span> 
                               新密码：<input type="text" name="stu_pw2" style="color:black;">
                           </span>
                           <br>
                           <input type="submit" value="提交" style="color:black;">
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="footer-f">
                <span><?php echo $_SESSION["stu_name"];?></span>
                <span><?php echo $_SESSION["stu_xh"]?></span>
                <span><?php echo $_SESSION["class_name"];?></span>
            </div>
        </div>
    </div>
</body>

</html>