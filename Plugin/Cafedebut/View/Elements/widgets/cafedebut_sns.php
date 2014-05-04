<?php
$CafeDebutConfig = ClassRegistry::init('Cafedebut.CafedebutConfig');
$config = $CafeDebutConfig->findExpanded();
?>
<ul class="base-sns-list">
<?php if($config['instagram'] != '') : ?>
<li class="base-sns-item"><a href="http://instagram.com/<?php echo $config['instagram'];?>" target="_blank">I</a></li>
<?php endif; ?>
<?php if($config['facebook'] != '') : ?>
<li class="base-sns-item"><a href="http://www.facebook.com/<?php echo $config['facebook'];?>" target="_blank">f</a></li>
<?php endif; ?>
<?php if($config['twitter'] != '') : ?>
<li class="base-sns-item"><a href="http://twitter.com/<?php echo $config['twitter'];?>" target="_blank">t</a></li>
<?php endif; ?>
<li class="base-sns-item"><?php $this->BcBaser->link('r', '/news/index.rss') ?></li>
</ul>
