<div class="row-fluid">
<div class="actions span2">
		<div class="well sidebar-nav">
			<ul class="nav nav-list">
				<li class="nav-header">Actions</li>
		<li><?php echo $this->Html->link(__('Edit Character'), array('action' => 'edit', $character['Character']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Character'), array('action' => 'delete', $character['Character']['id']), null, __('Are you sure you want to delete # %s?', $character['Character']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Characters'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Character'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
		</div>
</div>
<div class="characters view span10">
<h2><?php  echo __('Character'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($character['Character']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($character['User']['name'], array('controller' => 'users', 'action' => 'view', $character['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($character['Character']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gold'); ?></dt>
		<dd>
			<?php echo h($character['Character']['gold']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Karma'); ?></dt>
		<dd>
			<?php echo h($character['Character']['karma']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Wcap'); ?></dt>
		<dd>
			<?php echo h($character['Character']['wcap']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Progress'); ?></dt>
		<dd>
			<?php echo h($character['Character']['progress']); ?>
			&nbsp;
		</dd>
	</dl>

</div>
</div>