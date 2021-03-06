@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create section') }}</div>

                <div class="card-body">
                  <form class="" action="{{route('section.update',$section['id'])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" name="name" value="{{$section['name']}}" required>
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                      <input type="text" class="form-control" id="email" name="description" value="{{$section['description']}}" required>
                    </div>
                    <div class="form-group">
                      <label>Logo</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="logo" name="logo">
                        <label class="custom-file-label" for="logo">Choose file</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <h3>Users</h3>
                      @foreach ($users as $key => $value)
                        <span>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{$value['id']}}" id="attachedUsersCheck{{$value['id']}}" name="users[]" {{( in_array($value['id'], $attached_users) ? 'checked' : '')}}>
                            <label class="form-check-label" for="attachedUsersCheck{{$value['id']}}">
                              {{$value['name']}} (<a href="{{route('user.edit',$value['id'])}}">{{$value['email']}}</a>)
                            </label>
                          </div>
                        </span>
                      @endforeach
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
