@extends('layouts.test')

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	@section('main-content')
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
		</form>
	</div>
	@endsection
</body>
@section('scripts')
<script type="text/javascript">
	
</script>
@endsection
</html>