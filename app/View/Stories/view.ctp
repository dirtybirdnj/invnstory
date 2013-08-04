<div class="row-fluid">
<div class="actions span2">
		<div class="well sidebar-nav">
			<ul class="nav nav-list">
				<li class="nav-header">Actions</li>
		<li><?php echo $this->Html->link(__('Edit Story'), array('action' => 'edit', $story['Story']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Story'), array('action' => 'delete', $story['Story']['id']), null, __('Are you sure you want to delete # %s?', $story['Story']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Stories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Story'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Chapters'), array('controller' => 'chapters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chapter'), array('controller' => 'chapters', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
		</div>
</div>
<div class="stories view span10">
<h2><?php  echo __('Story'); ?>:&nbsp;<small><?php echo h($story['Story']['name']); ?></small></h2>
<p>By: <?php echo $this->Html->link($story['User']['name'], array('controller' => 'users', 'action' => 'view', $story['User']['id'])); ?></p>
<em><?php echo h($story['Story']['description']); ?></em>
	<?php //debug($story) ?>


<div class="related">
	<div class="row-fluid">
	<div class="span6">	
		<h3><?php echo __('Chapters'); ?></h3>
		<?php if (!empty($story['Chapter'])): ?>
		<table class="table table-striped">
	<tr>
		<th><?php echo __('Name'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($story['Chapter'] as $chapter): ?>
		<tr>

			<td><?php echo $chapter['name']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'chapters', 'action' => 'view', $chapter['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'chapters', 'action' => 'edit', $chapter['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'chapters', 'action' => 'delete', $chapter['id']), null, __('Are you sure you want to delete # %s?', $chapter['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
	<?php endif; ?>
	
		<div class="chapters form well">
		<?php echo $this->Form->create('Chapter',array('controller' => 'chapters', 'action' => 'add')); ?>
			<fieldset>
				<legend><?php echo __('Add Chapter'); ?></legend>
			<?php
				echo $this->Form->input('story_id',array('type' => 'hidden', 'value' => $story['Story']['id']));
				echo $this->Form->input('name');
			?>
			</fieldset>
		<?php echo $this->Form->end(__('Submit')); ?>
		</div>	
	
		</div>
	
	<div class="span6">
		<div class="related">
			<h3><?php echo __('Items'); ?></h3>
			<?php if (!empty($story['Item'])): ?>
			<table class="table table-striped">
			<tr>
				<th><?php echo __('Title'); ?></th>
				<th><?php echo __('Cost'); ?></th>
				<th><?php echo __('Weight'); ?></th>
				<th><?php echo __('Description'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
			<?php
				$i = 0;
				foreach ($story['Item'] as $item): ?>
				<tr>
					<td><?php echo $item['title']; ?></td>
					<td><?php echo $item['cost']; ?></td>
					<td><?php echo $item['weight']; ?></td>
					<td><?php echo $item['description']; ?></td>
					<td class="actions">
						<?php echo $this->Html->link(__('View'), array('controller' => 'items', 'action' => 'view', $item['id'])); ?>
						<?php echo $this->Html->link(__('Edit'), array('controller' => 'items', 'action' => 'edit', $item['id'])); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'items', 'action' => 'delete', $item['id']), null, __('Are you sure you want to delete # %s?', $item['id'])); ?>
					</td>
				</tr>
			<?php endforeach; ?>
			</table>
		<?php endif; ?>
		
			<div class="items form well">
			<?php echo $this->Form->create('Item'); ?>
				<fieldset>
					<legend><?php echo __('Add Item'); ?></legend>
				<?php
					echo $this->Form->input('story_id',array('type' => 'hidden', 'value' => $story['Story']['id']));
					echo $this->Form->input('title');
					echo $this->Form->input('cost');
					echo $this->Form->input('weight');
					echo $this->Form->input('description');
				?>
				</fieldset>
			<?php echo $this->Form->end(__('Submit')); ?>
			</div>
	
	</div>	
	
	
	
	</div>
</div>

</div>
</div>
</div>