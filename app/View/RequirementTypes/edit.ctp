<div class="requirementTypes form">
<?php echo $this->Form->create('RequirementType'); ?>
	<fieldset>
		<legend><?php echo __('Edit Requirement Type'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('RequirementType.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('RequirementType.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Requirement Types'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Requirements'), array('controller' => 'requirements', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Requirement'), array('controller' => 'requirements', 'action' => 'add')); ?> </li>
	</ul>
</div>
