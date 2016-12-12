<?php
$username=$_POST['username'];
$pwd = $_POST['pwd'];

$sql = "SELECT * FROM users WHERE username = '$username' AND pwd = $pwd";


$res= getlist($sql);
if(empty($res)){
   $info['status'] = 0;
   	$info['info'] = "登录失败";
}else{
//    $info['username'] =$username;
    $info['status'] = 1;
    $info['info'] = "成功";
    session_start();
    $_SESSION['username'] = $username;
}
function getlist($sql){
	//连接数据库
	$link = mysqli_connect("localhost","root","","books");
	//设置编码格式
	mysqli_query($link, "set names utf8");
	//执行sql
	$res = mysqli_query($link, $sql);
	//取所有数据
//	$list = mysqli_fetch_all($res);//常用
//	$arr = array();
//	while($list = mysqli_fetch_row($res)){
//		$arr[] = $list;
//	}
//常用
    $arr=array();
	while($list = mysqli_fetch_assoc($res)){
		$arr[] = $list;
	}

	return $arr;
}
echo json_encode($info);
 //header("Location:index.php");

?>