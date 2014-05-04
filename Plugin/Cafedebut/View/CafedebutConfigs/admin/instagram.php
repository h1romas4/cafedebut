<?php echo $this->BcForm->create('CafedebutConfig', array('action' => 'instagram')) ?>

<table cellpadding="0" cellspacing="0" class="list-table" id="ListTable">
	<tr>
		<th class="col-head"><?php echo $this->BcForm->label('CafedebutConfig.description', 'Instagram認証') ?></th>
		<td class="col-input">
			<?php if(!$this->BcForm->value('CafedebutConfig.insta_access_token')): ?>
			<div class="error">
				<p>Instagramアプリケーションとしての登録が完了していないのでこの機能はまだ利用できません。</p>
				<p><a href="http://instagram.com/developer/" target="_blank">Manage Clients • Instagram Developer Documentation</a> から Developer 登録を行い、CLIENT ID と CLIENT SECRET を取得し、設定後 Instagramアプリ認証を行ってください。</p>
				<p>&raquo; <?php $this->BcBaser->link('Instagramアプリ認証', array('action'=>'authorize')) ?></p>
				<p>&raquo; Callback URL : <?php echo Router::url('/admin/cafedebut/cafedebut_configs/callback', true) ?></p>
			</div>
			<?php else: ?>
			<p>Instragram認証済</p>
			<p>&raquo; <?php $this->BcBaser->link('Instagramアプリ再認証', array('action'=>'authorize')) ?></p>
			<p>&raquo; <a href="http://instagram.com/developer/" target="_blank">Developer 登録</a></p>
			<?php endif; ?>
		</td>
	</tr>
	<tr>
		<th><?php echo $this->BcForm->label('CafedebutConfig.instagram', 'Instagramユーザ名') ?></th>
		<td>
			<?php echo $this->BcForm->input('CafedebutConfig.instagram', array('type' => 'text', 'size' => '20')) ?>
			<?php echo $this->Html->image('admin/icn_help.png', array('id' => 'helpFacebook', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
			<?php echo $this->BcForm->error('CafedebutConfig.instagram') ?>
			<div id="helptextInstagram" class="helptext"></div>
		</td>
	</tr>
	<tr>
		<th><?php echo $this->BcForm->label('CafedebutConfig.insta_clientid', 'CLIENT ID') ?></th>
		<td>
			<?php echo $this->BcForm->input('CafedebutConfig.insta_clientid', array('type' => 'text', 'size' => '40')) ?>
			<?php echo $this->Html->image('admin/icn_help.png', array('id' => 'helpInstaClientId', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
			<?php echo $this->BcForm->error('CafedebutConfig.insta_clientid') ?>
			<div id="helptextInstaClientId" class="helptext"></div>
		</td>
	</tr>
	<tr>
		<th><?php echo $this->BcForm->label('CafedebutConfig.insta_client_secret', 'CLIENT SECRET') ?></th>
		<td>
			<?php echo $this->BcForm->input('CafedebutConfig.insta_client_secret', array('type' => 'text', 'size' => '40')) ?>
			<?php echo $this->Html->image('admin/icn_help.png', array('id' => 'helpInstaClientSecret', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
			<?php echo $this->BcForm->error('CafedebutConfig.insta_client_secret') ?>
			<div id="helptextClientSecret" class="helptext"></div>
		</td>
	</tr>
</table>

<div class="submit">
	<?php echo $this->BcForm->end(array('label'=>'設　定','div'=>false,'class'=>'btn-orange button')) ?>
</div>