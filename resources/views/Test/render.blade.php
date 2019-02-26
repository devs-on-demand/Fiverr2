
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/sweetalert.min.css">
        <!-- jQuery library -->
        <script src="/js/jquery.min.js"></script>
        <script src="/js/sweetalert.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<form>
			<br><br><br>
		<div class="row">
			<div class="col-sm-offset-2 col-sm-8 form-group">
				<select id="id_event" class="form-control">
					@foreach($events = \App\Events::all() as $event)
					<option value="{{$event->id}}">{{$event->event_name}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-offset-2 col-sm-8 form-group">
				<div id="intermediate_form">
					 <label for="id_form_title">Form</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-offset-2 col-sm-8 text-center">
				<button class="btn btn-success" id="id_viewForm">VIEW FORM</button>
			</div>
		</div>
		</form>
	</div>
</body>
<script>
		$(document).ready(function(){

		function generateForm(formData)
		{
			
			console.log(formData);
			//$('#intermediate_form').empty();
	
			var $formName='';
			var $formdesc='';
	
			var $fieldName ='Field Name';
			var $fieldValue='Field Value';
			var $placeholder='PlaceHolder'
			var $field='';
	
	
			
			var paraField='<div class="row"><div class="col-sm-offset-2 col-sm-8 form-group"><label for="id_form_description">'+$fieldName+'</label><textarea rows="3" class="form-control form-properties" id="id_form_description" name="form_description"></textarea></div></div>';
		
			
		   
			$.each(formData.attributes, function(key,value)
			{
				$.each(value,function(key,value)
				{
					if(key=="question")
					{
						$fieldName=value;
					}
					if(key=="type")
					{
						$.each(value,function(key,value)
						{
							switch (key) {
								case 'shortAnswer':{
									$placeholder=value.description;  
									$field='<div class="row"><div class="col-sm-offset-2 col-sm-8 form-group"><label for="id_form_title">'+$fieldName+'</label><input type="text" class="form-control form-properties" name="form_title" id="id_form_title" placeholder='+$placeholder+'></div></div>';;                                  
									break;
								}
			
								case 'para':{
									$fieldName='';
									$field=paraField;
									break;
								}
								case 'choice':{
									$field='';
									$start='<div class="row"><div class="col-sm-offset-2 col-sm-8 form-group"><label for="id_question">'+$fieldName+'</label><div class="radio"><label>'
									$end='</label></div></div>';
									for(choice in value)
									{
										$fieldValue=value[choice];
										$field=$field+'<div><input  class="choice-properties" type="radio" name="remember">'+$fieldValue+'</div>';    
									}
									$field=$start+$field+$end;
									break;
								}
								case 'option':{
									$field='';
									$start='<div class="row"><div class="col-sm-offset-2 col-sm-8 form-group"><label for="id_question">'+$fieldName+'</label><div class="radio"><label>'
									$end='</label></div></div>';
									for(option in value)
									{
										$fieldValue=value[option];
										$field=$field+'<div><input  class="choice-properties" type="checkbox" name="remember">'+$fieldValue+'</div>';    
									}
									$field=$start+$field+$end;
									break;
								}
									
							
								default:
									break;
							}
							console.log($field);
							$('#intermediate_form').append($field);
							$('#intermediate_form').show();
						
						});
					}
				
				});
	
			});     
			
	
		}

		$("#id_viewForm").on("click",function (){

			$.ajax({
				method:"GET",
				url:"{{route('getFormDetails')}}",
				data:{
					'_token':'{{csrf_token()}}',
					'event_id': $("#id_event").val()
				},
				success:function(data){
					form=JSON.parse(data.JSONString)
					generateForm(form);	
					alert(form)				;
				},
				error:function(){
					alert('not good');
				}
			});
	
	
		});

	});
</script>

</html>
