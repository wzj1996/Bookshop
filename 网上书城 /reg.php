<?php
$username=$_POST['username'];
$pwd = $_POST['pwd'];


$sql1  = "SELECT * FROM users WHERE username = '$username'";

$res= getlist($sql1);

if(!empty($res)){
    $info['cc'] =0;
    $info['info'] = "失败";
}else{
    $sql2 = "INSERT INTO users (username,pwd) VALUES ('$username',$pwd)";
    $reslut = add($sql2);
    if($reslut){
        $info['cc'] = 1;
         $info['info'] = "成功";
    }
}
function add($sql){
	//连接数据库
	$link = mysqli_connect("localhost","root","","books");
	//设置编码格式
	mysqli_query($link, "set names utf8");
	$res = mysqli_query($link, $sql);

//	$reslut = mysqli_insert_id($link);
//	echo $reslut;die;
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
echo json_encode($info);
?>