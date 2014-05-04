<?php
/**
 * ブログアーカイブ一覧
 */
?>
<script type="text/javascript">
$(function(){
	if($("a[rel='colorbox']").colorbox) $("a[rel='colorbox']").colorbox({transition:"fade"});
});
</script>

<!-- title -->
<h2 class="archive-title">
	<?php $this->BcBaser->contentsTitle() ?>
</h2>

<!-- list -->
<?php if(!empty($posts)): ?>
	<?php foreach($posts as $post): ?>
<div class="post">
	<h4 class="contents-head"><?php $this->Blog->postTitle($post) ?></h4>
	<p class="post-date"><?php $this->Blog->postDate($post) ?></p>
	
	<?php $this->Blog->postContent($post, false, true) ?>
	
	<div class="post-foot">
		<div class="meta">カテゴリー：<?php $this->Blog->category($post) ?></div>
		&nbsp;
		<div class="tag"><?php $this->BcBaser->element('blog_tag', array('post' => $post)) ?></div>
	</div>
</div>
	<?php endforeach; ?>
<?php else: ?>
<p class="no-data">記事がありません。</p>
<?php endif; ?>

<!-- pagination -->
<?php $this->BcBaser->pagination('simple'); ?>
