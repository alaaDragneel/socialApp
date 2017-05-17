$(document).ready(function() {
	var postid = 0;
	var postBodyEdited = null;
	$('.post').find('.interaction').find('.editPost').on('click', function (e) {
		e.preventDefault();
		postBodyEdited = e.target.parentNode.parentNode.childNodes[1];
		var postBody = postBodyEdited.textContent;
		postid = e.target.parentNode.parentNode.dataset['postid'];
		//$(this).parent().parent().children('p').text();
		$('#edit-post').val(postBody);
		$('#edit-model').modal();
	});

	$('#model-save').on('click', function(){
		$.ajax({
			method: 'POST',
			url: url,
			data: { body:$('#edit-post').val(), post_id: postid, _token: token},
		})
		.done(function(msg) {
			$(postBodyEdited).text(msg['new_body']);
			$('#edit-model').modal('hide');
		});
	});

	$('.like').on('click', function(e){
		e.preventDefault();
		postid = e.target.parentNode.parentNode.dataset['postid'];
		var isLike = e.target.previousElementSibling == null;
		$.ajax({
			method: 'POST',
			url: urlLike,
			data: {isLike: isLike, postId: postid, _token: token}
		})
		 	.done(function() {
				e.target.innerText = isLike ? e.target.innerText == 'Like' ? 'You Like This Post' : 'Like' : e.target.innerText == 'DisLike' ? 'You Don\'t Like This Post' : 'DisLike';
				if(isLike){
					e.target.nextElementSibling.innerText = 'DisLike';
				} else {
					e.target.previousElementSibling.innerText = 'Like';
				}
			});
	});
});
