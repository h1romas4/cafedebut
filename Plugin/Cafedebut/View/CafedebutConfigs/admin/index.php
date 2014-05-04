<?php echo $this->BcForm->create('CafedebutConfig', array('action' => 'index')) ?>

<table cellpadding="0" cellspacing="0" class="list-table" id="ListTable">
	<tr>
		<th><?php echo $this->BcForm->label('CafedebutConfig.access', 'アクセス（住所）') ?></th>
		<td>
			<?php echo $this->BcForm->input('CafedebutConfig.access', array('type' => 'text', 'size' => '66')) ?>
			<?php echo $this->Html->image('admin/icn_help.png', array('id' => 'helpAccess', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
			<?php echo $this->BcForm->error('CafedebutConfig.access') ?>
			<div id="helptextAccess" class="helptext"></div>
		</td>
	</tr>
	<tr>
		<th><?php echo $this->BcForm->label('CafedebutConfig.guidance', 'アクセス（ご案内）') ?></th>
		<td>
			<?php echo $this->BcForm->input('CafedebutConfig.guidance', array('type' => 'text', 'size' => '66')) ?>
			<?php echo $this->Html->image('admin/icn_help.png', array('id' => 'helpGuidance', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
			<?php echo $this->BcForm->error('CafedebutConfig.guidance') ?>
			<div id="helptextGuidance" class="helptext"></div>
		</td>
	</tr>
	<tr>
		<th><?php echo $this->BcForm->label('CafedebutConfig.tel', 'TEL') ?></th>
		<td>
			<?php echo $this->BcForm->input('CafedebutConfig.tel', array('type' => 'text', 'size' => '20')) ?>
			<?php echo $this->Html->image('admin/icn_help.png', array('id' => 'helpTel', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
			<?php echo $this->BcForm->error('CafedebutConfig.tel') ?>
			<div id="helptextTel" class="helptext"></div>
		</td>
	</tr>
	<tr>
		<th><?php echo $this->BcForm->label('CafedebutConfig.limit_time', '営業時間') ?></th>
		<td>
			<?php echo $this->BcForm->input('CafedebutConfig.limitTime', array('type' => 'text', 'size' => '20')) ?>
			<?php echo $this->Html->image('admin/icn_help.png', array('id' => 'helpLimitTime', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
			<?php echo $this->BcForm->error('CafedebutConfig.limitTime') ?>
			<div id="helptextLimitTime" class="helptext"></div>
		</td>
	</tr>
	<tr>
		<th><?php echo $this->BcForm->label('CafedebutConfig.closed', '定休日') ?></th>
		<td>
			<?php echo $this->BcForm->input('CafedebutConfig.closed', array('type' => 'text', 'size' => '20')) ?>
			<?php echo $this->Html->image('admin/icn_help.png', array('id' => 'helpClosed', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
			<?php echo $this->BcForm->error('CafedebutConfig.closed') ?>
			<div id="helptextClosed" class="helptext"></div>
		</td>
	</tr>
	<tr>
		<th><?php echo $this->BcForm->label('CafedebutConfig.facebook', 'Facebookユーザ名') ?></th>
		<td>
			<?php echo $this->BcForm->input('CafedebutConfig.facebook', array('type' => 'text', 'size' => '20')) ?>
			<?php echo $this->Html->image('admin/icn_help.png', array('id' => 'helpFacebook', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
			<?php echo $this->BcForm->error('CafedebutConfig.facebook') ?>
			<div id="helptextFacebook" class="helptext"></div>
		</td>
	</tr>
	<tr>
		<th><?php echo $this->BcForm->label('CafedebutConfig.twitter', 'Twitterユーザ名') ?></th>
		<td>
			<?php echo $this->BcForm->input('CafedebutConfig.twitter', array('type' => 'text', 'size' => '20')) ?>
			<?php echo $this->Html->image('admin/icn_help.png', array('id' => 'helpTwitter', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
			<?php echo $this->BcForm->error('CafedebutConfig.Twitter') ?>
			<div id="helptextTwitter" class="helptext"></div>
		</td>
	</tr>
</table>

<div class="submit">
	<?php echo $this->BcForm->end(array('label'=>'更　新','div'=>false,'class'=>'btn-orange button')) ?>
</div>
