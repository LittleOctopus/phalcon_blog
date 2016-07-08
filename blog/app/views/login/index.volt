	{{ stylesheet_link('css/login.css') }}
	<div class="middle">
		<div class="middle-text">
			{{ flash.output() }}
			<h1>登录</h1>
			{{ form('login/start', 'onbeforesubmit': 'return false') }}
				{{ form.render('email', ['placeholder': '邮箱']) }}
				<br>
				{{ form.render('password', ['placeholder': "密码"]) }}
				{{ submit_button('go', 'class': 'submit') }}
			</form>
		</div>
	</div>
	
