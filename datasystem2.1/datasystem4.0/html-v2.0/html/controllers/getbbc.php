<?php




function getdatalist($mysqli){

    $arr = array();
    $sql = "SELECT id,title,link,source FROM bbcnews limit 0, 10";
    $mysqli_stmt = $mysqli->prepare($sql);

    if ($mysqli_stmt->execute()) {
        //bind_result() 绑定结果集中的值到变量
        $title = null;
        $id = null;
        $source = null;
        $link = null;
        
        

        $mysqli_stmt->bind_result($id,$title, $link, $source);
        //遍历结果集
        while ($mysqli_stmt->fetch()) {
            array_push($arr, array($id,$title, $link, $source));
            
        }
    }
    //释放结果集
    $mysqli_stmt->free_result();
    $mysqli_stmt->close();
    $mysqli->close();
    return $arr;


}