<?php
header('content-type:text/html;charset=utf-8');
$host = "localhost";
$user = "root";
$password = "";
$db = "datasystem";


$mysqli = new mysqli($host, $user, $password, $db); //实例化mysqli对象，连接mysql数据库
if ($mysqli->connect_errno) {
    die($mysqli->connect_error);
}
$mysqli->set_charset('utf8'); //设置字符集




// 验证表单 登录信息
//判断用户名和密码是否为空
$email = isset($_POST['email']) ? $_POST['email'] : "";
$password = $_POST['password'];


// if (!empty($email) && !empty($password)) { //建立连接
//     $sql = "SELECT email,password FROM admin WHERE email = '$email' ";
//     $result = $mysqli->query($sql);
//     $row = mysqli_fetch_array($result); //判断用户名或密码是否正确
//     if ($email == $row['email'] && $password == $row['password']) {
//         // 创建cookie
//         // 过期时间被设置为一个月（60 秒 * 60 分 * 24 小时 * 30 天）
        
//         //关闭数据库,可进行页面跳转 这里为了方便 仅显示为登录成功
//         // header("Location:personcenter.html");
//         echo "<script>alert('管理员登录成功！');location.href='../useradmin.html';</script>";
//     }


// if (!empty($email) && !empty($password))
if (!empty($email) && !empty($password)) { //建立连接
    $sql = "SELECT email,password FROM user WHERE email = '$email' ";
    $result = $mysqli->query($sql);
    $row = mysqli_fetch_array($result); //判断用户名或密码是否正确
    if ($email == $row['email'] && password_verify($password,$row['password'])) {
        // 创建cookie
        // 过期时间被设置为一个月（60 秒 * 60 分 * 24 小时 * 30 天）
        $expire = time() + 60 * 60 * 24 * 30;
        setcookie("email1", $email, $expire);
        setcookie("password1", $password, $expire);
        //关闭数据库,可进行页面跳转 这里为了方便 仅显示为登录成功
        // header("Location:personcenter.html");
        echo "<script>alert('登录成功！');location.href='../index.html';</script>";
       
    } else {
        //用户名或密码错误，赋值err为1
        echo "<script>alert('用户名或密码错误，请重新输入！');location.href='../login&register.html';</script>";
    }
} else {
    //用户名或密码为空，赋值err为2
    echo "<script>alert('用户名或密码不能为空，请重新输入！');location.href='../login&register.html'</script>";

}







// //执行读取用户
// getUser($mysqli);
// //读取用户并显示
// function getUser($mysqli)
// {
//     $sql = "SELECT email,password FROM user WHERE email = ? and password = ? ";
//     $mysqli_stmt = $mysqli->prepare($sql);

//     //定于要存值的变量
//     $email = $_POST['email'];
//     $password = $_POST['password'];

//     $mysqli_stmt->bind_param('ss', $email, $password);

//     if ($mysqli_stmt->execute()) {
//         echo "<script>alert('恭喜您，登录成功！');window.location.href='../index.html'</script>";
//     }else{
//         echo "<script>alert('邮箱或密码错误，请仔细核对后再尝试')";
//     }
//     //释放结果集
//     $mysqli_stmt->free_result();
//     $mysqli_stmt->close();
// }


$mysqli->close();
