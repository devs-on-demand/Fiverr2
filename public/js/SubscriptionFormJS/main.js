$(document).ready(function(){
    //Defaults
    var $choices = 0;
    var $options = 0;
    var choices_array = [];
    var choice_id = "id_choice";
    $('.validation-group').hide();
    $('#intermediate_form').hide();
    $('.multi-choice').hide();
    $('.single_choice').hide();

    function pushChoices( choice_array, choice_number)
    {
        var final_choice = "";
        var actual_choice_number = choice_number-1;
        final_choice = choice_id+""+actual_choice_number;
        choice_array.push($("#"+final_choice).val());
    }

    $('#id_moreChoice').on('click', function ()
    {
        $choices=$choices+1;
        pushChoices(choices_array,$choices);
        final_choice_id=choice_id+""+$choices;
        var optionField ='<li><input class="form-control choice-properties" type="text" name="'+$choices+'" id="'+final_choice_id+'" placeholder="Choice"></li>';
        choiceArr.choice[choiceArr.choice.length]="";
        $('.choices').append(optionField);
        console.log(choices_array);
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

        //Need to reset the previous fields in span here
        
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


    // Below function will prevent the form from submitting
    $("#create_form").on('submit',function(e){
        e.preventDefault();
    });

});