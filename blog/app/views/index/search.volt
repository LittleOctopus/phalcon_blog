	{{ stylesheet_link('css/index.css') }}
	
		<div class="middle">
			<div class="middle-left">
				<ul>
					{% for article in page.items %}
					<li class="li-block">
						<div class="li-top">
							<ul>
									<li>
										{{ image('img/edit.jpg') }}
									</li>
									<li>
										<ul>
											<li class="title">{{ link_to('article/detail/' ~ article["id"], article['title']) }}</li>
											<li class="time-auther">
												<span>时间：{{ article['time'] }}</span>
												<span>作者：{{ article['username'] }}</span>
											</li>
										</ul>
									</li>
							</ul>

						</div>
						<div class="content">
							<p>{{ article['content'] }}</p>
						</div>
						<div class="btn">{{ link_to('article/detail/' ~ article["id"], '继续阅读') }}</div>
					</li>
					{% endfor %}
				</ul>
			</div>
			
			{{ partial("public/pv_search") }}
		</div>
