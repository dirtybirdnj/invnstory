<div class="row-fluid">
<div class="actions span2">
		<div class="well sidebar-nav">
			<ul class="nav nav-list">
				<li class="nav-header">Chapter</li>
				<li><?php echo $this->Html->link($event['Chapter']['name'], array('controller' => 'chapters', 'action' => 'view', $event['Chapter']['id'])); ?>&nbsp;</li>

				<li class="nav-header">Actions</li>
				<li><?php echo $this->Html->link(__('Edit Event'), array('action' => 'edit', $event['Event']['id'])); ?> </li>
				<li><?php echo $this->Form->postLink(__('Delete Event'), array('action' => 'delete', $event['Event']['id']), null, __('Are you sure you want to delete # %s?', $event['Event']['id'])); ?> </li>
				<li><?php echo $this->Html->link(__('New Event'), array('action' => 'add')); ?> </li>

	</ul>
		</div>
</div>
<div class="events view span10">
<h2><?php  echo __('Event'); ?></h2>
	<div class="well">
		<p><?php echo h($event['Event']['content']); ?>&nbsp;</p>
	</div>


<?php //debug($event);
	//debug($paths); 

 ?>

<div class="related">
	<h3><?php echo __('Related Paths'); ?></h3>
	<?php if (!empty($event['EventPaths'])): ?>
	<table class="table">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php

		//debug($paths);

		$i = 0;
		foreach ($event['EventPaths'] as $path){
	
			//debug($path);
	
		?>
		<tr>
			<td><?php echo $path['id']; ?></td>
			
			<?php foreach($paths as $p){
				
				//debug($p);
				
				if($path['path_id'] == $p['Path']['id']){ echo  '<td>' . $p['Path']['title'] . '</td>'; }
			
			} ?>

			<td class="actions">
				<?php //echo $this->Html->link(__('View'), array('controller' => 'paths', 'action' => 'view', $path['path_id'])); ?>
				<?php //echo $this->Html->link(__('Edit'), array('controller' => 'paths', 'action' => 'edit', $path['path_id'])); ?>
				<?php //echo $this->Form->postLink(__('Delete'), array('controller' => 'paths', 'action' => 'delete', $path['id']), null, __('Are you sure you want to delete # %s?', $path['id'])); ?>
			</td>
		</tr>
		<tr class="reqBottom">
			<td colspan="3">
			<p>Requirements</p>
			</td>
		</tr>
	<?php } ?>
	</table>
<?php endif; ?>

</div>
</div>
</div>