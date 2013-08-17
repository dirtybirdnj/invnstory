	<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>    
	
	<!-- Le styles -->
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('style');		

		echo $this->fetch('meta');
		echo $this->fetch('css');

	?>
</head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <?php echo $this->Html->link('Invnstory',array('controller' => 'stories', 'action' => 'home'),array('class' => 'brand')); ?>
		  <?php if(!$this->Session->read('Auth.User')){ ?>
          <a id="headerTagline" class="brand">An interactive choose your adventure story with an inventory!</a>
		  <?php } ?>          
          <div class="nav-collapse collapse">
            <!--
            <p class="navbar-text pull-right">
              Logged in as <a href="#" class="navbar-link">Username</a>
            </p>
            -->
            <?php echo $this->element('nav_login',array('data' => $this->Session->read('Auth.User'))); ?>

            <ul class="nav">
              <?php if($this->Session->read('Auth.User')){ ?>
              <li><?php echo $this->Html->link('Users',array('controller' => 'users', 'action' => 'index')); ?></li>
              <li><?php echo $this->Html->link('Stories',array('controller' => 'stories', 'action' => 'index')); ?></li>
			  
			  <?php } ?>

                                      
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
		  	<div class="span12" id="main_container">
		  	
		  		<?php //debug($this->Session->read('Auth.User')); ?>
		  	
		  		<?php echo $this->Session->flash(); ?>
		  	
		  		<?php echo $this->fetch('content'); ?>
		  		
		  		<div class="well">
		  		<?php echo $this->element('sql_dump'); ?>
		  		</div>
		  	</div>
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; mat gilbert 2013</p>
      </footer>

    </div><!--/.fluid-container-->

	<?php echo $this->fetch('script'); ?>
	
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-3968508-6', 'matgilbert.com');
  ga('send', 'pageview');

</script>
</body>
</html>
