<?php
/*
 * Lists all alive bees and their current hit points
 */
?>
<h3>Bee List</h3>
<table>
<tr>
  <th>Type</th>
  <th>Hit Points</th>
</tr>
<?php
foreach($this->hive->getBees() as $bee) {
?>
<tr>
  <td><?= $bee->getName() ?></td>
  <td align="right"><?= $bee->getHitPoints() ?></td>
</tr>
<?php
}
?>
</table>

