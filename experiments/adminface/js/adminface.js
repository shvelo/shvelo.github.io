if (location.hash == '#video' || location.hash == '#monitor' || location.hash == '#document' || location.hash == '#music' || location.hash == '#settings' || location.hash == '#camera') {
	hsh = location.hash.substr(1);
	$('[data-tab]').removeClass('active');
	$('[data-tab="' + hsh + '"]').addClass('active');
}

$(function() {
	$('.sidebar .add').on('click', function() {
		$(this).toggleClass('active');
		$('.sidebar-expand').toggleClass('expand');
	});

	$('.wrapper').on('click', function() {
		$('.sidebar .add').removeClass('active');
		$('.sidebar-expand').removeClass('expand');
	});

	$('.sidebar a[data-tab]').on('click', function() {
		$('.sidebar .add').removeClass('active');
		$('.sidebar-expand').removeClass('expand');
		$('.sidebar a[data-tab]').removeClass('active');
		$(this).addClass('active');
		$('.wrapper li.tab').removeClass('active');
		$('.wrapper li.tab[data-tab="' + $(this).data('tab') + '"]').addClass('active');
	});

	$('.item.vid').each(function() {
		var id = $(this).data('video');
		$(this).append('<div class=c>');
		$(this).find('.c').html('<iframe src="http://player.vimeo.com/video/' + id + '" width="500" height="280" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>');
		var _this = this;
		$.ajax('http://vimeo.com/api/v2/video/' + id + '.json', {
			dataType : 'jsonp',
			success : function(data) {
				var thumb = data[0].thumbnail_small;
				$(_this).data('thumb', thumb);
				$(_this).find('.icon').css('background-image', 'url("' + thumb + '")');
			}
		});
	});

	$('.item.doc').each(function() {
		var doc = $(this).data('doc');
		$(this).append('<div class=c><header></header><article></article></div>');
		$(this).find('.c').html();
		var _this = this;
		$.ajax(doc, {
			dataType : 'json',
			success : function(data) {
				$(_this).find('.c header').html(data.title);
				$(_this).find('.c article').html(data.body);
				$(_this).find('.icon').css('background-image', 'none').text(data.body.substr(0, 100));
			}
		});
	});

	$('.item.cam').each(function() {
		var thumb = $(this).data('picture');
		$(this).find('.icon').css('background-image', 'url("' + thumb + '")');
		$(this).append('<div class=c>');
		$(this).find('.c').html('<img src="' + thumb + '" style="width: 100%; height: 100%">');
	});

	$('.overlay').on('click', function() {
		$(this).fadeOut('fast');
		$('.preview').fadeOut('fast', function() {
			$(this).empty();
		}).removeClass("cam vid doc");
	});

	$('.item .icon').on('click', function() {
		var item = $(this).parent();
		preview(item);
	});
	
	$('.item .pre').on('click', function() {
		var item = $(this).parent().parent();
		preview(item);
	});
	
	$('.item.set').on('click', function() {
		$(this).toggleClass('off');
	});
});

function preview(item) {
	cls = false;
	if(item.hasClass('cam'))
		cls = 'cam';
	else if(item.hasClass('vid'))
		cls = 'vid';
	else if(item.hasClass('doc'))
		cls = 'doc';
	
	if(!cls) return;
	
	$('.overlay').fadeIn('fast');		
	$('.preview').fadeIn('fast').addClass(cls).html(item.find('.c').html());
}
