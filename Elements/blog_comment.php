<?php
/**
 * ブログコメント単記事
 */
?>

<?php if(!empty($dbData)): ?>
	<?php if($dbData['status']): ?>
<div class="comment" id="Comment<?php echo $dbData['no'] ?>">
	<span class="comment-name">
		<?php if($dbData['url']): ?>
		<?php echo $this->BcBaser->link($dbData['name'], $dbData['url'], array('target' => '_blank')) ?>
		<?php else: ?>
		<?php echo $dbData['name'] ?>
		<?php endif ?>
	</span>
	<span class="comment-message"><?php echo nl2br($this->BcText->autoLinkUrls($dbData['message'])) ?></span>
</div>
	<?php endif ?>
<?php endif ?>