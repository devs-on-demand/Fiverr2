<html>
    <head>
        <title>This is Test</title>
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="/js/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container" id="main-container">
            <div class="row">
                <div class="col-sm-12">
                    <h3>Click to Add a field</h3>
                    <small>Note : Please don't refresh the page before you submit, else you will lose the information entered</small><br><br>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add a Field</button>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Create a Field</h3>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="id_type">Select Input Type </label>
                                <select class="form-control" id="id_type" name="type"> 
                                    <option value="text">Text</option> 
                                    <option value="number">Number</option> 
                                    <option value="email">Email</option> 
                                    <option value="date">Date</option>
                                    <option value="date">Multiple Choice</option>
                                    <option value="date">Single Choice</option>
                                </select>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="id_inputname">Input Name</label>
                                <input class="form-control" type="text" name="inputname" id="id_inputname" placeholder="Enter Input Name">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-primary pull-right">ADD</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
    </body>
    <script>
        $(document).ready(function(){

        });
    </script>
</html>