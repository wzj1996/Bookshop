/**
 * Created by lanou on 16/11/29.
 */
var lg =document.querySelector(".col-xs-3 #cc");
var reg = document.querySelector(".col-xs-3 #ss");
var dl=document.querySelector(".col-xs-3 #cc #dl ");
var zhuce =document.querySelector(".col-xs-3 #cc #zz");
var login =document.querySelector(".col-xs-3 #ss #login");
var zj=document.querySelector(".col-xs-3 #ss #zj")
zhuce.onclick=function () {
    lg.style.display="none";
    reg.style.display="block";
}
login.onclick=function () {
    lg.style.display="block";
    reg.style.display="none";
}
dl.onclick=function () {
    var username=$("#username").val();
    var pwd = $("#pwd").val();
    $.ajax({
        type:"post",
        url:"login.php",
        async:true,
        dataType:"json",
        data:{
            username:username,
            pwd:pwd
        },
        success:function(data){
            console.log(data)
            //接收后台返还的信息
            if(data.status==1){
                alert("登录成功");
            }else{
                alert("登录失败");
            }
        }
    });
}
zj.onclick=function () {
    var name=$("#name").val();
    var password = $("#password").val();
    $.ajax({
        type:"post",
        url:"reg.php",
        async:true,
        dataType:"json",
        data:{
            username:name,
            pwd:password,
        },
        success:function (data) {
            console.log(data);
            if(data.status==1){
                alert("注册成功");
            }else{
                alert("注册失败");
            }
        }
    })
}
