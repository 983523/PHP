<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/login.css">
    <title>登录页面</title>
</head>

<body>
    
<div class="login">
    <form action="login1.php" class="center" method="post">
        <select name="user_tag" class="se">
            <option value="0">学生登录</option>
            <option value="1">管理员登录</option>
        </select>
        <p>账号：<input type="text" name="user_name" style="color:black;"></p>
        <p>密码：<input type="password" name="user_pw" style="color:black;"></p>
       <p><input type="submit"  name="go" value="登录"></p>
    </form>
</div>

</body>

</html>