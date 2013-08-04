<div class="requirementTypes view">
<h2><?php  echo __('Requirement Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($requirementType['RequirementType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($requirementType['RequirementType']['title']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Requirement Type'), array('action' => 'edit', $requirementType['RequirementType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Requirement Type'), array('action' => 'delete', $requirementType['RequirementType']['id']), null, __('Are you sure you want to delete # %s?', $requirementType['RequirementType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Requirement Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Requirement Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Requirements'), array('controller' => 'requirements', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Requirement'), array('controller' => 'requirements', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Requirements'); ?></h3>
	<?php if (!empty($requirementType['Requirement'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Path Id'); ?></th>
		<th><?php echo __('Requirement Type Id'); ?></th>
		<th><?php echo __('Foreign Key'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($requirementType['Requirement'] as $requirement): ?>
		<tr>
			<td><?php echo $requirement['id']; ?></td>
			<td><?php echo $requirement['path_id']; ?></td>
			<td><?php echo $requirement['requirement_type_id']; ?></td>
			<td><?php echo $requirement['foreign_key']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'requirements', 'action' => 'view', $requirement['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'requirements', 'action' => 'edit', $requirement['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'requirements', 'action' => 'delete', $requirement['id']), null, __('Are you sure you want to delete # %s?', $requirement['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Requirement'), array('controller' => 'requirements', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
