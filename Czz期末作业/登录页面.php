<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登录界面</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            /* 盒子模型 */
            box-sizing: border-box; 

        }
        li{
            list-style: none;
        }
        a{
            text-decoration: none;
        }
        body{
            /* 弹性布局，让页面元素水平垂直居中对齐
             */
             display: flex;
             justify-content: center;
             align-items: center;
             /* 让页面始终占浏览器可视区总高度 */
             height: 100vh;
        }
        .login{
            /* 让子元素成为弹性项目 */
            display: flex;
            /* 让弹性项目垂直排列 原理是改变弹性盒子的主轴方向 父元素 就是弹性盒子 现在改变后的主轴方向是向下 */
            flex-direction: column;
            /* 让弹性项目在交叉轴方向水平居中 */
            align-items: center;
            width: 400px;
            padding: 40px;
            /* background-color: rgba(0, 0, 0,0.2); */
             box-shadow: 0 15px 25px rgba(0, 0,0,.4); 

        }
        .login_box img{
                width: 20px;
        }
        .login h2{
            margin-bottom: 30px;
        }
        .login, .login_box{
            /* 相对定位 */
            position:relative;
            widows: 100%;
        }
        .login_box,.login input{
            outline: none;
            width: 100%;
            padding: 10px 0;
            margin-bottom: 30px;
            font-size: 16px;
        }
     .login a,.login>input{
         display: block;
         width: 80px;
         height: 30px;
         margin: 10px;
         text-align: center;
         line-height: 30px;
         border:1px solid blue;
     }
     .login>input{
        line-height: 0px;
        color:blue;
        background-color: #fff;
     } 
    </style>
</head>
<body>
    <?php
    if(isset($_POST["tj"])){
        $name=$_POST["name"];
        $pass=$_POST["pass"];
        if($name==""){
            echo "<script language='javascript'>alert('用户名不能为空！');</script>";
    }elseif($pass==""){
        echo "<script language='javascript'>alert('密码不能为空！');</script>";}else{
//             mysqli_query(connection,query,resultmode) ;
//             Connection:必需。规定要使用的 MySQL 连接。
//              Query:必需，规定查询字符串。
// $con=@mysqli_connect(host,username,password,dbname,port,socket);
// host :主机名或IP地址
// username ： MySQL用户名
// password ： MySQL密码 没有就赋空值
// dbname ： 使用的数据库
// port ： 连接到MySQL服务器的端口号
// socket ： socket或要使用的一命名pipe
            $sql="select * from jyz where name='".$name."'and pass ='".$pass."'";
            $con=mysqli_connect("localhost","root","","wyt");
            $query=mysqli_query($con,$sql);
            $num=mysqli_num_rows($query);
            if($num==0){
            echo "<script language='javascript'>alert('输入用户名和密码错误');</script>";
            }else{
                $_SESSION["name"]=$name;
                echo "<script language='javascript'>alert('登录成功！');location.href='index.html';</script>";
                }
        }
    }
    ?>
    <form form name ="login" action="登录页面.php" method="post">
        <div class="login">
            <h2>用户登录</h2>
            <div class="login_box">
                <!-- required不能为空 -->
                <input type="text" name="name" id="user">
                <label for="">用户名</label>
            </div>
            <div class="login_box">
                <input type="password"  name="pass" id="pwd">
                <label for="">密码</label>
                <img src="images/close.png" alt="" id="eye">
            </div>
            <input type="submit" name="tj" value="登录"> 
            <a href="注册页面.php">注册</a>
            <a href="#" id="clear">重置</a>
        </div>
    </form>
    <script>
        var eye = document.getElementById('eye');
        var pwd = document.getElementById('pwd');
        var clear = document.getElementById('clear');
        var user = document.getElementById('user');
        var flag=0;
            eye.onclick=function(){
                if(flag==0){
                eye.src="images/open.png";
                pwd.type="text";
                flag = 1;
                }
                else{
                    eye.src="images/close.png";
                    pwd.type="password";
                    flag=0; 
                }
            }
            clear.onclick=function(){
                pwd.value="";
                user.value="";

            }
    </script>
</body>
</html>