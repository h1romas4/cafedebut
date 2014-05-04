<?php
/**
 * ブログ詳細ページ
 */
?>
<script type="text/javascript">
$(function(){
	if($("a[rel='colorbox']").colorbox) $("a[rel='colorbox']").colorbox({transition:"fade"});
});
</script>

<div class="post">
	<h4 class="contents-head"><?php $this->BcBaser->contentsTitle() ?></h4>
	<p class="post-date"><?php $this->Blog->postDate($post) ?></p>
	<?php $this->Blog->postContent($post) ?>

	<div class="post-foot">
		<div class="meta">カテゴリー：<?php $this->Blog->category($post) ?></div>
		&nbsp;
		<div class="tag"><?php $this->BcBaser->element('blog_tag', array('post' => $post)) ?></div>
	</div>
<!-- /.post --></div>


<!-- contents navi -->
<div id="contentsNavi">
	<?php $this->Blog->prevLink($post) ?>
	&nbsp;｜&nbsp;
	<?php $this->Blog->nextLink($post) ?>
</div>

<!-- comments -->
<?php $this->BcBaser->element('blog_comments') ?>