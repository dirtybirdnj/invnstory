<div class="row-fluid">
	<div class="span3">&nbsp;</div>
	<div class="span6">
	<h2>Stories:</h2>
	<?php //debug($stories); ?>
	
	<?php 
		
		foreach($stories as $story){
			
			echo '<div class="well">';
			echo '<h3>' . $this->Html->link($story['Story']['name'],array('controller' => 'stories', 'action' => 'play',$story['Story']['id']),array('class' => '')) . '</h3>';
			echo '<p>' . $story['Story']['description'] . '</p>';
			echo '<em>By: ' . $this->Html->link($story['User']['username'],array('controller' => 'users', 'action' => 'view',$story['User']['id'])) . '</em>';
			
			if($this->Session->read('Auth.User.admin') === true){
			echo $this->Html->link('Edit',array('controller' => 'stories', 'action' => 'view',$story['Story']['id']),array('id' => '','class' => 'btnEditStory btn btn-mini btn-success pull-right'));
			echo '&nbsp;'; 
			}
			
			echo $this->Html->link('Play',array('controller' => 'stories', 'action' => 'play',$story['Story']['id']),array('class' => 'btn btn-mini btn-primary pull-right')); 			
			
			echo '</div>';
			
			
		}
		
	?>
	
	</div>
	<div class="span3">&nbsp;</div>
</div>