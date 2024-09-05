<?php




function getuserlist($mysqli){

    $arr = array();
    $sql = "SELECT user.id,user.username,user.email,user.password,user.created_at,user.status FROM user";
    $mysqli_stmt = $mysqli->prepare($sql);

    if ($mysqli_stmt->execute()) {
        //bind_result() 绑定结果集中的值到变量
        $id = null;
        $username = null;
        $email = null;
        $password = null;
        $created_at = null;
        $status = null;

        $mysqli_stmt->bind_result($id, $username, $email, $password, $created_at, $status);
        //遍历结果集
        while ($mysqli_stmt->fetch()) {
            array_push($arr, array($id, $username, $email, $password, $created_at, $status));
            
        }
    }
    //释放结果集
    $mysqli_stmt->free_result();
    $mysqli_stmt->close();
    $mysqli->close();
    return $arr;


}