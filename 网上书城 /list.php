<?php
$p = $_POST['p'];

$sql  = "SELECT * FROM book";
$res = getlist($sql);


$perPage = 6;  //每页要显示的数据条数；

$totalCount = count($res); //数据的总条数;

$page = ceil($totalCount/$perPage); //需要显示的分页数量

if(empty($_POST['p'])){
    $startPage = 0;
}else{
    $startPage = ($_POST['p']-1)*$perPage;//减一是从第0个开始
}

$sql = "SELECT * FROM book LIMIT $startPage,$perPage";

$lists = getlist($sql);
echo json_encode($lists);

function getlist($sql){
    $link = mysqli_connect('localhost','root','','books');
    mysqli_set_charset($link,'utf8');
    $res = mysqli_query($link,$sql);
    while($list = mysqli_fetch_assoc($res)){
        $arr[] = $list;
    }
    return $arr;
}

?>