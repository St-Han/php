<?php
include_once "../assets/models/connmyspl.php";
//mysql 事务
header('content-type:text/html;charset=utf-8');


$id = $_GET["id"];
$date = $_GET["date"];


//执行增加员工的操作
usedelete($mysqli, $id, $date);

//useradd() 新增员工
function usedelete($mysqli, $id, $date)
{
    $sql = "DELETE FROM dataeconomy WHERE id = ? AND date = ? ";
    $mysqli_stmt = $mysqli->prepare($sql); //准备预处理语句

    //s 代表 string 类型,i 代表 int
    $mysqli_stmt->bind_param('ii', $id, $date);
    //执行预处理语句
    if ($mysqli_stmt->execute()) {
        echo PHP_EOL;
        echo "<script>window.location.href='../dataadmin.html'</script>";
    } else {
        echo $mysqli_stmt->error; //执行失败，错误信息
    }
}



$mysqli->close();
