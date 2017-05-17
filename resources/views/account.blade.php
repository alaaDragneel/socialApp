@extends('layout.master')

@section('title')
	Account
@endsection

@section('content')
	@include('includes.message-block')
	<section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Your Account</h3></header>
            <form action="{{ route('account.save') }}" method="post">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" class="form-control" value="{{ $user->firstName }}" id="first_name">
                </div>
                <button type="submit" class="btn btn-primary" id="accountSave">Save Account</button>
			 {{csrf_field()}}
            </form>
        </div>
    </section>
    <script>
	    var token = '{{ Session::token() }}';
	    var urlAccount = '{{ route('account.save') }}';
    </script>
@endsection
