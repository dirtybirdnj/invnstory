<?php

$this->Html->script('http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js',array('inline' => false));
$this->Html->script('bootstrap-modal',array('inline' => false));
$this->Html->script('chapter_view',array('inline' => false));

?>
<div class="row-fluid">
<div class="actions span2">
		<div class="well sidebar-nav">
			<ul class="nav nav-list">
				<li class="nav-header">Story</li>
				<li class="active"><?php echo $this->Html->link($chapter['Story']['name'], array('controller' => 'stories', 'action' => 'view', $chapter['Story']['id'])); ?></li>
				<li class="nav-header">Chapter</li>
				<li><?php echo h($chapter['Chapter']['name']); ?></li>
			</ul>

			<ul class="nav nav-list">
				<li class="nav-header">Actions</li>
		<li><?php echo $this->Html->link(__('Edit Chapter'), array('action' => 'edit', $chapter['Chapter']['id'])); ?> </li>
		<!--<li><?php echo $this->Form->postLink(__('Delete Chapter'), array('action' => 'delete', $chapter['Chapter']['id']), null, __('Are you sure you want to delete # %s?', $chapter['Chapter']['id'])); ?> </li>-->
		<li><?php echo $this->Html->link(__('List Chapters'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chapter'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stories'), array('controller' => 'stories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Story'), array('controller' => 'stories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Paths'), array('controller' => 'paths', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Path'), array('controller' => 'paths', 'action' => 'add')); ?> </li>
	</ul>
		</div>
</div>
<div class="chapters view span10">

<div class="related">
	<h3 class="inlineHeader"><?php echo __('Events'); ?></h3>
	<input id="btnAddEvent" type="button" value="Add Event" class="btn btn-primary cviewAddEventPath"/>
	<?php if (!empty($chapter['Event'])): ?>
	<table class="table table-striped">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Primary'); ?></th>		
		<th id="cviewEventTitle"><?php echo __('Title'); ?></th>		
		<th><?php echo __('Content'); ?></th>
		<th id="cviewEventBtns"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($chapter['Event'] as $event): ?>
		<tr>
			<td><?php echo $event['id']; ?></td>
			<td><?php 
			if($event['primary']){ echo $this->Html->image('icons/bullet_star.png',array('class' => 'primaryEvtSelect primaryEvent','event_id' => $event['id'],'chapter_id' => $chapter['Chapter']['id'])); }
			else { echo $this->Html->image('icons/bullet_star.png',array('class' => 'primaryEvtSelect notPrimary','event_id' => $event['id'],'chapter_id' => $chapter['Chapter']['id'])); }    
			?></td>				
			<td><?php echo $event['title']; ?></td>						
			<td><small><?php echo $event['content']; ?></small></td>
			<td>
				<?php //echo $this->Html->link(__('View'), array('controller' => 'events', 'action' => 'view', $event['id']),array('class' => 'btn btn-mini btn-primary')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'events', 'action' => 'edit', $event['id']),array('event_id' => $event['id'], 'class' => 'btn btn-mini btn-primary editEvent')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'events', 'action' => 'delete', $event['id']), array('class' => 'btn btn-mini btn-danger'), __('Are you sure you want to delete # %s?', $event['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	
</div>
	<div class="related">
	<h3 class="inlineHeader"><?php echo __('Paths'); ?></h3>
	<input id="btnAddPath" type="button" value="Add Path" class="btn btn-primary cviewAddEventPath"/>
	<?php if (!empty($chapter['Path'])): ?>
	<table class="table table-striped">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th width="100" class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($chapter['Path'] as $path): ?>
		<tr>
			<td><?php echo $path['id']; ?></td>
			<td><?php echo $path['title']; ?></td>
			<td class="actions">
				<?php //echo $this->Html->link(__('View'), array('controller' => 'paths', 'action' => 'view', $path['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'paths', 'action' => 'edit', $path['id']),array('path_id' => $path['id'],'class' => 'editPath btn btn-mini btn-primary')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'paths', 'action' => 'delete', $path['id']),array('class' => 'btn btn-mini btn-danger'), __('Are you sure you want to delete # %s?', $path['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
	<?php endif; ?>


	<div style="display: none;">
	
		<div id="createEventForm">
		<?php echo $this->Form->create('Event',array('controller' => 'events','action' => 'add')); ?>
			<fieldset>
			<?php
				echo $this->Form->input('chapter_id',array('type' => 'hidden', 'value' => $chapter['Chapter']['id']));
				echo $this->Form->input('title',array('class' => 'span12'));
				echo $this->Form->input('content',array('class' => 'span12'));
				//echo $this->Form->input('Path');
			?>
			</fieldset>
		<?php 
		echo $this->Form->submit('Submit',array('class' => 'hiddenBtn'));
		echo $this->Form->end(); ?>
		</div>
		
		<hr/>
		<div id="createPathForm">
		<?php echo $this->Form->create('Path',array('controller' => 'paths','action' => 'add','div' => 'createPathForm')); ?>
			<fieldset>
			<?php
				echo $this->Form->input('chapter_id',array('type' => 'hidden', 'value' => $chapter['Chapter']['id']));
				echo $this->Form->input('story_id',array('type' => 'hidden', 'value' => $chapter['Chapter']['story_id']));
				echo $this->Form->input('title',array('class' => 'span12'));
				//echo $this->Form->input('Event');
			?>
			</fieldset>
		<?php 
		echo $this->Form->submit('Submit',array('class' => 'hiddenBtn'));
		echo $this->Form->end(); ?>
		</div>
	
	</div>
 
	<!-- Modal -->
	<div id="chapterViewModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="chapterViewModalLabel" aria-hidden="true">
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    <h3 id="chapterViewModalLabel"></h3>    
	  </div>
	  <div id="modal-body" class="modal-body"></div>
	  <div class="modal-footer">
	    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	    <button id="submitModalForm" class="btn btn-primary">Save</button>
	  </div>
	</div>




	</div>
</div>
</div>