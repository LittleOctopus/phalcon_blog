<?= $this->tag->stylesheetLink('css/edit.css') ?>
<div class="middle">
	<div class="middle-text">
	<?= $this->tag->form(['article/alter']) ?>
		<ul>
			<li><?= $this->tag->textField(['title', 'placeholder' => '标题']) ?></li>
			<li><?= $this->tag->textArea(['content', 'placeholder' => '博客内容']) ?></li>
			<?= $this->tag->hiddenField(['id']) ?>
		</ul>		
		<?= $this->tag->submitButton(['提交', 'class' => 'submit']) ?>
	</form>
	</div>
</div>
