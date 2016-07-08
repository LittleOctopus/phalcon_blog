<div class="middle-right">
	<ul>
		<li>
			<?= $this->tag->image(['img/shu.jpg']) ?>
			<span class="redian-title">热点排行</span>
		</li>
		<?php foreach ($pv as $pv) { ?>
		<li><?= $this->tag->linkTo(['article/detail/' . $pv['id'], $pv['title']]) ?></li>
		<?php } ?>
	</ul>
	<div class="search">
		<ul>
			<li>
				<?= $this->tag->image(['img/shu.jpg']) ?>
				<span class="redian-title">搜索</span>
			</li>
			<li>
				<?= $this->tag->form(['index/search']) ?>
					<?= $this->tag->textField(['content']) ?>
			</li>
			<li>
				<?= $this->tag->submitButton(['go', 'class' => 'go']) ?>
				</form>
			</li>
		</ul>
	</div>
</div>