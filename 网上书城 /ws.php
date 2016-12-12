<?php
$sql = "SELECT * FROM gouwu";


$res =getlist($sql);
echo json_encode($res);







function getlist($sql){
    $link = mysqli_connect('localhost','root','','books');
    mysqli_query($link, "set names utf8");
    $res = mysqli_query($link, $sql);
    $arr = array();
    while($list = mysqli_fetch_assoc($res)){
        $arr[] = $list;
    }
    return $arr;
}




?>