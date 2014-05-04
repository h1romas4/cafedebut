<?php
$CafeDebutConfig = ClassRegistry::init('Cafedebut.CafedebutConfig');
$config = $CafeDebutConfig->findExpanded();
?>
<table class="base-information-table">
<tr class="base-information-tr">
<th class="base-information-th">アクセス</th>
<td class="base-information-td"><?php echo $config['access'];?><br><?php echo $config['guidance'];?></td>
</tr>
<tr class="base-information-tr">
<th class="base-information-th">TEL</th>
<td class="base-information-td"><?php echo $config['tel'];?></td>
</tr>
<tr class="base-information-tr">
<th class="base-information-th">営業時間</th>
<td class="base-information-td"><?php echo $config['limitTime'];?></td>
</tr>
<tr class="base-information-tr">
<th class="base-information-th">定休日</th>
<td class="base-information-td"><?php echo $config['closed'];?></td>
</tr>
</table>