<div id="header">
<div class="base-header">
<div class="base-header-sns">
<?php $this->BcBaser->widgetArea(4) ?>
<!-- /.base-sns --></div>

<p class="base-logo"><?php $this->BcBaser->img('/img/base/logo.png') ?></p>
<h1 class="base-siteTitle"><?php $this->BcBaser->link($this->BcBaser->siteConfig['name'],'/') ?></h1>
<p class="base-description"><?php $this->Cafedebut->description(); ?></p>
<!-- /.base-header --></div>


<div class="base-globalnavi"><div class="base-globalnavi-inner">
<?php $this->BcBaser->element('global_menu') ?>
<!-- /.base-globalnavi --></div></div>

<!-- /#header --></div>