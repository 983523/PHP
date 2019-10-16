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
// 接收id
$stu_pw = $_POST["stu_pw"];
$id = $_GET["id"];
if($_POST["tj"] == "提交"){
    if($stu_pw == ""){
        js_alert("密码不能为空！","student_manage.php");
        exit;
    }else{
        $query2 = "update stu_info set stu_pw='$stu_pw' where id='$id'";
        if(mysql_query($query2)){
            js_alert("初始化密码成功！","student_manage.php");
            exit;
        }else{
            js_alert("未知错误，请重试！","student_manage.php");
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
                    <li class="active"><a href="student_manager.php">学生管理</a></li>
                    <li><a href="student_add.php">学生添加</a></li>
                    <li><a href="out.php">退出登录</a></li>
                </ul>
            </div>
            <div class="count-min">
                    <div class="count-m"  >
                        <form action="student_xg.php?id=<?php echo $id;?>" method="post">
                            <table border="1" style="margin: 50px auto;">
                                <tbody>
                                    <tr>
                                        <td>初始密码：</td>
                                        <td><input type="text" name="stu_pw" style="color:black;"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="submit" value="提交" name="tj" style="color:black;">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>  
                    </div>
            </div>
        </div>

    </div>
</body>

</html>