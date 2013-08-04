
<?php echo $this->Form->create('Event',array('controller' => 'events', 'action' => 'edit'),array('id' => 'ajaxEditEventForm')); ?>
	<fieldset>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('chapter_id',array('type' => 'hidden', 'value' => $this->data['Chapter']['id']));
		//echo '<p>Chapter: ' . $this->Html->link($this->data['Chapter']['name'],array('controller' => 'chapters', 'action' => 'view',$this->data['Chapter']['id'])) . '</p>';

		echo $this->Form->input('title');
		echo $this->Form->input('content');
		echo $this->Element('event_paths_select');
		
	?>
	</fieldset>
<?php echo $this->Form->end(); ?>





