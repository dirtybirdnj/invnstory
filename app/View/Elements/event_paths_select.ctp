<?php

//debug($id);

//debug($paths);

//debug($this->request->data['EventPaths']);
//debug($events);

?>

<div class="input select">
<h3>Available Paths</h3>
<input type="hidden" name="data[Path][Path]" value="" id="PathPath">
<?php

//$i = 1;

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

	$i = $i + 1;
	
	}
echo '</table>';
echo $this->Form->submit('Submit',array('class' => 'hiddenBtn'));

?>



</div>