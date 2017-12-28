<?php
require_once 'header_log.php';
?>
<script>
                function checkUser(user){
				    if (user.value == ''){
					O('info').innerHTML = '';
					return;
					}
				}
				
				params = "user=" + user.value; 
				request = new ajaxRequext();
				request.open("POST","checkuser.php",true);
				request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				request.setRequestHeader("Content-length",params.length);
				request.setRequestHeader("Connection","close");
				
				request.onreadystatechange = function(){
					if(this.readyState == 4)
						if(this.status == 200)
							if(this.responseText != null)
                               O('info').innerHTML = this.responseText;
				}
				request.send(params);
			
			
			function ajaxRequest(){
    
				try {var request = new XMLHttpRquest(); }
				catch(e1) {
					try {request = new  ActiveXObject("Msxml2.XMLHTTP");}
					catch(e2){
						try{request = new  ActiveXObject("Microsoft.XMLHTTP");}
						catch(e3){
							request = false;
						}
					}
				}
				return request;
			}


</script>

<?php
$error = $user = $pass = $email = $code= "";

$salt1 = "as@-)12";
$salt2 = "ni#4!";

if (isset($_SESSION['username']))
	destorySession();
if (isset($_POST['username'])) {

	$user = sanitizeString($_POST['username']);
	$pass = sanitizeString($_POST['password']);
    $token = hash('ripemd128',"$salt1$pass$salt2");//加密
	$email = sanitizeString($_POST['email']);
    $code = strtolower($_POST['captcha_code']);
	$_SESSION['username'] = $user;
	$_SESSION['password'] = $pass;

	if ($user == "" || $pass == "" || $email == "") {
		$error = "有空缺项";
	} else {
	    if ($code == $_SESSION['code']) {
            $result = queryMysql("SELECT * FROM member WHERE user='$user'");

            if ($result->num_rows)
                $error = "用户已存在<br>";
            else {
                queryMysql("INSERT INTO member VALUE ('$user','$token','$email')");
                header("Location:index.php");
                exit();
            }
        }else{
	        $error = "验证码错误";
        }
	}
}
?>
        <div class="overlay"></div>
			<div class="row">
				<div class="app-location">
					<h2>Welcome to GO<span style="color: #6495ED;">BUS</span></h2>
					<div class="line"><span></span></div><br />
					<form id="form1" action="regest.php" class="" method="post" data-validator-option="{theme:'bootstrap', timely:2, stopOnError:true}">
						<div class="form-group">
							<div class="input-group">
								<i class="input-group-addon icon-user"></i>
						     	<input id="name" type="text" name="username"  class="form-control" data-target="#holdMsg1" placeholder="用户名" data-rule="required;username;" data-rule-username="[/[\w\d]{4,30}/, '请输入3-12位数字, 字母或下划线']" data-tip="你可以使用字母、数字和符号">
							</div>
							<span class="msg-box" id="holdMsg1"></span>
						</div>
						<div class="form-group">
							<div class="input-group">
								<i class="input-group-addon icon-lock2"></i>
								<input id="password" type="password" class="form-control" name="password" data-target="#holdMsg2"  placeholder="密码" data-rule="密码: required; length(8~16)" data-tip="请至少输入8位密码">
							</div>
							<span class="msg-box" id="holdMsg2"></span>
						</div>
						<div class="form-group">
							<div class="input-group">
								<i class="input-group-addon icon-lock2"></i>
								<input id="checkpassword" type="password" class="form-control" data-target="#holdMsg3" placeholder="请再次输入密码" data-rule="确认密码: required; match(password)">
							</div>
							<span class="msg-box" id="holdMsg3"></span>
						</div>
						<div class="form-group">
							<div class="input-group">
								<i class="input-group-addon icon-envelope2"></i>
								<input id="email" name="email" class="form-control" data-target="#holdMsg4" data-rule="required;email;" placeholder="邮箱" data-rule="required;email">
							</div>
							<span class="msg-box" id="holdMsg4"></span>
						</div>
						<div class="form-group">
							<input class="form-control " style="margin-bottom: 10px" type="text" name="captcha_code" data-target="#holdMsg3" maxlength="6" placeholder="请输入验证码" data-rule="required" />
							<img id="captcha" src="./code.php" width="110" height="40" style="border-radius:10px; border: solid #f1f1f1"/>
							<span class="msg-box" id="holdMsg3"></span>
							<a href="#" style=" margin-top: 10px; float: right;" onclick="document.getElementById('captcha').src = './code.php?' + Math.random(); return false"> <i class = "icon-loop22"></i> </a>
						</div>
						<div class="form-group bg-danger">
						<?php echo	$error; ?>
						</div>
						<div class="submit"><input type="submit" onClick="myFunction()" value="注册" name="dosubmit"></div>
						<div class="clear"></div>
						<div class="new">
							<h4><a href="login.php">已有帐号登录</a></h4>
							<div class="clear"></div>
						</div>
					</form>
				</div>
			</div>
		</div>
</div>
</div>
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

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up22"></i></a>
</div>
</body>

</html>

