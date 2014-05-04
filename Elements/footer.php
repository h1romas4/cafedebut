<div id="footer">
<div class="base-footer">
<div class="base-footer-contentsA">
<p class="base-footer-siteTitle"><?php echo $this->BcBaser->siteConfig['name'] ?></p>

<div class="base-information">
<?php $this->BcBaser->widgetArea(3) ?>

<!-- /.base-information --></div>

<div class="base-navigation">
<?php $this->BcBaser->element('global_menu') ?>
<!-- /.base-navigation --></div>

<?php $this->BcBaser->widgetArea(4) ?>

<p class="base-copyright">Copyright <?php $this->BcBaser->copyYear(2012) ?> @komorikomasha baser Cafe Debut Theme Demo</p>
</div>
<div class="base-footer-contentsB">
<div class="base-accessMap">
	<h2 class="base-accessMap-h">Access</h2>
	<div class="base-accessMap-map">
	<?php $this->Cafedebut->load_googlemaps(); ?>
	</div>
<!-- /.base-accessMap --></div>
</div>
<!-- /.base-footer --></div>
<!-- /#footer --></div>