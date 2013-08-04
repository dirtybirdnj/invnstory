<div class="paths form">
<?php echo $this->Form->create('Path'); ?>
	<fieldset>
		<legend><?php echo __('Edit Path'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('chapter_id');
		echo $this->Form->input('story_id');
		echo $this->Form->input('title');
		//echo $this->Form->input('Event');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); 
	
	
	
	//debug($this->data);
	
	
?>

<div class="requirements form">
<?php echo $this->Form->create('Requirement',array('controller' => 'requirements', 'action' => 'add')); ?>
	<fieldset>
		<legend><?php echo __('Add Requirement'); ?></legend>
	<?php
		echo $this->Form->input('path_id',array('type' => 'hidden', 'value' => $this->data['Path']['id']));
		echo $this->Form->select('requirement_type_id',$requirement_types);
		echo $this->Form->input('foreign_key');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); 
	
	
	
	
?>
</div>

</div>

