@extends('layouts.admin')
@section('title', 'Add a new user')

@section('content')
<div class="container">
    <div class="row">
            <div class="card col-xl-6 col-lg-12">
                @if(Session::has('success'))
                {{ Session::get('success') }}
                @endif
                <div class="card-header">
                    <strong>Add a new user</strong>
                </div>
                
                <form class="card-body card-block row" method="post" action="/admin/users" enctype="multipart/form-data" >
                    @csrf 
                    {{-- Name --}}
                    <div class="form-group col-md-6">
                        <label for="name" class=" form-control-label">Name</label>
                        @if ($errors->has('name'))
                        <span class="d-block invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                        <input type="text" id="name" placeholder="{{ $user->name }}" name="name" class="form-control">
                    </div>
                    {{-- ./Name --}}

                    {{-- Email --}}
                    <div class="form-group col-md-6">
                        <label for="email" class=" form-control-label">Email</label>
                        @if ($errors->has('email'))
                        <span class="d-block invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                        <input type="text" id="email" placeholder="{{ $user->email }}" name="email" class="form-control">
                    </div>
                    {{-- ./Email --}}


                    {{-- Pass --}}
                    <div class="form-group col-md-6">
                        <label for="password" class=" form-control-label">Password</label>
                        @if ($errors->has('password'))
                        <span class="d-block invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                        <input type="password" id="password" placeholder="{{ {{ $user->password }} }}" name="password" class="form-control">
                    </div>
                    {{-- ./Pass --}}

                    {{-- Pass2 --}}
                    <div class="form-group col-md-6">
                        <label for="password2" class=" form-control-label">Confirm Password</label>
                        @if ($errors->has('password_confirmation'))
                        <span class="d-block invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                        @endif
                        <input type="password" id="password2" placeholder="{{ $user->password }}" name="password_confirmation" class="form-control">
                    </div>
                    {{-- ./Pass2 --}}

                    {{-- File --}}
                    <div class="form-group col-md-6">
                        <label for="avatar" class=" form-control-label">User Avatar</label>
                        @if ($errors->has('avatar'))
                        <span class="d-block invalid-feedback" role="alert">
                            <strong>{{ $errors->first('avatar') }}</strong>
                        </span>
                        @endif
                        <img src="{{ $user->image->path }}" alt="{{ $user->name }}'s avatar">
                        <input type="file" name="avatar">
                    </div>
                    {{-- ./File --}}

                    <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Update">
                    </div>
                    
                </form>
            </div>
            {{-- ./card --}}
        </div>
        {{-- ./row --}}
    </div>
    {{-- ./container --}}
    

@endsection