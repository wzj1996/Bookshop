<?php
$name = $_POST['name'];

$sql = "DELETE FROM gouwu WHERE name='$name'";
$res = delete($sql);
if($res){
    $info['info'] = '删除成功';
    $info['status'] = 1;
    $sql1 =  "SELECT * FROM gouwu";
    $reslut=getlist($sql1);
}else{
    $info['info'] = '删除失败';
    $info['status'] = 0;
}

echo json_encode($info);

function delete($sql){
	//连接数据库
	$link = mysqli_connect("localhost","root","","books");
	mysqli_query($link, "set names utf8");
	$res = mysqli_query($link, $sql);
	if($res){
		return true;
	}else{
		return false;
	}
}

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