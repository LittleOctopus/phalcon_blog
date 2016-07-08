	<?= $this->tag->stylesheetLink('css/login.css') ?>
	<div class="middle">
		<div class="middle-text">
			<?= $this->flash->output() ?>
			<h1>登录</h1>
			<?= $this->tag->form(['login/start', 'onbeforesubmit' => 'return false']) ?>
				<?= $form->render('email', ['placeholder' => '邮箱']) ?>
				<br>
				<?= $form->render('password', ['placeholder' => '密码']) ?>
				<?= $this->tag->submitButton(['go', 'class' => 'submit']) ?>
			</form>
		</div>
	</div>
	
