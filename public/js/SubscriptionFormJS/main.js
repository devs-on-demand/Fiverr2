$(document).ready(function(){
    //Defaults
    var $choices = 0;
    var $options = 0;
    var choice_id = "id_choice";
    var option_id= "id_option";
    $('.validation-group').hide();
    $('#intermediate_form').hide();
    $('.multi-choice').hide();
    $('.single_choice').hide();

    var temp='{\"eventId\":\"1\",\"title\":\"\",\"description\":\"\",\"attributes\":[{\"question\":\"Favorite Color\",\"name\":\"question30\",\"id\":\"id_question30\",\"type\":{\"option\":[\"Orange\",\"Red\",\"Blue\"]}},{\"question\":\"Favorite Color\",\"name\":\"question30\",\"id\":\"id_question30\",\"type\":{\"option\":[\"Orange\",\"Red\",\"Blue\"]}},{\"question\":\"Favorite Color\",\"name\":\"question30\",\"id\":\"id_question30\",\"type\":{\"option\":[\"Orange\",\"Red\",\"Blue\"]}}]}';

    $format=JSON.parse(temp);

    console.log($format);

    function pushChoices( choice_array ,choice_number)
    {
        choice_array.push($("#"+choice_id+""+choice_number).val());
        console.log(choiceArr.choice);
    }

    function pushOptions( option_array ,option_number)
    {
        option_array.push($("#"+option_id+""+option_number).val());
        console.log(optionArr.option);
    }

    $('#id_moreChoice').on('click', function ()
    {
        pushChoices(choiceArr.choice,$choices);
        $choices=$choices+1;
        var optionField ='<li class="alternate"><input class="form-control choiceProperties" type="text" name="'+$choices+'" id="'+choice_id+$choices+'" placeholder="Choice"></li>';
        $('.choices').append(optionField);
    });
    

    $('#id_moreOption').on('click', function ()
    {
        pushOptions(optionArr.option,$options);
        $options=$options+1;
        var optionField ='<li class="alternate"><input class="form-control option-properties" type="text" name="'+$options+'" id="'+option_id+$options+'" placeholder="Option"></li>';
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


        //Need to reset the previous fields in span here
        
        switch (type) {
            case 'text':{
                $('.short_answer').show();
                break;
            }
            case 'radio':{
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

        $('#intermediate_form').empty();

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
                                $field='<div class="row"><div class="col-sm-offset-2 col-sm-8 form-group"><label for="id_form_title">'+$fieldName+'</label><input type="text" class="form-control form-properties" name="form_title" id="id_form_title" placeholder="'+$placeholder+'"></div></div>';                                 
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

        });     
        

    }

    
    // JSON Object Creation
    // Need to chnage code to refer json files
    
    var $formObj =JSON.parse('{ "eventId" : "","title": "","description": "","attributes": []}');

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

    // Below function creates object for short answer
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
                break;
            }
            case 'radio':{
                pushChoices(choiceArr.choice,$choices);
                attribute.type=choiceArr;
                break;
            }
            case 'checkbox':{
                pushOptions(optionArr.option,$options);
                attribute.type=optionArr;
                break;
            }
        }

        //var tattributes = JSON.parse(""+form.attributes);
        pushAttribute(form.attributes,attribute);
        

        form.eventId=$("#id_event_id").val();
        form.title = $("#id_form_title").val();
        form.description = $("#id_form_description").val();

        var $formObj=JSON.stringify(form);
         

        generateForm(form);
       

        resetValues();
       

    });  

    function resetValues()
    {
        //Reseting values of entered field
        $(".form-properties").val("");
        $(".choice-properties").val("");
        $(".option-properties").val("");
        
        //Resetting the attribute
        shortAnswerObj=$shortAnswerObj;
        shortAnswer=shortAnswerObj.shortAnswer;
        optionArr=$optionObj;
        choiceArr=$choiceObj;
        attribute=$attributeObj;

        //Removing Elements

        $(".alternate").remove();

        //Hidding the UI
        $('.validation-group').hide();
        $('.short_answer').hide();
        $('.multi-choice').hide();
        $('.single_choice').hide();
    }

    function pushAttribute(array,value)
    {
        console.log(array);
        array.push(JSON.parse(JSON.stringify(value)));
        console.log(array);

    }


    // Below function will prevent the form from submitting
    $("#create_form").on('submit',function(e){
        e.preventDefault();
    });

});

