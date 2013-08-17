	$(document).ready(function(){
	
	var root = location.protocol + '//' + location.host + '/invenstory';

	
	$('.editEvent').click(function(event){

		event.preventDefault();	
		$('#chapterViewModalLabel').text('Edit Event');
		var event_url = root + '/events/edit_ajax/' + $(event.target).attr('event_id');

		$.post(event_url,function(data){

			$('#modal-body').html(data);
			
			$('#EventEditForm').on('click','.btnRemoveAction',function(event){
				
				//alert('boop');
				var container = $(event.target).closest('.pathActionInputs');
				var field = $(container).attr('field');
				
				var remove_action_url = root + '/actions/remove/';
				
				$.post(remove_action_url,{
	
						action_id : $(event.target).attr('action_id'),
						field : field
						
				}, function(){	
				
					if(field == 'success'){
						
						btnClass = 'success';
						label = 'Success';
						
					} else {
						
						btnClass = 'danger';
						label = 'Fail'
						
					}
				
					$(event.target).parent().fadeOut();
					$(event.target).parent().parent().append('<input type="button" class="btnSuccessAction btn btn-mini btn-block btn-' + btnClass + '" value="Add ' + label + ' Action">');
					
				}); // end post
				
				
			}); // end btnRemoveAction delegator
			
			
			$('#EventEditForm').on('click','.btnSuccessAction,.btnFailAction',function(event){
	
				$(event.target).fadeOut(function(){
					
					$(event.target).parent().append($('#actionTemplate').html());
					//$('#actionTemplate').html();
					
					$('.actionType').change(function(event){
						
						//alert(this.value);
						var input = $(event.target).parent().parent().parent().find('.actionValue');
						var select = $(event.target).parent().parent().parent().find('.actionAddItem');			
	
						//Conditionally toggle display of select or input
						
						if(this.value != "5"){				
							if($(input).css('display') == 'none'){ $(select).fadeOut(function(){ $(input).val('').fadeIn(); }); }
						} else {
							if($(select).css('display') == 'none'){ 
								$(input).fadeOut(function(){ 
									$(select).fadeIn(); 
									$(input).val($(select).val());
								}); 
							}
						} //  end if value == 2 || display select list
										
					});				
					
					$('.actionAddItem').change(function(){
						
						var input = $(event.target).parent().parent().parent().find('.actionValue');
						$(input).val(this.value);
						
						//alert($(input).val());

					}); // end change handler
	
				
					$('.actionAddSubmit').click(function(event){
						
						var container = $(event.target).closest('.pathActionInputs');
						
						var actionAddRemove = $(container).find('.actionAddRemove').val();
						var actionType = $(container).find('.actionType').val();
						var actionValue = $(container).find('.actionValue').val();
						
						var actionEventID = $('#eventID').val();
						var pathID = $(event.target).closest('.pathActionRow').attr('path_id');
						var chapterID = $('#chapterID').val();	
						var actionSuccessFail = $(container).attr('field');
						
						//var actionAddRemoveLabel = 'Remove';
						//if(actionAddRemove == "1") actionAddRemoveLabel = 'Add';

						var actionAddRemoveLabel = $(container).find('.actionAddRemove option:selected').text();

						var actionTypeLabel = $(container).find('.actionType option:selected').text();															var actionItemText = $(container).find('.actionAddItem option:selected').text();				
						
						var addActionURL = root + '/actions/add';

						var actionAddRemoveLabelClass = 'important';
						if(actionAddRemove == "1") actionAddRemoveLabelClass = 'success';
						
						$.post(addActionURL,{
							addRemove: actionAddRemove,
							type: actionType, 
							value: actionValue,
							event_id: actionEventID,
							path_id: pathID,
							chapter_id: chapterID,
							success_fail: actionSuccessFail
							},
						function(data){

							var actionHtml = '<p class="well well-small">';
							actionHtml += '<span class="label label-' + actionAddRemoveLabelClass + '">' + actionAddRemoveLabel + '</span>&nbsp;';
							
							if(actionType == "5"){ actionHtml += actionItemText; }
							else { actionHtml += actionValue + '&nbsp;' + actionTypeLabel; }
							
							actionHtml += '<input action_id="' + data.id + '" type="button" field="' + actionSuccessFail + '" value="Remove" ';
							actionHtml += 'class="btnRemoveAction btn btn-mini btn-danger pull-right">';
							actionHtml += '</p>';
								
							$(container).empty().html(actionHtml);
							
						},"json"); // end post
						
					});	// end click handler						
					
				}); // end fadeout

				
			}); // end btnSuccessAction
			
			/*
			
			$('.btnFailAction').click(function(event){
			
				$(event.target).fadeOut();
				$(event.target).parent().append($('#actionTemplate').html());			
				
				
			});			
			
			*/
						
			$('#chapterViewModal').modal();
			
			
		}); // end post
	
	}); // end edit click event
	
	$('.editPath').click(function(event){
		
		event.preventDefault();
		$('#chapterViewModalLabel').text('Edit Path');
		var event_url = root + '/paths/edit_ajax/' + $(event.target).attr('path_id');
		
		$.post(event_url,function(data){

			$('#modal-body').html(data);
			$('#chapterViewModal').modal();
			
			//$('#chapterViewModal').width($(window).width() - 20);


			//Attach event here because .on is being a dick			
			$('#RequirementRequirementTypeId').change(function(event){
							
				if(event.target.value == 4){
					//paths
					
					$('#RequirementKeyVal').fadeOut(function(){
						
						$('#RequirementKeySelect').html($('#pathPaths').html());
						$('#RequirementKeySelect').fadeIn();
						$('#RequirementKeyVal').val($('#RequirementKeySelect').val());
						
						
					});
					
				}
				
				else if(event.target.value == 5){
					//items
					
					$('#RequirementKeyVal').fadeOut(function(){
						
						$('#RequirementKeySelect').html($('#pathItems').html());
						$('#RequirementKeySelect').fadeIn();
						$('#RequirementKeyVal').val($('#RequirementKeySelect').val());						
						
					});					
					
				}
				
				else {
				
					$('#RequirementKeySelect').fadeOut(function(){
						
						//$('#RequirementKeySelect').html($('#pathItems').html());
						$('#RequirementKeyVal').val('').fadeIn();
						
					});					
					
					
				}
			
			}); // end requirement.change
			
			$('#reqTable').on('click','.btnRemoveReq',function(event){
				
				var req_id = $(event.target).attr('requirement_id');
				
				var del_req_url = root + '/requirements/delete/' + req_id;
				$.post(del_req_url,function(data){
					
					if(data.status == 'ok'){
						
						$(event.target).parent().parent().remove();
						
					}
					
				},"json");
				
			});
			
			//Event when the item/event select is changed
			$('#RequirementKeySelect').change(function(event){
								
				//alert($(event.target).val());				
				$('#RequirementKeyVal').val($(event.target).val());
				alert($('#RequirementKeyVal').val());
			});
			
			
			$('#btnAddRequirement').click(function(event){
		
				var add_req_url = root + '/requirements/add';

				//var container = $(event.target).closest('.row-fluid');
				var path_id = $('#RequirementPathId').val();
				var reqType = $('#RequirementRequirementTypeId').val();
				var reqVal = $('#RequirementKeyVal').val();
				var reqLabelText = $('#RequirementRequirementTypeId option:selected').text();
				var keyLabelText = $('#RequirementKeySelect option:selected').text(); 
				

				$.post(add_req_url,{path_id: path_id,requirement_type_id: reqType,foreign_key: reqVal},function(data){
					
					var removeBtn = '<input requirement_id="' + data.id + '" type="button" value="Remove" class="btnRemoveReq btn btn-mini btn-danger">';

					if(reqType == '4' || reqType == '5'){
						
						//handle raw value
						var rowdata = '<td>' + data.id + '</td><td>' + reqLabelText + '</td><td>' + removeBtn + keyLabelText + '</td>';
						
					} else {
						
						//handle foreign key
						var rowdata = '<td>' + data.id + '</td><td>' + reqLabelText + '</td><td>' + removeBtn +  reqVal + '</td>';
						
					}
					
					
					var rowHtml = '<tr>' + rowdata + '</tr>';
					
					$('#reqTable').append(rowHtml);
					
				},"json"); // end add req post
		
			}); // end add requirement
			
			
		}); // end post
		
	});
	

	
    $('#btnAddEvent').click(function(){

		$('#chapterViewModalLabel').text('Add Event');	   
		$('#modal-body').html($('#createEventForm').html());
		$('#chapterViewModal').modal();
	    
    });
    
    $('#btnAddPath').click(function(){
	   
		$('#chapterViewModalLabel').text('Add Path');	   
		$('#modal-body').html($('#createPathForm').html());
		$('#chapterViewModal').modal();
	    
	    
    }); 
 	
	$('#submitModalForm').click(function(event){
		
		//alert($('#modal-body').find('form').parent().html());
				
		$('#modal-body').find('.hiddenBtn').click(); 

	//window.location = window.location;		
		
	});
	
	$('.primaryEvtSelect').click(function(event){
				
		var chapter_id = $(event.target).attr('chapter_id');
		var event_id = $(event.target).attr('event_id');				

		$('.primaryEvtSelect').addClass('notPrimary');		
		$(event.target).removeClass('notPrimary');

		var select_url = root + '/chapters/set_primary_event/' + chapter_id + '/' + event_id;
		
		$.post(select_url,function(){ });
			
	});
					

	
	
});

