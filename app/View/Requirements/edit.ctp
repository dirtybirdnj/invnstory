<div class="requirements form">
<?php echo $this->Form->create('Requirement'); ?>
	<fieldset>
		<legend><?php echo __('Edit Requirement'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('path_id');
		echo $this->Form->input('requirement_type_id');
		echo $this->Form->input('foreign_key');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Requirement.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Requirement.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Requirements'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Paths'), array('controller' => 'paths', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Path'), array('controller' => 'paths', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Requirement Types'), array('controller' => 'requirement_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Requirement Type'), array('controller' => 'requirement_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
