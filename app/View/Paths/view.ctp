<div class="row-fluid">
<div class="actions span2">
		<div class="well sidebar-nav">
			<ul class="nav nav-list">
				<li class="nav-header">Actions</li>
		<li><?php echo $this->Html->link(__('Edit Path'), array('action' => 'edit', $path['Path']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Path'), array('action' => 'delete', $path['Path']['id']), null, __('Are you sure you want to delete # %s?', $path['Path']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Paths'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Path'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Chapters'), array('controller' => 'chapters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chapter'), array('controller' => 'chapters', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stories'), array('controller' => 'stories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Story'), array('controller' => 'stories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Requirements'), array('controller' => 'requirements', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Requirement'), array('controller' => 'requirements', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
		</div>
</div>
<div class="paths view span10">
<h2><?php  echo __('Path'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($path['Path']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Chapter'); ?></dt>
		<dd>
			<?php echo $this->Html->link($path['Chapter']['name'], array('controller' => 'chapters', 'action' => 'view', $path['Chapter']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Story'); ?></dt>
		<dd>
			<?php echo $this->Html->link($path['Story']['name'], array('controller' => 'stories', 'action' => 'view', $path['Story']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($path['Path']['title']); ?>
			&nbsp;
		</dd>
	</dl>

<div class="related">
	<h3><?php echo __('Related Requirements'); ?></h3>
	<?php if (!empty($path['Requirement'])): ?>
	<table class="table table-striped">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Path Id'); ?></th>
		<th><?php echo __('Requirement Type Id'); ?></th>
		<th><?php echo __('Foreign Key'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($path['Requirement'] as $requirement): ?>
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

	<div class="requirements form">
	<?php echo $this->Form->create('Requirement'); ?>
		<fieldset>
			<legend><?php echo __('Add Requirement'); ?></legend>
		<?php
			echo $this->Form->input('path_id',array('type' => 'hidden', 'value' => $path['Path']['id']	));
			echo $this->Form->select('requirement_type_id',$requirement_types);
			echo $this->Form->input('foreign_key');
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
	</div>


</div>

</div>
</div>