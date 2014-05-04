<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<?php $this->BcBaser->charset() ?>
<?php $this->BcBaser->title() ?>
<?php $this->Cafedebut->metaDescription() ?>
<?php $this->BcBaser->metaKeywords() ?>
<?php $this->BcBaser->icon() ?>
<?php $this->BcBaser->rss('News RSS 2.0', '/news/index.rss') ?>
<meta name="viewport" content="width=device-width">
<?php $this->BcBaser->css(array('import')) ?>
<?php
if (!($this->Cafedebut->is_mobile())) {
	$this->BcBaser->js(array(
		'jquery',
		'waypoints',
		'jquery.colorbox',
		'main'));
}
?>
<?php $this->BcBaser->scripts() ?>
</head>

<body id="<?php $this->BcBaser->contentsName() ?>">
<div id="document">

	<?php $this->BcBaser->header() ?>
	
		<div id="article">
			<div class="base-article">
				<h1 class="mod-pageTitle"><?php $this->Cafedebut->contentsTitle() ?></h1>
				
				<?php if(!$this->BcBaser->isHome()): ?>
					<p class="mod-topicPath"><?php $this->BcBaser->element('crumbs'); ?></p>
					<div class="base-main">
						<div class="base-layoutA">
							<div class="base-layoutA-main">
									<?php $this->BcBaser->flash() ?>
									<?php $this->BcBaser->content() ?>
							</div>
							
							<div class="base-layoutA-sub">
								<?php $this->BcBaser->widgetArea() ?>
							</div>
						
						<!-- /.base-layoutA --></div>
					<!-- /.base-main --></div>
				<?php else: ?>
					<div class="base-main">
						<div class="base-layoutB">
							<?php $this->BcBaser->content() ?>
						</div>
						
						<div class="mod-photoList">
							<?php $this->BcBaser->widgetArea(5) ?>
						<!-- /.mod-photoList --></div>
						
					<!-- /.base-main --></div>
				<?php endif ?>
			<!-- /.base-article --></div>
		<!-- /#article --></div>
	
	<?php $this->BcBaser->footer() ?>

<!-- /#document --></div>
<?php $this->BcBaser->element('google_analytics') ?>
<?php $this->BcBaser->func() ?>
</body>
</html>