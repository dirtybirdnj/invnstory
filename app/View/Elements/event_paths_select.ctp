<div class="input select">
<h3>Available Paths</h3>

<input id="chapterID" type="hidden" value="<?php echo $this->request->data['Chapter']['id']; ?>"/>
<input id="eventID" type="hidden" value="<?php echo $this->request->data['Event']['id']; ?>"/>

<input type="hidden" name="data[Path][Path]" value="" id="PathPath">
<?php

	//debug($story_items);
	//debug($event_actions);

	echo '<table class="table" class="table table-condensed">';

	echo '<tr><th>&nbsp;</th><th>id</th><th>Path</th><th>Success</th><th>Roll</th><th>Roll Target</th><th>Failure</th></tr>';

	$i = 0;
	foreach($paths as $key => $val){	
		echo '<tr>';

			//debug($val);
			echo '<td><input type="checkbox" name="PathPath' . $i . 'path_id" value="' . $key . '" id="PathPath' . $i . '"';
			
			foreach($this->request->data['EventPaths'] as $evtpath){ if($key == $evtpath['path_id']) echo ' checked="checked" '; }
			echo '/></td>';
			echo '<td>' . $key . '</td>';
			echo '<td>' . $val . '</td>';
			echo '<td>'. "\n\n";					
				echo '<select name="PathPath' . $i . 'Success" id="PathPath' . $i . 'Success">'. "\n\n";
				//Default, unselected
				echo '<option value="0">&nbsp;</option>'. "\n\n";


				
				foreach($events as $event){
					if($event['Event']['id'] != $id){ echo '<option value="' . $event['Event']['id'] . '"';
					foreach($this->request->data['EventPaths'] as $evtpath){	
						
						if($key == $evtpath['path_id'] && $evtpath['success'] == $event['Event']['id']){ echo ' selected '; }
					}
											

					
					echo'>' . $event['Event']['id'] . ' - ' . $event['Event']['title'] . '</option>' . "\n\n"; }				
				}
				echo '</select>' . "\n\n"; 
			echo '</td>'. "\n\n";

			echo '<td>';
				echo '<select name="PathPath' . $i . 'roll_id" class="EventPathRoll">';
					echo '<option value="">&nbsp;</option>';
				
					foreach($rolls as $roll){ echo '<option value="' . $roll['Roll']['id'] . '"';
						foreach($this->request->data['EventPaths'] as $evtpath){	
							
							if($key == $evtpath['path_id'] && $evtpath['roll_id'] == $roll['Roll']['id']){ echo ' selected '; }
						}					
						
					echo '>' . $roll['Roll']['sides'] . '</option>'; }
				
				echo '</select>';
		
		
			echo '</td>';


			echo '<td>';
			echo '<input type="text" name="PathPath' . $i . 'Roll_Target" class="EventPathRollTarget" value="';
			foreach($this->request->data['EventPaths'] as $evtpath){	
				
				if($key == $evtpath['path_id'] && $evtpath['roll_target'] != NULL){ echo $evtpath['roll_target']; }
			}	
			
			echo '"/>';
			
			echo '</td>';


			echo '<td>';					
				echo '<select name="PathPath' . $i . 'Fail" id="PathPath' . $i . 'Fail" class="PathFail">';
				echo '<option value="">&nbsp;</option>';		
				foreach($events as $event){
					
					//debug($event);
					
					if($event['Event']['id'] != $id){ echo '<option value="' . $event['Event']['id'] . '"';
					foreach($this->request->data['EventPaths'] as $evtpath){	
						
						if($key == $evtpath['path_id'] && $evtpath['fail'] == $event['Event']['id']){ echo ' selected '; }
					}					
					
					
					echo'>' . $event['Event']['id'] . ' - ' . $event['Event']['title'] . '</option>';
						
					}
					
					
					
				}
				echo '</select>'; 
			echo '</td>';
		echo '</tr>';
		
		echo '<tr class="pathActionRow" path_id="' . $key . '">';
		
			echo '<td colspan="3">Path Actions:</td>';
			echo '<td colspan="2" class="pathActionInputs">';

			$action_exists = false;
			
			foreach($this->request->data['EventPaths'] as $evtpath){ 



				if($key == $evtpath['path_id'] && $evtpath['success_action'] != NULL){ 
								
					foreach($event_actions as $evtact){
						
						if($evtpath['success_action'] == $evtact['Action']['id']){
							
							echo '<p class="well well-small">';
							
							if($evtact['Action']['add'] == '1'){ echo '<span class="label label-success">Add</span>'; }
							else { echo '<span class="label label-important">Remove</span>'; }
							

							if($evtact['RequirementType']['id'] == '5'){
										
								foreach($story_items as $item){
									
									if($item['Item']['id'] == $evtact['Action']['value']){ echo '&nbsp' . $item['Item']['title']; }
									
								}		
											
							
							} else {
								
								echo '&nbsp;' . $evtact['Action']['value'];
								echo '&nbsp;' . $evtact['RequirementType']['title'];

							}

							echo '<input action_id="' . $evtact['Action']['id'] . '" field="success" type="button" value="Remove" class="btnRemoveAction btn btn-mini btn-danger pull-right"/>';

							echo '</p>';
							
						}
						
						
					}
					
					$action_exists = true;
					break;
					
					debug($evtpath);
					debug($evtact);
					
				} else {
					
					//echo '<p>nope</p>';
					
				}
				
				
			}
			
			//debug($action_exists);
			
			if(!$action_exists){
			
				echo '<input type="button" class="btnSuccessAction btn btn-mini btn-block btn-success" value="Add Success Action"/>';
			
			}
			
			
			echo '</td>';
			
			
			echo '<td colspan="2" class="pathActionInputs"><input type="button" class="btnFailAction btn btn-mini btn-block btn-danger" value="Add Fail Action"/></td>';			
		echo '</tr>';
		
	$i = $i + 1;
	
	}
echo '</table>';
echo $this->Form->submit('Submit',array('class' => 'hiddenBtn'));

?>

	<div style="display: none">
	
		<div id="actionTemplate">
			<div class"row-fluid">
				<div class="span12">
					<select class="aInputs actionAddRemove" name="actionAddRemove">
						<option value="0">Remove</option>
						<option value="1">Add</option>			
					</select>
					<select class="aInputs actionType">
					<?php foreach($action_types as $key => $val){ echo '<option value="' . $key . '">' . $val . '</option>'; } ?>
					</select>
				</div>
				
			</div>
			<div class="row-fluid">	
				
				<div class="span12">
				<p class="pull-left actionValueLabel">Value:</p>		
					<select class="aInputs actionAddItem" name="actionItem">
					<?php foreach($story_items as $item){ echo '<option value="' . $item['Item']['id'] . '">' . $item['Item']['title'] . '</option>'; }
			
					?>
					</select>
					<input class="aInputs actionValue" type="text" name="actionValue"> 
				</div>
		
			</div>
			<div class="row-fluid">
				<div class="span12">
					<input type="button" value="Add" class="aInputs actionAddSubmit btn btn-block btn-mini btn-primary"/>
				</div>
			</div>
			
			
		
		</div>
		
	</div>	

</div>