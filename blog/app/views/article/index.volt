{{ stylesheet_link('css/edit.css') }}
<div class="middle">
	<div class="middle-text">
	{{ form('article/index') }}
		<ul>
			<li>{{ text_field('title', 'placeholder': "标题") }}</li>
			<li>{{ text_area('content', 'placeholder': "博客内容") }}</li>
		</ul>		
		{{ submit_button('发布', 'class': 'submit') }}
	</form>
	</div>
</div>
