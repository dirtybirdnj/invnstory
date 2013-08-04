<div class="row-fluid">
	<div class="span2">
		<div class="well sidebar-nav">
			<ul class="nav nav-list">
				<li class="nav-header">Actions</li>
				<li><?php echo $this->Html->link(__('New Path'), array('action' => 'add')); ?></li>
				<li><?php echo $this->Html->link(__('List Chapters'), array('controller' => 'chapters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chapter'), array('controller' => 'chapters', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stories'), array('controller' => 'stories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Story'), array('controller' => 'stories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Requirements'), array('controller' => 'requirements', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Requirement'), array('controller' => 'requirements', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
			</ul>
		</div>
	</div>
	
	<div class="paths index span10">
		<h2><?php echo __('Paths'); ?></h2>
		<table class="table table-striped">
		<tr>
					<th><?php echo $this->Paginator->sort('id'); ?></th>
					<th><?php echo $this->Paginator->sort('chapter_id'); ?></th>
					<th><?php echo $this->Paginator->sort('story_id'); ?></th>
					<th><?php echo $this->Paginator->sort('title'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($paths as $path): ?>
	<tr>
		<td><?php echo h($path['Path']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($path['Chapter']['name'], array('controller' => 'chapters', 'action' => 'view', $path['Chapter']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($path['Story']['name'], array('controller' => 'stories', 'action' => 'view', $path['Story']['id'])); ?>
		</td>
		<td><?php echo h($path['Path']['title']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $path['Path']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $path['Path']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $path['Path']['id']), null, __('Are you sure you want to delete # %s?', $path['Path']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
		</table>
		<p>
		<?php
		echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
		));
		?>		</p>
		<div class="paging">
		<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
		</div>
	</div>
</div>
