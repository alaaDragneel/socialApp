@extends('layout.master')

@section('title')
	Dashboard
@endsection

@section('content')
	@include('includes.message-block')
	<section class="row new-post">
		<div class="col-md-6 col-md-offset-3">
			<header><h3>What do You have to Say?</h3></header>
			<form action="{{ route('postCreate') }}" method="post">
				<div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
				  	<label for="new-post">Write New Post</label>
				  	<textarea name="body" class="form-control" id="new-post" rows="5" placeholder="Wirte Your Fucking post here"></textarea>
				</div>
				<button type="submit" class="btn btn-info">Post</button>
				{{ csrf_field() }}
			</form>
		</div>
	</section>
	<section class="row posts">
		<div class="col-md-12 col-md-offset-3">
			<header><h3>What other Poeple say...</h3></header>
			@foreach($posts as $post)
				<article class="post" data-postid = {{ $post->id }}>
					<p>{{ $post->body }}</p>
					<div class="info">
						Posted by {{ $post->user->firstName }} on {{ $post->created_at }}
					</div>
					<div class="interaction">
						<a href="#" class="like">{{ Auth::user()->likes()->where('post_id',$post->id)->first() ? Auth::user()->likes()->where('post_id',$post->id)->first()->like == 1 ? 'You Like This Post' : 'Like' : 'Like' }}</a> |
						<a href="#" class="like">{{ Auth::user()->likes()->where('post_id',$post->id)->first() ? Auth::user()->likes()->where('post_id',$post->id)->first()->like == 0 ? 'You don\'t Like This Post' : 'DisLike' : 'DisLike' }}</a>

						@if (Auth::user() == $post->user)
							|<a href="#" class="editPost">Edit</a> |
							<a href="{{ route('post.delete', ['post_id' => $post->id]) }}">Delete</a>
						@endif
					</div>
				</article>
			@endforeach
	</section>

	<div class="modal fade" tabindex="-1" role="dialog" id="edit-model">
	  	<div class="modal-dialog" role="document">
	    		<div class="modal-content">
	      		<div class="modal-header">
	        			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        			<h4 class="modal-title">Edit Post</h4>
	      		</div>
			     <div class="modal-body">
			        	<form>
						<div class="form-group">
							<label for="edit-post">edit Post</label>
						  	<textarea name="post_body" class="form-control" id="edit-post" rows="5" placeholder="Wirte Your Fucking edit post here"></textarea>
						</div>
			        	</form>
			     </div>
			     <div class="modal-footer">
			        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        	<button type="button" class="btn btn-primary" id="model-save">Save changes</button>
			     </div>
	    		</div><!-- /.modal-content -->
	  	</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<script>
		var token = '{{ Session::token() }}';
		var url = '{{ route('edit') }}';
		var urlLike = '{{ route('like') }}';
	</script>
@endsection
