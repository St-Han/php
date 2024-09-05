<?php




function getdatalist($mysqli){

    $arr = array();

//     $connect = mysqli_connect('localhost', 'root', '', 'datasystem') or die('数据库连接失败');
//     mysqli_set_charset($connect, 'utf8');
// // 查询总条数
//     $sql = "select * from dataeconomy";
//     $query = mysqli_query($connect, $sql);
// // 返回结果集中行的数量
//     $num = mysqli_num_rows($query);
//     $pageSize = 10;
//     $totalPage = ceil($num / $pageSize);// 获取当前页

//     if ($_GET['page']) {
//         $page = $_GET['page'];
//     } else {
//         $page = 1; // 接收不到按照 1 处理，即默认第 1 页
//     }
//     if ($page == 1) {
//         $up = 1;
//     } else {
//         $up = $page - 1;
//     }
//     // 在当前页的基础上确定下一页
//     if ($page == $totalPage) {
//         $next = $totalPage;
//     } else {
//         $next = $page + 1;	
//     }
//     // 求出 limit 的第一个参数
//     $start = ($page - 1) * $pageSize;
$pageSize = 10;
$page =1;
$start = ($page - 1) * $pageSize;




    $sql = "SELECT dataeconomy.id,dataeconomy.title,dataeconomy.link,dataeconomy.authors FROM dataeconomy limit $start,$pageSize";
    $mysqli_stmt = $mysqli->prepare($sql);

    if ($mysqli_stmt->execute()) {
        //bind_result() 绑定结果集中的值到变量
        $title = null;
        $id = null;
        $authors = null;
        $link = null;
        
        

        $mysqli_stmt->bind_result($id,$title, $link, $authors);
        //遍历结果集
        while ($mysqli_stmt->fetch()) {
            array_push($arr, array($id,$title, $link, $authors));
            
        }
    }

   


    //释放结果集
    $mysqli_stmt->free_result();
    $mysqli_stmt->close();
    $mysqli->close();
    return $arr;


}