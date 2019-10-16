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
    // 接收序号、课程编号、课程名称、前继课程、后继课程、课程大纲、授课教师
    $id = $_POST["id"];
    $lesson_bh = $_POST["lesson_bh"];
    $lesson_name = $_POST["lesson_name"];
    $lesson_teachar = $_POST["lesson_teachar"];
    $lesson_cont = $_POST["lesson_cont"];
    $add_time = date("Y-m-d H:i:s");
    // $add_user = $_SESSION["user_name"];
    if($id != "" or $lesson_bh != "" or $lesson_name != "" or $lesson_pre != "" or $lesson_aft != "" or $lesson_cont != ""){
        $query = "insert into lesson_info(id,lesson_bh,lesson_name,lesson_teachar,lesson_cont,add_time,add_user) values('$id','$lesson_bh','$lesson_name','$lesson_teachar','$lesson_cont','$add_time','$_SESSION[user_name]')";
        if(mysql_query($query)){
            js_alert("添加课程成功！","course.php");
        }else{
            js_alert("未知错误，请重试！","course.php");
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
                    <li class="active"><a href="course_add.php">课程添加</a> </li>
                    <li><a href="student_manage.php">学生管理</a></li>
                    <li ><a href="student_add.php">学生添加</a></li>
                    <li><a href="out.php">退出登录</a></li>
                </ul>
            </div>
            <div class="count-min">
                    <div class="count-m"  >
                        <form action="course_add.php?action=1" method="post">
                        <table border="1" style="margin:50px auto;">
                                <tr>    
                                    <td>序号：</td>
                                    <td><input type="text" name="id" style="color:black;"></td>
                                </tr>
                                <tr>    
                                    <td>课程编号：</td>
                                    <td><input type="text" name="lesson_bh" style="color:black;"></td>
                                </tr>
                                <tr>    
                                    <td>课程名称：</td>
                                    <td><input type="text" name="lesson_name" style="color:black;"></td>
                                </tr>
                                <tr>    
                                    <td>授课教师：</td>
                                    <td><input type="text" name="lesson_teachar" style="color:black;"></td>
                                </tr>
                                <tr>    
                                    <td>课程大纲：</td>
                                    <td><input type="text" name="lesson_cont" style="color:black;"></td>
                                </tr>
                                <tr>    
                                    <td>添加人：</td>
                                    <td><?php echo $_SESSION["user_name"];?></td>
                                </tr>
                                <tr>    
                                    <td>添加时间：</td>
                                    <td>系统自动记录</td>
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