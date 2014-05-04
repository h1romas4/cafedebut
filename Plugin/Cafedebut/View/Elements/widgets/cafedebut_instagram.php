<?php
$CafeDebutConfig = ClassRegistry::init('Cafedebut.CafedebutConfig');
$config = $CafeDebutConfig->findExpanded();
$insta = $CafeDebutConfig->getInstagramImages();
// Instagram 未設定の場合は出力しない
if($insta == null) return;
?>
<?php $count = 0; ?>
<?php foreach($insta->data as $photo) : ?>
<?php $like_count = isset($photo->likes->count) ? intval($photo->likes->count) : 0 ?>
<?php $comment = isset($photo->caption->text) ? strip_tags($photo->caption->text) : ''; ?>
<?php $image_low = isset($photo->images->low_resolution->url) ? htmlspecialchars($photo->images->low_resolution->url, ENT_QUOTES) : ''; ?>
<?php $image_high = isset($photo->images->standard_resolution->url) ? htmlspecialchars($photo->images->standard_resolution->url, ENT_QUOTES) : ''; ?>
<?php $likes = isset($photo->likes->data) ? $photo->likes->data : array(); ?>
<?php $number = sprintf('%0d', $count); ?>
<?php $photo_id = isset($photo->id) ? $photo->id : 0; ?>
<?php
if(strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone')) {
	$modal_link = "instagram://media?id=$photo_id";
} else {
	$modal_link = "#photoItem-$number";
} ?>
<?php $link = isset($photo->link) ? htmlspecialchars($photo->link, ENT_QUOTES) : '' ?>
							<div class="mod-photoList-item">
							<div class="mod-photoList-figure">
							<a href="<?php echo $modal_link; ?>" class="js-colorboxInline"><img src="<?php echo $image_low ?>" /></a>
							<div class="mod-photoList-figcaption">
							<p class="mod-photoList-figcaption-p"><?php echo $comment; ?></p>
							</div>
							</div>
							<ul class="mod-photoList-countA">
							<li class="mod-photoList-countA-item heart"><?php echo $like_count; ?></li>
							</ul>
							<!-- /.=============================modalContents============================= -->
							<div class="mod-photoList-modalContents" id="photoItem-<?php echo $number; ?>">
							<div class="mod-photoList-modalContents-figure">
							<img src="<?php echo $image_high ?>" />
							</div>
							<div class="mod-photoList-modalContents-comment">
							<ul class="mod-photoList-countB">
							<li class="mod-photoList-countB-item heart"><?php echo $like_count; ?></li>
							</ul>
							<div class="mod-photoList-comment"><p><?php echo $comment; ?></p>
							<p><a href="<?php echo $link; ?>" target="_blanck"><?php echo $link; ?></a></p></div>
							<div class="mod-photoList-commentList">
							<ul class="mod-photoList-commentList-list">
<?php foreach($likes as $like) : ?>
<?php $like_picture = isset($like->profile_picture) ? htmlspecialchars($like->profile_picture, ENT_QUOTES) : ''; ?>
<?php $like_name = isset($like->full_name) ? strip_tags($like->full_name) : ''; ?>
							<li class="mod-photoList-commentList-item">
							<p class="mod-photoList-commentList-userIcon"><img src="<?php echo $like_picture; ?>" alt="" width="30" height="30"></p>
							<p class="mod-photoList-commentList-comment"><?php echo $like_name; ?></p>
							</li>
<? endforeach; ?>
							</ul>
							</div>
							</div>
							</div>
							<!-- /.=============================/modalContents============================= -->
							<!-- /.mod-photoList-item --></div>
<?php $count++; ?>
<? endforeach; ?>