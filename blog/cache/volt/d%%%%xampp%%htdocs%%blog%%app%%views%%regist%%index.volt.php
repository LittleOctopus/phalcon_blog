<?= $this->tag->stylesheetLink('css/login.css') ?>
<div class="middle">
	<div class="middle-text">
		<h1>注册</h1>
		<?= $this->tag->form(['register', 'id' => 'registerForm', 'onbeforesubmit' => 'return false']) ?>
			<?= $form->render('name', ['placeholder' => '昵称']) ?>
	        <div class="alert alert-warning" id="name_alert">
	            <strong>警告!</strong> 昵称不能为空！
	        </div>
			<?= $form->render('email', ['placeholder' => '邮箱']) ?>
			<div class="alert alert-warning" id="email_alert">
	            <strong>警告!</strong> email不能为空！
	        </div>
			
			<br>
			<?= $form->render('password', ['placeholder' => '密码']) ?>
			<div class="alert alert-warning" id="password_alert">
                <strong>Warning!</strong> 请输入有效密码
            </div>
			<?= $form->render('repeatPassword', ['placeholder' => '确认密码']) ?>
			<div class="alert alert-warning" id="repeatPassword_alert">
                <strong>Warning!</strong> 密码不匹配
            </div>
			
			<?= $this->tag->submitButton(['注册', 'class' => 'submit', 'onclick' => 'return SignUp.validate();']) ?>
			
		</form>
	</div>
</div>