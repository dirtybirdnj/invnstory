$(document).ready(function(){
	
	var root = location.protocol + '//' + location.host;
	
	$('#btnBeginAdventure').click(function(event){
		
		event.preventDefault();
		//alert('yay')
		
		
		var newchar_url = root + '/invenstory/characters/create';
		
		//alert(newchar_url);
		
		var charname = $('#CharacterName').val();
		var story_id = $('#CharacterStoryId').val();

		$.post(newchar_url,{'name': charname, 'story_id' : story_id},
			function(data){
			
			  if(data.status == 'ok'){
				  
				  //Get Initial Chapter / Primary Event
				  
				  var initial_event_url = root + '/invenstory/stories/init/' + story_id;
				  
				  $.post(initial_event_url,function(data){

					  $('#storyContainer').html(data);
					  $('#newCharForm,#selectPrevChar').fadeOut(function(){ $('#storyContainer').fadeIn(); });
					  
					  
				  });
				  
				  

				  
				  
				  
			  } else {
				  
				  alert(data.message);
				  return false;
			  }

		  
		  
		},"json");
		
				
		
		
	}); // end click
	
	
});