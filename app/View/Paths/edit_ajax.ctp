

	<fieldset>
	<?php
		echo $this->Form->create('Path',array('controller' => 'paths', 'action' => 'edit',$this->data['Path']['id']));
		echo $this->Form->input('id',array('type' => 'hidden','value' => $this->data['Path']['id']));
		echo $this->Form->input('chapter_id',array('type' => 'hidden','value' => $this->data['Path']['chapter_id']));
		echo $this->Form->input('story_id',array('type' => 'hidden','value' => $this->data['Path']['story_id']));
		echo $this->Form->input('title',array('value' => $this->data['Path']['title'],'class' => 'span12'));
	?>
	</fieldset>

<?php 		
		echo $this->Form->submit('Submit',array('class' => 'hiddenBtn'));
		echo $this->Form->end();
		
		//debug($chapter_paths);
		//debug($story_items);
		
?>

<h3>Requirements</h3>
	<table class="table">
	<tr>
		<th class="reqId">ID</th>
		<th class="reqType">Type</th>
		<th class="reqTextVal">Value</th>
	</tr>


	<?php	
	
	
	foreach($this->data['Requirement'] as $req){
	
	echo '<tr>';

	echo '<td>' . $req['id'] . '</td><td>' . $requirement_types[$req['requirement_type_id']] . '</td><td>';
	echo '<input type="button" value="Remove" class="btnRemoveReq btn btn-mini btn-danger"/>' . $req['foreign_key'];
	
		if($req['requirement_type_id'] == 4){
		
			foreach($chapter_paths as $path){
				
				if($path['Path']['id'] == $req['foreign_key']){
					
					echo '<p>' . $path['Path']['title'] . '</p>';
					
				}
				
			}
				
			
		}
		
		if($req['requirement_type_id'] == 5){
	
			foreach($story_items as $item){
				
				if($item['Item']['id'] == $req['foreign_key']){
					
					echo '<p>' . $item['Item']['title'] . '</p>';
					
				}
				
			}
			
			
		}

	echo '</td></tr>';
	
	}
	
?>
	</table>

<?php 
echo $this->Form->create('Requirement',array('controller' => 'requirements', 'action' => 'add'),array('class' => 'form-inline')); ?>
	<fieldset>
		<legend><?php echo __('Add Requirement'); ?></legend>
	<?php echo $this->Form->input('path_id',array('type' => 'hidden', 'value' => $this->data['Path']['id'])); ?>
	
	<div class="row-fluid">
	
		<div class="pathKeyOpts span2">
		<p>Type</p>
		<?php echo $this->Form->select('requirement_type_id',$requirement_types,array('class' => 'span12')); ?>
		</div>
		
		
		<div class="pathKeyOpts span9">
		<p>Value</p>
		<?php echo $this->Form->input('key_val',array('label' => false,'class' => 'span12')); ?>		
		<?php echo $this->Form->select('key_select',null,array('class' => 'span12')); ?>
		</div>
		
		<div class="span1">
			<input id="btnAddRequirement" type="button" value="Add" class="btn btn-success btn-block"/>
		</div>

		<?php echo $this->Form->input('foreign_key',array('type' => 'hidden')); ?>
		
	</div>	
		
	</fieldset>
<?php echo $this->Form->end(); ?>


	<div id="pathSelectData">
		<div id="pathItems">
		<?php foreach($story_items as $item){ echo '<option value="' . $item['Item']['id'] . '">' . $item['Item']['title'] . '</option>'; } ?>
		</div>
		
		<div id="pathPaths">
		<?php foreach($chapter_paths as $path){ echo '<option value="' . $path['Path']['id'] . '">' . $path['Path']['title'] . '</option>'; } ?>	
		</div>
	</div>
