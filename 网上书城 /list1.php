<?php


function getlist($sql){
    $link = mysqli_connect('localhost','root','','books');
    mysqli_set_charset($link,'utf8');
    $res = mysqli_query($link,$sql);
    while($list = mysqli_fetch_assoc($res)){
        $arr[] = $list;
    }
    return $arr;
}
$sql  = "SELECT * FROM book";
$res = getlist($sql);
echo json_encode($res);

?>