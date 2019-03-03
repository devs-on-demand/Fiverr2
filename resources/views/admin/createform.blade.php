@extends('layouts.master')

@section('css')
@parent
        <link rel="stylesheet" href="/css/sweetalert.min.css">
        <!-- jQuery library -->
        <script src="/js/jquery.min.js"></script>
        <script src="/js/sweetalert.min.js"></script>
@endsection

@section('main')
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
                                <label for="id_form_title">Form</label>
                                <span id="intermediate_form">
                                </span>
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
                                        <li><input class="form-control choice-properties" type="text" name="choices" id="id_choice0" placeholder="Choice"></li>
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
                                            <li><input class="form-control option-properties" type="text" name="0" id="id_option0" placeholder="Option"></li>
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
            </div>
        
@endsection

@section('js')
@parent
    <!-- Form Creation JavaScript - /public/js/SubscriptionFormJS/main.js-->
    <script src="/js/SubscriptionFormJS/main.js"></script>
@endsection

@section('scripts')
    <script>
            $("#id_submit").on('click',function(){
                
                var jsonStr = JSON.stringify(form);

                $.ajax({
                    method:"POST",
                    url:"{{route('saveform')}}",
                    data:{
                        '_token':'{{csrf_token()}}',
                        'Obj':jsonStr,
                        'event_id': $("#id_event_id").val(),
                    },
                    success:function(data){
                        alert(data);
                    },
                    error:function(){
                        alert('not good');
                    }
                });
            });  
    </script>
@endsection