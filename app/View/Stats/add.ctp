<div class="stats form">
<?php echo $this->Form->create('Stat'); ?>
	<fieldset>
		<legend><?php echo __('Add Stat'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('health');
		echo $this->Form->input('gold');
		echo $this->Form->input('weight');
		echo $this->Form->input('karma');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Stats'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
