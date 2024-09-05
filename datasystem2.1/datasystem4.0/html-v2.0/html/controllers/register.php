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
register($mysqli);
$mysqli->close();


//用户注册，插入新数据
function register($mysqli)
{

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordhash = password_hash($password, PASSWORD_DEFAULT);

    $sql1 = "SELECT * FROM user WHERE email = '$email'";
    $result = $mysqli->query($sql1);
    $row = mysqli_fetch_array($result);
    if(!empty($row))
    {
        echo "<script>alert('对不起，该邮箱已被注册！');window.location.href='../login&register.html'</script>";
    }else{
        $sql = "insert into user(username,email,password) values(?,?,?)";
        $mysqli_stmt = $mysqli->prepare($sql); //准备预处理语句
    
        //s代表string类型
        $mysqli_stmt->bind_param('sss', $username, $email, $passwordhash);
    
        //执行预处理语句
        if ($mysqli_stmt->execute()) {
            echo $mysqli_stmt->insert_id; //程序成功，返回插入数据表的行id
            echo PHP_EOL;
            echo "<script>alert('恭喜您，注册成功！');window.location.href='../login&register.html'</script>";
        } else {
            echo "<script>alert('系统错误！');window.location.href='../error.html'</script>"; //执行失败，错误信息
        }
        //释放结果集
        $mysqli_stmt->free_result();
        $mysqli_stmt->close();
    }




   
}
