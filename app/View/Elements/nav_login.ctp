<?php

if(!is_null($data)){ ?>

<p class="navbar-text pull-right">
  Logged in as 
  
  <?php echo $this->Html->link($data['username'],array('controller' => 'stories', 'action' => 'index')); ?>
  &nbsp;|&nbsp; 
  
  <?php echo $this->Html->link('Logout',array('controller' => 'users', 'action' => 'logout')); ?>
</p>

<?php } else { ?>

<p class="navbar-text pull-right">
	<?php echo $this->Html->link('Log In',array('controller' => 'users', 'action' => 'login')); ?>
</p>


<?php } ?>