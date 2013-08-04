<div class="stats index">
	<h2><?php echo __('Stats'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('health'); ?></th>
			<th><?php echo $this->Paginator->sort('gold'); ?></th>
			<th><?php echo $this->Paginator->sort('weight'); ?></th>
			<th><?php echo $this->Paginator->sort('karma'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($stats as $stat): ?>
	<tr>
		<td><?php echo h($stat['Stat']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($stat['User']['id'], array('controller' => 'users', 'action' => 'view', $stat['User']['id'])); ?>
		</td>
		<td><?php echo h($stat['Stat']['health']); ?>&nbsp;</td>
		<td><?php echo h($stat['Stat']['gold']); ?>&nbsp;</td>
		<td><?php echo h($stat['Stat']['weight']); ?>&nbsp;</td>
		<td><?php echo h($stat['Stat']['karma']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $stat['Stat']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $stat['Stat']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $stat['Stat']['id']), null, __('Are you sure you want to delete # %s?', $stat['Stat']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Stat'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
