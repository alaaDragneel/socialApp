@extends('layout.master')

@section('title')
     Welcome!
@endsection

@section('content')
     @include('includes.message-block')
     <div class="row">
          <div class="col-md-6 signUp">
               <h1>Sign Up</h1>
               <form action="{{ route('signup') }}" method="post">
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                         <label for="email">E-mail</label>
                         <input type="email" name="email" class="form-control" id="email" placeholder="Write Your Email Here Please!" value="{{ Request::old('email') }}">
                    </div>
                    <div class="form-group {{ $errors->has('firstName') ? 'has-error' : '' }}">
                         <label for="firstName">First Name</label>
                         <input type="text" name="firstName" class="form-control" id="firstName" placeholder="Write Your first name Here Please!" value="{{ Request::old('firstName') }}">
                    </div>
                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                         <label for="password">password</label>
                         <input type="password" name="password" class="form-control" id="password" placeholder="Write Your password Here Please!" value="{{ Request::old('password') }}">
                    </div>
                    <button type="submit" class="btn btn-success" >Sign Up</button>
                    {{ csrf_field() }}
               </form>
          </div>
          <div class="col-md-6 signIn">
               <form action="{{ route('signin') }}" method="post">
                    <h1 >Sign In</h1>
                    <div class="form-group  {{ $errors->has('email') ? 'has-error' : '' }}">
                         <label for="email">E-mail</label>
                         <input type="email" name="email" class="form-control" id="email" placeholder="Write Your Email Here Please!" value="{{ Request::old('email') }}">
                    </div>
                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }} ">
                         <label for="password">password</label>
                         <input type="password" name="password" class="form-control" id="password" placeholder="Write Your password Here Please!" value="{{ Request::old('password') }}">
                    </div>
                    <button type="submit" class="btn btn-primary" >Sign In</button>
                    {{ csrf_field() }}
               </form>
          </div>
     </div>
@endsection
