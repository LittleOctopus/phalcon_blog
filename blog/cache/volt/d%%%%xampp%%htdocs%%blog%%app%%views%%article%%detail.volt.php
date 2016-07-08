		<?= $this->tag->stylesheetLink('css/index.css') ?>
		<div class="middle">
			<div class="middle-left">
				<ul>
					<li class="li-detail">
						<div class="li-top">
							<ul>
								<li>
									<?= $this->tag->image(['img/edit.jpg']) ?>
								</li>
								<li>
									<ul>
										<li class="title"><?= $article->title ?></li>
										<li class="time-auther">
											<span>时间：<?= date('Y-m-d', $article->time) ?></span>
											<span>作者：<?= $article->username ?></span>
										</li>
									</ul>
								</li>
							</ul>

						</div>
						<div class="content">
							<p><?= strip_tags($article->content) ?></p>
						</div>
					</li>					
				</ul>
			</div>
			<?= $this->partial('public/pv_search') ?>
		</div>
