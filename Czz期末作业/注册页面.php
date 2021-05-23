<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>注册页面</title>
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
        echo "<script language='javascript'>alert('密码不能为空！');</script>";
    }
    else{
          date_default_timezone_set("PRC");
          $sql="insert into jyz(name,pass,date)values('".$name."','".$pass."',now())"	;
          $con=@mysqli_connect("localhost","root","","wyt");
          mysqli_query($con,$sql);
         echo "<script language='javascript'>alert('注册成功！');location.href='登录页面.php';</script>";
    }
    }
    ?>
    <form action="注册页面.php" method="post" id="form">
        <div class="login">
            <h2>注册用户</h2>
            
            <div class="login_box">
                <!-- required不能为空 -->
                <input type="text" required="required" name="name" id="user">
                <label for="">用户名</label>
            </div>
            <div class="login_box">
                <input type="text" required="required" name="pass" id="pwd">
                <label for="">密码</label>
            </div>
             <input type="submit" name="tj" value="注册"> 
            <!-- <a href="#" name="tj" onclick="document.form.sumbit()"> </a> -->
            <a href="登录页面.php">返回</a>
            <a href="#" id="clear">重置</a>
        </div>
    </form>
    <script>
        var user = document.getElementById('user');
        var pwd = document.getElementById('pwd');
        var clear = document.getElementById('clear');
        clear.onclick=function(){
            user.value="";
            pwd.value="";
        }
    </script>
</body>
</html>