<div class="row-fluid">
	<div class="span2">
		<div class="well sidebar-nav">
			<ul class="nav nav-list">
				<li class="nav-header">Actions</li>
				<li><?php echo $this->Html->link(__('New Character'), array('action' => 'add')); ?></li>
				<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
			</ul>
		</div>
	</div>
	
	<div class="characters index span10">
		<h2><?php echo __('Characters'); ?></h2>
		<table class="table table-striped">
		<tr>
					<th><?php echo $this->Paginator->sort('id'); ?></th>
					<th><?php echo $this->Paginator->sort('user_id'); ?></th>
					<th><?php echo $this->Paginator->sort('name'); ?></th>
					<th><?php echo $this->Paginator->sort('gold'); ?></th>
					<th><?php echo $this->Paginator->sort('karma'); ?></th>
					<th><?php echo $this->Paginator->sort('wcap'); ?></th>
					<th><?php echo $this->Paginator->sort('progress'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($characters as $character): ?>
	<tr>
		<td><?php echo h($character['Character']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($character['User']['name'], array('controller' => 'users', 'action' => 'view', $character['User']['id'])); ?>
		</td>
		<td><?php echo h($character['Character']['name']); ?>&nbsp;</td>
		<td><?php echo h($character['Character']['gold']); ?>&nbsp;</td>
		<td><?php echo h($character['Character']['karma']); ?>&nbsp;</td>
		<td><?php echo h($character['Character']['wcap']); ?>&nbsp;</td>
		<td><?php echo h($character['Character']['progress']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $character['Character']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $character['Character']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $character['Character']['id']), null, __('Are you sure you want to delete # %s?', $character['Character']['id'])); ?>
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
