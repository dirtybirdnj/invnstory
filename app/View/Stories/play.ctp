<?php
$this->Html->script('http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js',array('inline' => false));
$this->Html->script('story_play',array('inline' => false));
?>
<div class="row-fluid">
<div class="span12">
<h1><small>Story:</small>&nbsp;<em><?php echo $story['Story']['name']; ?></em></h1>
<small>By:&nbsp;<em><?php echo $this->Html->link($story['User']['name'],array('controller' => 'users', 'action' => 'view',$story['Story']['user_id'])); ?>&nbsp;|&nbsp;<?php echo $story['Story']['description']; ?></em></small>

</div>

<div class="row-fluid">
<div class="span2">&nbsp;</div>
<div class="span8">

	<div id="newCharForm">
		<h3>Create a New Character to Begin:</h3>
		<div class="well">
			<?php
			echo $this->Form->create('Character');
			echo $this->Form->input('name',array('class' => 'span12'));
			echo $this->Form->input('story_id',array('type' => 'hidden', 'value' => $story['Story']['id']));
			echo $this->Form->button('Begin Adventure!',array('id' => 'btnBeginAdventure','class' => 'btn btn-primary btn-large'));
			echo $this->Form->end();
			?>
		</div>
	</div>

	<?php if($chars){ ?>
	<div id="selectPrevChar">
	<h3>Select an Existing Character</h3>					
	</div>	
	<?php } ?>
	
	<?php
	
	 
	 //debug($story); 
		
		
		
		
	?>
</div>
<div class="span2">&nbsp;</div>
</div>

<div class="row-fluid">
<div class="span2">&nbsp;</div>
<div class="span8">

<div id="storyContainer">

	<h2>Story</h2>
	<div id="story_data" class="well"></div>

</div>	
	
</div>
<div class="span2">&nbsp;</div>
</div>

</div>