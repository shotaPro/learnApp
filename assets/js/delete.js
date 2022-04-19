$(function () {

	$(document).on('click', '.delete-btn', function () {

		var post_id = $(this).data('post');

		$.post('https://outputap.herokuapp.com/core/ajax/deleteBtn.php',
			{

				showpopup: post_id

			}, function (data) {
				$('.popupPost').html(data);
				$('.close-post-popup,.cancel-it').click(function () {
					$('.post-popup').hide();
				});
			});
	});


	$(document).on('click', '.delete-it', function () {

		var $post_id = $(this).data('post');

		$.post('https://outputap.herokuapp.com/core/ajax/deleteBtn.php', {

			deletePost: $post_id

		}, function (data) {
			$('.modal').hide();
			location.reload(true);
		});
	});
})

https://outputap.herokuapp.com/home.php


