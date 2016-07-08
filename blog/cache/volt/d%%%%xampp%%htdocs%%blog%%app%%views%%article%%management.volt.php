<?= $this->tag->stylesheetLink('css/guanli.css') ?>
<?= $this->flash->output() ?>
<div class="middle">
	<div class="middle-left">
		<ul>
		<?php foreach ($page->items as $article) { ?>
			<li class="li-block">
				<ul>
					<li>
						<div class="li-top">
							<ul>
								<li>
									<?= $this->tag->image(['img/edit.jpg']) ?>
								</li>
								<li>
									<ul>
										<li class="title"><?= $this->tag->linkTo(['article/detail/' . $article['id'], $article['title']]) ?></li>
										<li class="time-auther">
											<span>时间：<?= $article['time'] ?></span>
											<span>作者：<?= $article['username'] ?></span>
										</li>
									</ul>
								</li>
							</ul>

						</div>
						<div class="content">
							<p><?= $article['content'] ?></p>
						</div>
						<div class="btn"><?= $this->tag->linkTo(['article/detail/' . $article['id'], '继续阅读']) ?></div>
					</li>
					<li>
						<span><?= $this->tag->linkTo(['article/del/' . $article['id'], '删除']) ?></span>
						<span><?= $this->tag->linkTo(['article/alter/' . $article['id'], '修改']) ?></span>
					</li>
				</ul>
			</li>
		<?php } ?>
		</ul>
	</div>
</div>
