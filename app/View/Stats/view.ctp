<div class="stats view">
<h2><?php  echo __('Stat'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($stat['Stat']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($stat['User']['id'], array('controller' => 'users', 'action' => 'view', $stat['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Health'); ?></dt>
		<dd>
			<?php echo h($stat['Stat']['health']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gold'); ?></dt>
		<dd>
			<?php echo h($stat['Stat']['gold']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Weight'); ?></dt>
		<dd>
			<?php echo h($stat['Stat']['weight']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Karma'); ?></dt>
		<dd>
			<?php echo h($stat['Stat']['karma']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Stat'), array('action' => 'edit', $stat['Stat']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Stat'), array('action' => 'delete', $stat['Stat']['id']), null, __('Are you sure you want to delete # %s?', $stat['Stat']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Stats'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stat'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
