<div class="requirements view">
<h2><?php  echo __('Requirement'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($requirement['Requirement']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Path'); ?></dt>
		<dd>
			<?php echo $this->Html->link($requirement['Path']['title'], array('controller' => 'paths', 'action' => 'view', $requirement['Path']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Requirement Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($requirement['RequirementType']['title'], array('controller' => 'requirement_types', 'action' => 'view', $requirement['RequirementType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Foreign Key'); ?></dt>
		<dd>
			<?php echo h($requirement['Requirement']['foreign_key']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Requirement'), array('action' => 'edit', $requirement['Requirement']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Requirement'), array('action' => 'delete', $requirement['Requirement']['id']), null, __('Are you sure you want to delete # %s?', $requirement['Requirement']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Requirements'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Requirement'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Paths'), array('controller' => 'paths', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Path'), array('controller' => 'paths', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Requirement Types'), array('controller' => 'requirement_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Requirement Type'), array('controller' => 'requirement_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
