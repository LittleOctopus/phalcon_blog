<div class="middle-right">
	<ul>
		<li>
			{{ image('img/shu.jpg') }}
			<span class="redian-title">热点排行</span>
		</li>
		{% for pv in pv %}
		<li>{{ link_to('article/detail/' ~ pv["id"], pv['title']) }}</li>
		{% endfor %}
	</ul>
	<div class="search">
		<ul>
			<li>
				{{ image('img/shu.jpg') }}
				<span class="redian-title">搜索</span>
			</li>
			<li>
				{{ form('index/search') }}
					{{ text_field('content') }}
			</li>
			<li>
				{{ submit_button('go', 'class': 'go') }}
				</form>
			</li>
		</ul>
	</div>
</div>