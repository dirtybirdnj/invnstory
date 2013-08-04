<div class="row-fluid">

	<div class="actions span2">
		<h3><?php echo __('Actions'); ?></h3>
		<ul>
	
			<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Event.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Event.id'))); ?></li>
			<li><?php echo $this->Html->link(__('List Events'), array('action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('List Chapters'), array('controller' => 'chapters', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Chapter'), array('controller' => 'chapters', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Paths'), array('controller' => 'paths', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Path'), array('controller' => 'paths', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	
<div class="events form span10">
<?php echo $this->Form->create('Event'); 
	

	
	
?>
	<fieldset>
		<legend><?php echo __('Edit Event'); ?></legend>	
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('chapter_id',array('type' => 'hidden', 'value' => $this->data['Chapter']['id']));
		echo '<p>Chapter: ' . $this->Html->link($this->data['Chapter']['name'],array('controller' => 'chapters', 'action' => 'view',$this->data['Chapter']['id'])) . '</p>';

		echo $this->Form->input('title');
		
		echo $this->Form->input('content');
		
		//debug($this->data);
		//echo $this->Form->input('EventPaths',array('multiple' => 'checkbox','label' => 'Available Paths'));
		
		
		echo $this->Element('event_paths_select');
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>



<div class="paths form">
<?php echo $this->Form->create('Path'); ?>
	<fieldset>
		<legend><?php echo __('Add a Path to this Chapter'); ?></legend>
	<?php
	
		echo $this->Form->input('chapter_id',array('type' => 'hidden', 'value' => $this->data['Chapter']['id']));
		echo $this->Form->input('story_id',array('type' => 'hidden', 'value' => $this->data['Chapter']['story_id']));
		echo $this->Form->input('title');

	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
	</div>

	<?php
	
	//debug($paths);
	
	 //debug($this->data); ?>


</div>