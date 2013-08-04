<div class="row-fluid">
	<div class="span2">
		<div class="well sidebar-nav">
			<ul class="nav nav-list">
				<li class="nav-header">Actions</li>
				<li><?php echo $this->Html->link(__('New Chapter'), array('action' => 'add')); ?></li>
				<li><?php echo $this->Html->link(__('List Stories'), array('controller' => 'stories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Story'), array('controller' => 'stories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Paths'), array('controller' => 'paths', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Path'), array('controller' => 'paths', 'action' => 'add')); ?> </li>
			</ul>
		</div>
	</div>
	
	<div class="chapters index span10">
		<h2><?php echo __('Chapters'); ?></h2>
		<table class="table table-striped">
		<tr>
					<th><?php echo $this->Paginator->sort('id'); ?></th>
					<th><?php echo $this->Paginator->sort('story_id'); ?></th>
					<th><?php echo $this->Paginator->sort('name'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($chapters as $chapter): ?>
	<tr>
		<td><?php echo h($chapter['Chapter']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($chapter['Story']['name'], array('controller' => 'stories', 'action' => 'view', $chapter['Story']['id'])); ?>
		</td>
		<td><?php echo h($chapter['Chapter']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $chapter['Chapter']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $chapter['Chapter']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $chapter['Chapter']['id']), null, __('Are you sure you want to delete # %s?', $chapter['Chapter']['id'])); ?>
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
