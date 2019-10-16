<?php
header( 'Content-Type:text/html;charset=utf-8'); 
//连接数据服务器
  $id = mysql_connect("localhost","root","root");
//选择数据库
  mysql_select_db("xk",$id);
//本页函数
function js_alert($message,$url){
    echo "<script language=javascript>alert('";
    echo $message;
    echo "');location.href='";
    echo $url;
    echo "';</script>";
}
if($_GET["action"] == 1){
    $id = $_GET['id'];
    $query = "delete from xk_info where id='$id' and $_SESSION[stu_xh]";
    if(mysql_query($query)){
        js_alert("取消选课成功！","election.php");
        exit;
    }else{
        js_alert("未知错误，请重试！","election.php");
        exit;
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
                <h1>欢迎来到选课管理系统</h1>
            </div>
        </div>
        <div class="count">
            <div class="count-ul">
                <ul>
                    <li><a href="index.php">正选</a></li>
                    <li class="active"><a href="election.php">正选结果</a></li>
                    <li><a href="alter.php">修改密码</a></li>
                    <li><a href="out.php">退出登录</a></li>
                </ul>
            </div>
            <div class="count-min">
                <div class="count-m">
                <form action="election.php?action=1">
                    <table border="1" style="margin: 50px auto;">
                        <thead>
                            <tr>
                                <th>序号</th>
                                <th>学号</th>
                                <th>课程编号</th>
                                <th>课程成绩</th>
                                <th>选课备注</th>
                                <th>操作</th>
                            </tr>
                        </thead>
<?php
$query = "select * from xk_info where stu_xh='$_SESSION[stu_xh]'";
$rst = mysql_query($query);
while($info = mysql_fetch_array($rst)){
?>
                        <tbody>
                            <tr>
                                <th><?php echo $info['id']?></th>
                                <th><?php echo $_SESSION['stu_xh']?></th>
                                <th><?php echo $info['lesson_bh']?></th>
                                <th><?php echo $info['lesson_mark']?></th>
                                <th><?php echo $info['lesson_bz']?></th>
                                <th>
                                    <a href="?action=1&id=<?php echo $info['id']?>">取消选课
                                    </a>
                                </th> 
                            </tr>
                        </tbody>
<?php
}
?>
                    </table>  
            </form> 
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="footer-f">
                <span><?php echo $_SESSION["stu_name"];?></span>
                <span><?php echo $_SESSION["stu_xh"];?></span>
                <span><?php echo $_SESSION["class_name"];?></span>
            </div>
        </div>
    </div>
</body>

</html>