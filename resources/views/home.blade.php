@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <br/>
                    @if($isSubscribed)
                        <div class="row">
                            Plan name : {{$planDetails->name}}
                        </div>
                        <div class="row">
                            CC Number : **** **** ***{{$ccLastFour}}
                        </div>

                        <div class="row">
                            <a href="{{ route('cancel_subscription') }}" class="btn btn-primary pull-right">Cancel Subscription</a>
                        </div>

                    @else
                        {{ __('You are logged in!') }}
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
