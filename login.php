<?php
require_once 'header_log.php';
//require_once 'vcode.class.php';
$user = "admin";
$pass = "12345678";
$error = $code =  "";

$salt1 = "as@-)12";
$salt2 = "ni#4!";
if (isset($_POST['username'])){
    $user = sanitizeString($_POST['username']);
    $pass = sanitizeString($_POST['password']);
    $token = hash('ripemd128',"$salt1$pass$salt2");//加密
    $code = strtolower($_POST['captcha_code']);
    if ($user == "" || $pass == "" || $code == ""){
        $error = "未填完整";

    }else{
        if ( $code == $_SESSION['code']){
          $result = queryMysql("SELECT user,password FROM member WHERE user = '$user' AND password = '$token'");
             if ($result->num_rows != 0){
               $_SESSION['username'] = $user;
               $_SESSION['password'] = $pass;
               header("Location:index.php");
               exit();
             }else{
                 $error = "<p style='color:red;'>用户名或密码错误</p>";
             }
        }else{
            $error = "验证码错误";
        }
    }
}
echo <<<_END
<div class="overlay"></div>
			<div class="row">
				<div class="app-location">
					<h2>Welcome to GO<span style="color: #6495ED;">BUS</span></h2>
					<div class="line"><span></span></div><br />
					<form id="login" class=" " method="post" action="login.php" data-validator-option="{theme:'bootstrap', timely:2, stopOnError:true}">
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="icon-user"></i></span>
								<input type="text" class="form-control " name="username" value="$user" placeholder="用户名" data-rule="required;username;" data-rule-username="[/[\w\d]{4,30}/, '请输入3-12位数字, 字母或下划线']" data-target="#holdMsg1">
							</div>
							<span class="msg-box" id="holdMsg1"></span>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="icon-lock2"></i></span>
								<input type="password" class="form-control" value="$pass" name="password" placeholder="密码" data-rule="Password: required; length(8~16)" data-tip="请至少输入8位密码" data-target="#holdMsg2">
							</div>
							<span class="msg-box" id="holdMsg2"></span>
						</div>
						<div class="form-group">
							<input class="form-control " style="margin-bottom: 10px" type="text" name="captcha_code" data-target="#holdMsg3" maxlength="6" placeholder="请输入验证码" data-rule="required" />
							<img id="captcha" src="./code.php" width="110" height="40" style="border-radius:10px; border: solid #f1f1f1"/>
							<span class="msg-box" id="holdMsg3"></span>
							<a href="#" style=" margin-top: 10px; float: right;" onclick="document.getElementById('captcha').src = './code.php?' + Math.random(); return false"> <i class = "icon-loop22"></i> </a>
						</div>
		

						<div class="form-group bg-danger ">
							<p>$error</p>
						</div>
						<div class="submit"><input type="submit" onClick="myFunction()" value="提交" name="dosubmit"></div>
						<div class="clear"></div>
						<div class="new">
							<h4><a href="regest.php">没有帐号注册</a></h4>
							<div class="clear"></div>
						</div>
					</form>
				</div>
			</div>


_END;

?>
<footer id="fh5co-footer" role="contentinfo">
    <div class="container">
        <div class="row copyright">
            <div class="col-md-12 text-center">
                <p>
                    <small class="block">鲁ICP备17034510号</small>
                </p>
            </div>
        </div>

    </div>
</footer>
</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up22"></i></a>
</div>

</body>


</html>
