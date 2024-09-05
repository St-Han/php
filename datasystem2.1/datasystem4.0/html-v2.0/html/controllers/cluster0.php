<?php




function getdatalist($mysqli){

    $arr = array();
    $sql = "SELECT id,title,link,authors FROM cluster0 limit 0, 10";
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