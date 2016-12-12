
<?php
$name = $_POST['name'];
$intro = $_POST['intro'];
$author = $_POST['author'];
$press = $_POST['press'];
$date = $_POST['date'];
$price = $_POST['price'];
$isb = $_POST['isb'];
$img = $_FILES['img'];
$imgName = $img['name'];
$imgTemp = $img['tmp_name'];
echo "<pre>";
print_r($img);

if(!file_exists("uploads")){
    mkdir("uploads");
}
$tup=move_uploaded_file($imgTemp,"uploads/{$imgName}");
if($tup){

    $tp = "./uploads/{$imgName}";
}

$sql = "INSERT INTO book (name,intro,author,press,date,price,isb,file) VALUES ('$name','$intro','$author','$press','$date','$price','$isb','$tp')";
$res = add($sql);

if($res){
    $info['status'] = 1;
    $info['info'] = '添加成功';
    header("Location:list.html");
}else{
    $info['status'] = 0;
    $info['info'] = '添加失败';
}

echo json_encode($info);

function add($sql){
    $mysqli = new mysqli('localhost','root','','books');
    if($mysqli->errno){
        echo $mysqli->error;
    }else{
        echo '数据库连接成功';
    }
    $mysqli->query('set names utf8');
    $res = $mysqli->query($sql);
    if($res){
        return true;
    }else{
        return false;
    }
}
?>