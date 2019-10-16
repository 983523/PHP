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
    $lseson_bh = $_GET["lesson_bh"];
    $stu_xh = $_GET["stu_xh"];
    $query = "insert into xk_info(stu_xh,lesson_bh) values('$stu_xh','$lseson_bh')";
    if(mysql_query($query)){
        js_alert("添加成功！","election.php");
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
    <title>选课管理</title>
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
                    <li class="active"><a href="index.php" >正选</a></li>
                    <li><a href="election.php">正选结果</a></li>
                    <li><a href="alter.php">修改密码</a></li>
                    <li><a href="out.php">退出</a></li>
                </ul>
            </div>
            <div class="count-min">
                <div class="count-m">
                    <table border="1" style="margin: 50px auto;">
                            <thead>
                                <tr>
                                    <th>序号</th>
                                    <th>课程序号</th>
                                    <th>课程名</th>
                                    <th>前继课程</th>
                                    <th>后继课程</th>
                                    <th>授课教师</th>
                                    <th  width="20%";>教学大纲</th>
                                    <th>添加人</th>
                                    <th>添加时间</th> 
                                    <th>操作</th>
                                </tr>
                            </thead>    
<?php
$query2 = "select * from lesson_info order by id";
$rst = mysql_query($query2);
$add_time = date("Y-m-d H:i:s");
while($info = mysql_fetch_array($rst)){
?>
                            <tbody>
                                <th><?php echo $info["id"];?></th>
                                <th><?php echo $info["lesson_bh"];?></th>
                                <th><?php echo $info["lesson_name"];?></th>
                                <th><?php echo $info["lesson_pre"];?></th>
                                <th><?php echo $info["lesson_aft"];?></th>
                                <th><?php echo $info['lesson_teachar'];?></th>
                                <th><?php echo $info['lesson_cont'];?></th>
                                <th><?php echo $_SESSION["user_name"];?></th>
                                <th><?php echo $add_time;?></th>
                                <th>
                                    <a href="?action=1&lesson_bh=<?php echo $info['lesson_bh'];?>
                                    &stu_xh=<?php echo $_SESSION['stu_xh'];?>
                                    ">确认选课</a>
                                </th>
                            </tbody>
<?php 
}
?>
                    </table> 
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
