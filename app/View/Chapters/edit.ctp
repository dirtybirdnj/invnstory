<div class="chapters form">
<?php echo $this->Form->create('Chapter'); ?>
	<fieldset>
		<legend><?php echo __('Edit Chapter'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('story_id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Chapter.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Chapter.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Chapters'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Stories'), array('controller' => 'stories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Story'), array('controller' => 'stories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Paths'), array('controller' => 'paths', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Path'), array('controller' => 'paths', 'action' => 'add')); ?> </li>
	</ul>
</div>
