$(document).ready(function(){
	
	var root = location.protocol + '//' + location.host + '/invenstory';
	
	$('.editEvent').click(function(event){

		event.preventDefault();	
		$('#chapterViewModalLabel').text('Edit Event');
		var event_url = root + '/events/edit_ajax/' + $(event.target).attr('event_id');

		$.post(event_url,function(data){

			$('#modal-body').html(data);
			$('#chapterViewModal').modal();
			
			//$('#chapterViewModal').width($(window).width() - 20);

			
		});
	
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
		

		
			});			

			
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

