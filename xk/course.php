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
                <h1>欢迎来到选课管理后台</h1>
            </div>
        </div>
        <div class="count">
            <div class="count-ul">
                <ul>
                    <li class="active"><a href="course.php">课程管理</a></li>
                    <li><a href="course_add.php">课程添加</a> </li>
                    <li><a href="student_manage.php">学生管理</a></li>
                    <li><a href="student_add.php">学生添加</a></li>
                    <li><a href="out.php">退出登录</a></li>
                </ul>
            </div>
            <div class="count-min">
                <div class="count-m">
                    <form action="coursr.php" method="post">
                    <table border="1" style="margin: 50px auto;">
                        <thead>
                            <tr>
                                <th>序号</th>
                                <th>课程编号</th>
                                <th>课程名称</th>
                                <th>前继课程</th>
                                <th>后继课程</th>
                                <th>授课教师</th>
                                <th>授课大纲</th>
                                <th>添加人</th>
                                <th>添加时间</th>
                            </tr>
                        </thead>
<?php
$query2 = "select * from lesson_info order by id";
$rst = mysql_query($query2);
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
                            <th><?php echo $_SESSION['user_name'];?></th>
                            <th><?php echo $info['add_time'];?></th>
                        </tbody>
<?php
}
?>
                    </table>
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>

</html>