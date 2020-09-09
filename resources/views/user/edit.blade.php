@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create user') }}</div>

                <div class="card-body">
                  <form class="" action="{{route('user.update',$user['id'])}}" method="post">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" name="name" value="{{$user['name']}}" required>
                    </div>
                    <div class="form-group">
                      <label for="email">E-mail</label>
                      <input type="email" class="form-control" id="email" name="email" value="{{$user['email']}}" required>
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    @if ($errors->any())
                      <div class="form-group">
                        <div class="alert alert-danger" role="alert">
                          <ul>
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                        </div>
                      </div>
                    @endif
                    <input class="btn btn-primary" type="submit" value="{{__('Send')}}">
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
