<html>
    <head>
        <title>This is Test</title>
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <div class="container" id="main-container">
            <div class="row">
                <div class="col-sm-12">
                    <h3>Click to Add a field</h3>
                    <small>Note : Please don't refresh the page before you submit, else you will lose the information entered</small><br><br>
                    <form id="create_form">
                        <div class="row">
                            <div class="col-sm-offset-2 col-sm-6 form-group">
                                <label for="id_event_id">Select Event</label>
                                <select class="form-control" id="id_event_id">
                                    @foreach($events= \App\Events::all() as $event)
                                        <option value="{{$event->id}}">{{$event->event_name}}</option>
                                    @endforeach
                                </select><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-offset-2 col-sm-8 form-group">
                                <div id="intermediate_form">
                                     <label for="id_form_title">Form</label>
                                </div>
                            </div>
                        </div>
                        <div class="form_title">
                                <div class="row">
                                        <div class="col-sm-offset-2 col-sm-8 form-group">
                                            <label for="id_form_title">Form Title</label>
                                            <input type="text" class="form-control form-properties" name="form_title" id="id_form_title" placeholder="ENTER FORM TITLE">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-offset-2 col-sm-8 form-group">
                                            <label for="id_form_description">Form Desription</label>
                                            <textarea rows="3" class="form-control form-properties" id="id_form_description" name="form_description"></textarea>
                                        </div>
                                    </div>
                        </div>

                        <br><br>

                        <div class="row">
                            <div class="col-sm-offset-2 col-sm-5 form-group">
                                <label for="id_question">Enter Your Question</label>
                                <input class="form-control form-properties" type="text" name="question" id="id_question" placeholder="Enter Your Question">
                            </div>
                            <div class="col-sm-3 form-group">
                                <label for="id_answer_type">Select Answer Type</label>
                                <select name="answer_type" id="id_answer_type" class="form-control form-properties">
                                    <option value="text">Short Answer</option>
                                    <option value="radio">Multiple Choice</option>
                                    <option value="checkbox">Checkbox</option>
                                    <option value="drop">Drop Down</option>
                                </select>
                            </div>
                        </div>

                        <div class="row short_answer" id="id_short-answer">
                            <div class="col-sm-offset-2 col-sm-5 form-group">
                                <label for="id_short-answer">Sample Answer Field</label>
                                <input class="form-control form-properties" type="text" name="short_answer" id="id_short-answer" placeholder="Sample Answer Field">
                            </div>
                            <div class="col-sm-3 form-group ">
                                <label for="id_validation">Response Validation</label>
                                <select name="validation" class="form-control form-properties" id="id_validation">
                                    <option value="true">Yes</option>
                                    <option value="false" selected="selected">No</option>
                                </select>
                            </div>
                        </div>

                        <div class="row single_choice" id="id_short-answer">
                            <div class="col-sm-offset-2 col-sm-5 form-group">
                                <label for="id_question">Choices :</label>
                                <div>
                                    <ol class="choices">
                                        <li><input class="form-control choice-properties" type="text" name="0" id="0" placeholder="Choice"></li>
                                    </ol>
                                </div>
                                <div class="row">
                                    <div class="col-sm-offset-1 col-sm-8">
                                        <button class="btn btn-primary" id="id_moreChoice">ADD MORE CHOICES</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row multi-choice" id="id_short-answer">
                                <div class="col-sm-offset-2 col-sm-5 form-group">
                                    <label for="id_question">Options :</label>
                                    <div>
                                        <ol class="options">
                                            <li><input class="form-control option-properties" type="text" name="0" id="0" placeholder="Option"></li>
                                        </ol>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-offset-1 col-sm-8">
                                            <button class="btn btn-primary" id="id_moreOption">ADD MORE OPTIONS</button>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="row validation-group" id="id_input_desc">
                            <div class="col-sm-offset-2 col-sm-5 form-group">
                                <label for="id_description">Description</label>
                                <input id="id_description" class="form-control form-properties" type="text" name="description" placeholder="Question Description">
                            </div>
                            <div class="col-sm-3 form-group">
                                <label for="id_required">Required</label>
                                <select name="required" class="form-control form-properties" id="id_required">
                                    <option value="false" selected="selected">No</option>
                                    <option value="true">Yes</option>
                                </select>
                            </div>
                        </div>

                        <div class="row validation-group">
                            <div class="col-sm-offset-2 col-sm-2 form-group">
                                <label for="id_validation_type">Validation Type</label>
                                <select name="validation_type" id="id_validation_type" class="form-control form-properties">
                                    <option value="digits">Number</option>
                                    <option value="text">Text</option>
                                    <option value="email">Email</option>
                                    <option value="date">Date</option>
                                    <option value="url">Url</option>
                                </select>  
                            </div>
                            <div class="col-sm-2 form-group">
                                <label for="id_minlength">Minimum Length</label>
                                <input type="text" name="minlength" id="id_minlength" class="form-control form-properties" placeholder="Enter Minlength">
                            </div>

                            <div class="col-sm-2 form-group">
                                <label for="id_maxlength">Maximum Length</label>
                                <input type="text" name="maxlength" id="id_maxlength" class="form-control form-properties" placeholder="Enter Maxlength">
                            </div>
                        </div>
                        <div class="row validation-group">
                            <div class="col-sm-offset-2 col-sm-6 form-group">
                                <label for="id_custom_error_message">Custom Error Message</label>
                                <input type="text" name="custom_error_message" id="id_custom_error_message" class="form-control form-properties" placeholder="Enter Custom Error Message">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-offset-2 col-sm-8">
                                <button class="btn btn-primary pull-right" id="id_done">ADD MORE FIELDS</button>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-sm-offset-2 col-sm-8 text-center">
                                <button class="btn btn-success" id="id_submit">SUBMIT FORM</button>
                            </div>
                        </div>
                    </form>
                </div>
            </iv>
        </div>
    </body>
    <script>
        $(document).ready(function(){
            //Defaults
            var $choices = 0;
            var $options = 0;
            $('.validation-group').hide();
            $('#intermediate_form').hide();
            $('.multi-choice').hide();
            $('.single_choice').hide();

            $('#id_moreChoice').on('click', function ()
            {
                $choices=$choices+1;
                var optionField ='<li><input class="form-control choice-properties" type="text" name="'+$choices+'" id="'+$choices+'" placeholder="Choice"></li>';
                choiceArr.choice[choiceArr.choice.length]="";
                $('.choices').append(optionField);

            });

            
            $(".choice-properties").on("change",function()
            {
                for(var index=0;index<=$choices;index++)
                {
                    if($(this).attr('name')==index)
                    {
                        choiceArr.choice[index] = $(this).val();
                        alert($(this).attr('name'));
                    }
                }
                    console.log(choiceArr);
            });

            $(".option-properties").on("change",function()
            {
                for(var index=0;index<=$options;index++)
                {
                    console.log(optionArr);
                    if($(this).attr('name')==index)
                    {
                        optionArr.option[$(this).attr('name')] = $(this).val();
                        alert($(this).attr('name'));
                    }
                }
                    console.log(optionArr);
                
            });

            $('#id_moreOption').on('click', function ()
            {
                $options=$options+1;
                var optionField ='<li><input class="form-control option-properties" type="text" name="'+$options+'" id="'+$options+'" placeholder="Option"></li>';
                optionArr.option[optionArr.option.length]="";
                $('.options').append(optionField);

            });

            $("#id_validation").on('change',function(){
                var flag = $(this).val();
                if(flag=="true")
                {
                    $('.validation-group').show();
                }
                else
                {
                    $('.validation-group').hide();
                }
            });

            $("#id_answer_type").on('change',function(){
                var type = $(this).val();
                $('.short_answer').hide();
                $('.multi-choice').hide();
                $('.single_choice').hide();
                
                switch (type) {
                    case 'text':{
                        $('.short_answer').show();
                        break;
                    }
                    case 'radio':{
                        if(choiceArr.choice.length==0)
                        {
                            for(var index = 1;index<=$choices;index++)
                            {
                                choiceArr.choice[index]="";
                            }
                        }
                        console.log(choiceArr);
                        $('.single_choice').show();
                        break;
                    }
                    case 'checkbox':{
                        $('.multi-choice').show();
                        break;
                    }
                }

            });

            function generateForm(formData)
            {


                var $formName='';
                var $formdesc='';

                var $fieldName ='Field Name';
                var $fieldValue='Field Value';
                var $placeholder='PlaceHolder'
                var $field='';


                
                var paraField='<div class="row"><div class="col-sm-offset-2 col-sm-8 form-group"><label for="id_form_description">'+$fieldName+'</label><textarea rows="3" class="form-control form-properties" id="id_form_description" name="form_description"></textarea></div></div>';
            
                
               
                $.each(form.attributes, function(key,value)
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
                                
                                $('.form_title').hide();
                                $('#intermediate_form').append($field);
                                $('#intermediate_form').show();
                            
                            });
                        }
                    
                    });
                    return false;

                });     
                

            }

            
            // JSON Object Creation
            // Need to chnage code to refer json files
            var $formObj =JSON.parse('{"eventId" : "","title": "","description": "","attributes": []}');

            var $attributeObj=JSON.parse('{"question": "","name": "","id": "","type":{}}');

            var $shortAnswerObj = JSON.parse('{"shortAnswer": {"validation": "","description": "","required": "","validation_type": "", "minlength": "","maxlength": "","custom_error_message": ""}}');

            var $optionObj= JSON.parse('{"option":[]}');

            var $choiceObj = JSON.parse('{"choice":[]}');

            form=$formObj;
            
            var question_id = Math.floor(Math.random()*1000+4);
            
            form=$formObj;
            attribute=$attributeObj;
            shortAnswerObj = $shortAnswerObj;
            shortAnswer=shortAnswerObj.shortAnswer;

            optionArr=$optionObj;
            choiceArr=$choiceObj;


            $(".form-properties").on("change",function(){

                switch($(this).attr('name'))
                {
                    case 'question':{
                        attribute.question = $(this).val();
                        attribute.name = "question"+question_id;
                        attribute.id = "id_question"+question_id;
                        break;
                    }
                    case 'validation':{
                        shortAnswer.validation = $(this).val();
                        break;
                    }
                    case 'required':{
                        shortAnswer.required  = $(this).val();
                        break;
                    }
                    case 'validation_type':{
                        shortAnswer.validation_type = $(this).val(); 
                        break;
                    }
                    case 'minlength':{
                        shortAnswer.minlength = $(this).val(); 
                        break;
                    }
                    case 'maxlength':{
                        shortAnswer.maxlength = $(this).val(); 
                        break;
                    }
                    case 'description':{
                        shortAnswer.description = $(this).val(); 
                        break;
                    }
                    case 'custom_error_message':{
                        shortAnswer.custom_error_message = $(this).val(); 
                        break;
                    }
                }
            
    
            });

            $("#id_done").on('click',function(){

            
                switch ($("#id_answer_type").val()) {
                    case 'text':{
                        shortAnswerObj.shortAnswer=shortAnswer;
                        attribute.type=shortAnswerObj;
                        shortAnswerObj=$shortAnswerObj;
                        break;
                    }
                    case 'radio':{
                        attribute.type=choiceArr;
                        break;
                    }
                    case 'checkbox':{
                        attribute.type=optionArr;
                        break;
                    }
                }

               
                form.attributes.push(attribute); 
                form.eventId=$("#id_event_id").val();
                form.title = $("#id_form_title").val();
                form.description = $("#id_form_description").val();
                 

                generateForm(form);
                $(".form-properties").val("");
                shortAnswer=shortAnswerObj.shortAnswer;
            });

            $("#id_submit").on('click',function(){

                var jsonStr = JSON.stringify(form);

                $.ajax({
                    method:"POST",
                    url:"{{route('saveform')}}",
                    data:{
                        '_token':'{{csrf_token()}}',
                        'Obj':jsonStr
                    },
                    success:function(data){
                        alert(data);
                    },
                    error:function(){
                        alert('not good');
                    }
                });


            });    

            function getFormData(){

                $.ajax({
                    method:"GET",
                    url:"{{route('getFormDetails')}}",
                    data:{
                        '_token':'{{csrf_token()}}'
                    },
                    success:function(data){
                        generateForm(data);
                    },
                    error:function(){
                        alert('not good');
                    }
                });


            }



            $("#create_form").on('submit',function(e){
                e.preventDefault();
            });

        });
    </script>
</html>