<?php
session_start();
$res=session_destroy();
if($res){
     $info['status'] = 1;
     $info['info'] = "成功";
}else{
    $info['status'] = 0;
    $info['info'] = "失败";
}
echo json_encode($info);

?>