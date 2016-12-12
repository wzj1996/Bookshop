<?php
$name = $_POST['name'];
$price = $_POST['price'];
$file = $_POST['file'];
$quantity = $_POST['quantity'];
$sql = "SELECT * FROM gouwu WHERE name = '$name'";
$res = getlist($sql);
if(!empty($res)){
    $sql1 = "UPDATE gouwu SET price=$price,quantity=$quantity WHERE name='$name'";
    $reslut=update($sql1);

    $sql3 = "SELECT * FROM gouwu";
    $res2 = getlist($sql3);
    if($reslut){
    $info['info'] = "换成功";
     $info['status']=1;
    }

}else{
    $sql3 = "INSERT INTO gouwu (imgurl,name,quantity,price) VALUES ('$file','$name',$quantity,$price)";
    $wzj=add($sql3);
    if($wzj){
        $info['info'] = "成功";
        $info['status']=1;
    }else{
        $info['info'] = "失败";
         $info['status']=0;
    }

}
echo json_encode($info);

function add($sql){
	//连接数据库
	$link = mysqli_connect("localhost","root","","books");
	//设置编码格式
	mysqli_query($link, "set names utf8");
	$res = mysqli_query($link, $sql);

//	$reslut = mysqli_insert_id($link);3
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

function update($sql){
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

?>