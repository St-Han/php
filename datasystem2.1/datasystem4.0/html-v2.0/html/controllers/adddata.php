<?php
include_once "../assets/models/connmyspl.php";
//mysql 事务
header('content-type:text/html;charset=utf-8');


$id = $_GET["id"];
$title =  $_GET["title"];
$link = $_GET["link"];
$authors = $_GET["authors"];
$date = $_GET["date"];
$majorauthor = $_GET["majorauthor"];
$cited = $_GET["cited"];


//执行增加员工的操作
useradd($mysqli, $id, $title, $link, $authors,$date,$majorauthor,$cited);

//useradd() 新增员工
function useradd($mysqli, $id, $title, $link, $authors,$date,$majorauthor,$cited)
{
    $sql = "INSERT INTO dataeconomy(id,title,link,authors,date,majorauthor,cited) VALUES(?,?,?,?,?,?,?)";
    $mysqli_stmt = $mysqli->prepare($sql); //准备预处理语句

    //s 代表 string 类型,i 代表 int
    $mysqli_stmt->bind_param('isssiss', $id, $title, $link, $authors,$date,$majorauthor,$cited);
    //执行预处理语句
    if ($mysqli_stmt->execute()) {
        echo PHP_EOL;
        echo "<script>window.location.href='../dataadmin.html'</script>";
    } else {
        echo $mysqli_stmt->error; //执行失败，错误信息
    }
}



$mysqli->close();
