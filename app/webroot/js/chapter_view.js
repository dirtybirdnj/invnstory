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
						
						alert($(input).val());

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

						var actionTypeLabel = $(container).find('.actionType option:selected').text();															   					var actionItemText = $(container).find('.actionAddItem option:selected').text();				
						
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
						
					});
					
				}
				
				else if(event.target.value == 5){
					//items
					
					$('#RequirementKeyVal').fadeOut(function(){
						
						$('#RequirementKeySelect').html($('#pathItems').html());
						$('#RequirementKeySelect').fadeIn();
						
					});					
					
				}
				
				else {
				
					$('#RequirementKeySelect').fadeOut(function(){
						
						//$('#RequirementKeySelect').html($('#pathItems').html());
						$('#RequirementKeyVal').fadeIn();
						
					});					
					
					
				}
			
			}); // end requirement.change
			
			
			$('#btnAddRequirement').click(function(){
		
		
				if($('#RequirementKeySelect').val() == ''){
					
					//handle raw value
					alert($('#RequirementKeyVal').val());					
					
				} else {
					
					//handle foreign key
					alert($('#RequirementKeySelect').val());
					
				}
		

		
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
		
		alert($('#modal-body').find('form').parent().html());
				
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

