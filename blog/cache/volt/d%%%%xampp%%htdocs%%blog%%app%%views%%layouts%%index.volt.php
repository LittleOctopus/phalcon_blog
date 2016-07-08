<?= $this->tag->stylesheetLink('css/index.css') ?>
<div class="middle">
	<div class="middle-left">
		<ul>
			<?php foreach ($page->items as $article) { ?>
			<li class="li-block">
				<div class="li-top">
					<ul>
							<li>
								<?= $this->tag->image(['img/edit.jpg']) ?>
							</li>
							<li>
								<ul>
									<li class="title"><?= $this->tag->linkTo(['article/detail/' . $article['id'], $article['title']]) ?></li>
									<li class="time-auther">
										<span>时间：<?= date('Y-m-d', $article['time']) ?></span>
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
			<?php } ?>
		</ul>
		<div class="page">
			<?= $this->tag->linkTo(['index/index?page=' . $page->before, '上一页']) ?>
			<?= $this->tag->linkTo(['index/index?page=' . $page->next, '下一页']) ?>
			<?= $this->tag->linkTo(['index/index?page=' . $page->last, '尾页']) ?>
			<span class="help-inline"><?= $page->current ?> of <?= $page->total_pages ?></span>
		</div>
	</div>
	<?= $this->getContent() ?>
</div>


