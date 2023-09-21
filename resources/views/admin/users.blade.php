@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Users') }}</div>

                <div class="card-body">
                    
                    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">email</th>      
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
       @unless($user->can('super_admin')) 
            <tr>
              <th scope="row">{{$user->id}}</th>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>   

              <td>
                @php
                        $planName = App\Models\Subscription::where('user_id',$user->id)->first();        
                        if($planName){
                                $subscription = $user->subscription($planName->name);                
                        }
                @endphp
                @if($user->pm_last_four)
                    <a href="{{ route('admin.cancel',$user->id) }}" class="btn btn-primary pull-right">{{ __('Cancel Subscription') }}</a>
                @endif
             </td>
            </tr>    
         @endunless
    @endforeach
  </tbody>
</table>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
