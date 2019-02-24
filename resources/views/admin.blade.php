@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ADMIN Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @component('components.who')
                    @endcomponent
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="{{route('subscriptionbeta')}}">Subscription Form</a><br>
                                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
