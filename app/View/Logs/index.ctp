<div class="row-fluid">
	<div class="span2">
		<div class="well sidebar-nav">
			<ul class="nav nav-list">
				<li class="nav-header">Actions</li>
				<li><?php echo $this->Html->link(__('New Log'), array('action' => 'add')); ?></li>
				<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stories'), array('controller' => 'stories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Story'), array('controller' => 'stories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Chapters'), array('controller' => 'chapters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chapter'), array('controller' => 'chapters', 'action' => 'add')); ?> </li>
			</ul>
		</div>
	</div>
	
	<div class="logs index span10">
		<h2><?php echo __('Logs'); ?></h2>
		<table class="table table-striped">
		<tr>
					<th><?php echo $this->Paginator->sort('id'); ?></th>
					<th><?php echo $this->Paginator->sort('user_id'); ?></th>
					<th><?php echo $this->Paginator->sort('story_id'); ?></th>
					<th><?php echo $this->Paginator->sort('chapter_id'); ?></th>
					<th><?php echo $this->Paginator->sort('model'); ?></th>
					<th><?php echo $this->Paginator->sort('message'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($logs as $log): ?>
	<tr>
		<td><?php echo h($log['Log']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($log['User']['name'], array('controller' => 'users', 'action' => 'view', $log['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($log['Story']['name'], array('controller' => 'stories', 'action' => 'view', $log['Story']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($log['Chapter']['name'], array('controller' => 'chapters', 'action' => 'view', $log['Chapter']['id'])); ?>
		</td>
		<td><?php echo h($log['Log']['model']); ?>&nbsp;</td>
		<td><?php echo h($log['Log']['message']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $log['Log']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $log['Log']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $log['Log']['id']), null, __('Are you sure you want to delete # %s?', $log['Log']['id'])); ?>
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
