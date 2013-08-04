<div class="row-fluid">
	<div class="span2">
		<h3><?php echo __('Actions'); ?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('New Requirement'), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List Paths'), array('controller' => 'paths', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Path'), array('controller' => 'paths', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Requirement Types'), array('controller' => 'requirement_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Requirement Type'), array('controller' => 'requirement_types', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	
	<div class="requirements index span10">
		<h2><?php echo __('Requirements'); ?></h2>
		<table class="table table-striped">
		<tr>
					<th><?php echo $this->Paginator->sort('id'); ?></th>
					<th><?php echo $this->Paginator->sort('path_id'); ?></th>
					<th><?php echo $this->Paginator->sort('requirement_type_id'); ?></th>
					<th><?php echo $this->Paginator->sort('foreign_key'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($requirements as $requirement): ?>
	<tr>
		<td><?php echo h($requirement['Requirement']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($requirement['Path']['title'], array('controller' => 'paths', 'action' => 'view', $requirement['Path']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($requirement['RequirementType']['title'], array('controller' => 'requirement_types', 'action' => 'view', $requirement['RequirementType']['id'])); ?>
		</td>
		<td><?php echo h($requirement['Requirement']['foreign_key']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $requirement['Requirement']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $requirement['Requirement']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $requirement['Requirement']['id']), null, __('Are you sure you want to delete # %s?', $requirement['Requirement']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
		</table>
		<p>
		<?php
		echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
		));
		?>		</p>
		<div class="paging">
		<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
		</div>
	</div>
</div>
