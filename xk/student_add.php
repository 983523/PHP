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
if($_GET['action'] == 1){
    // 接收序号、学号、学生姓名、班级、性别、密码
    $id = $_POST["id"];
    $stu_xh = $_POST["stu_xh"];
    $stu_name = $_POST["stu_name"];
    $class_name = $_POST["class_name"];
    $stu_xb = $_POST["stu_xb"];
    $stu_pw = $_POST["stu_pw"];
    if($id != "" or $stu_xh != "" or $stu_name != "" or $class_name != "" or $stu_xb != "" or $stu_pw != ""){
        $query = "insert into stu_info values('$id','$stu_xh','$stu_name','$class_name','$stu_xb','$stu_pw')";
        if(mysql_query($query)){
            js_alert("添加成功！","student_add.php");
            exit;
        }else{
            js_alert("未知错误，请重试！","student_add.php");
            exit;
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
                    <li><a href="student_manage.php">学生管理</a></li>
                    <li class="active"><a href="student_add.php">学生添加</a></li>
                    <li><a href="out.php">退出登录</a></li>
                </ul>
            </div>
            <div class="count-min">
                    <div class="count-m"  >
                        <form action="?action=1" method="post">
                            <table border="1" style="margin: 0 auto;">
                                <tr>    
                                    <td>序号：</td>
                                    <td><input type="text" name="id" style="color:black;"></td><br>
                                </tr>
                                <tr>    
                                    <td>学生学号：</td>
                                    <td><input type="text" name="stu_xh" style="color:black;"></td><br>
                                </tr>
                                <tr>    
                                    <td>学生姓名：</td>
                                    <td><input type="text" name="stu_name" style="color:black;"></td><br>
                                </tr>
                                <tr>    
                                    <td>学生班级：</td>
                                    <td><input type="text" name="class_name" style="color:black;"></td><br>
                                </tr>
                                <tr>    
                                    <td>学生性别：</td>
                                    <td><input type="text" name="stu_xb" style="color:black;"></td><br>
                                </tr>
                                <tr>    
                                    <td>学生密码：</td>
                                    <td><input type="text" name="stu_pw" style="color:black;"></td><br>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="submit" value="提交">
                                    </td>
                                </tr>
                            </table>
                        </form>  
                    </div>
            </div>
        </div>
    </div>
</body>
</html>