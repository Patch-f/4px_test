@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Main page') }}</div>

                <div class="card-body">
                  <ul>
                    <li><a href="{{route('login')}}">{{ __('Login') }}</a></li>
                    <li><a href="{{route('register')}}">{{ __('Register') }}</a></li>
                    <li><a href="{{route('user.index')}}">{{ __('Users') }}</a></li>
                    <li><a href="{{route('section.index')}}">{{ __('Sections') }}</a></li>
                  </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
