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
// 删除学生信息
$del_id = $_GET["del_id"];
if($del_id != ""){
    $qeury = "delete from stu_info where id='$del_id'";
    if(mysql_query($qeury)){
        js_alert("删除成功！","student_manage.php");
        exit;
    }else{
        js_alert("删除失败，未知错误，请重试！","student_manage.php");
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
                <h1>欢迎来到选课管理后台</h1>
            </div>
        </div>
        <div class="count">
            <div class="count-ul">
                <ul>
                    <li ><a href="course.php">课程管理</a></li>
                    <li><a href="course_add.php">课程添加</a> </li>
                    <li class="active"><a href="student_manage.php">学生管理</a></li>
                    <li><a href="student_add.php">学生添加</a></li>
                    <li><a href="out.php">退出登录</a></li>
                </ul>
            </div>
            <div class="count-min">
                <div class="count-m"  >
                    <table border="1" style="margin: 50px auto;">
                        <thead>
                               <tr>
                                    <th>序号</th>
                                    <th>学生学号</th>
                                    <th>姓名</th>
                                    <th>班级</th>
                                    <th>性别</th>
                                    <th>密码</th>
                                    <th>操作</th>
                               </tr>
                        </thead>
<?php
$query2 = "select * from stu_info order by id desc";
$rst = mysql_query($query2);
while($info = mysql_fetch_array($rst)){

?>
                        <tbody>
                                <tr>
                                    <th><?php echo $info["id"];?></th>
                                    <th><?php echo $info["stu_xh"];?></th>
                                    <th><?php echo $info["stu_name"];?></th>
                                    <th><?php echo $info["class_name"];?></th>
                                    <th><?php echo $info["stu_xb"];?></th>
                                    <th><?php echo $info["stu_pw"];?></th>
                                    <th>
                                        <a href="?del_id=<?php echo $info["id"]?>">删除</a>&nbsp;/
                                        <a href="student_xg.php?id=<?php echo $info["id"]?>">修改</a>
                                    </th>
                                </tr>
                            </tbody>
<?php
}
?>
                        </table>


                </div>
                
            </div>
        </div>

    </div>
</body>

</html>