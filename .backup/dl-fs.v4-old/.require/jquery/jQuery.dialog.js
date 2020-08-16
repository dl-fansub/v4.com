// JavaScript Dialog
$(function(){
	$.fn.Dialog = function(toggle, filename) {
		if(typeof(toggle)=="string") {
			var _Dialog = $(this);
			var _DialogFrom = $('dialog#box');
			var _FadeSpeed = _Dialog.data('Fade');
			var _ShowSpeed = _Dialog.data('Speed');
			
			if(toggle=="closed" || toggle=="opened") { _FadeSpeed = 0; _ShowSpeed = 0; }
			if(toggle=="open" || toggle=="opened") {
				// Main Changed
				$.fn.GobalConfig.Dialog = true;
				$(document.body).css('overflow-y','hidden');
				$('#dl_background').css('padding-right','17px');
				$('#dl_background').height($(window).height());
				$('preload#dialog').fadeIn(0);
				
				// Dialog Show
				$('dialog#control').fadeIn(0);
				$('dialog#background').css({ opacity:0.8 }).fadeIn(_FadeSpeed, function(){
					$.ajax({url:"require.php?@"+filename,
						dataType: "HTML",
						error: function(){ console.log("Error:: "+filename+".php->mod_user.php"); },
						success: function(data){
							$('preload#dialog').fadeOut(0);
							$('dialog#content').html(data);
							_DialogFrom.fadeIn(0);
							_DialogFrom.width(800).ScreenCenter();
							_DialogFrom.css({ top: -_DialogFrom.height(), opacity:0 }).fadeIn(0);
							_DialogFrom.animate({ opacity: 1, top: -1 }, _ShowSpeed);
						}				
					});
				});
			
			} else if(toggle=="close" || toggle=="closed") {
				$.fn.HashClear();
				_DialogFrom.animate({
					opacity: 0,
					top: -_DialogFrom.height()
				}, _ShowSpeed).fadeOut(0, function(){
					$('dialog#background').fadeOut(_FadeSpeed);	
					$('dialog#control').fadeOut(0);
					_DialogFrom.fadeOut(0);
					// Site Config					
					$.fn.GobalConfig.Dialog = false;
					$(document.body).css('overflow-y','scroll');
					$('#dl_background').css('padding-right','0px');					
					$('#dl_background').height('100%');
					$('dialog#content').html("");
				});
			}
			
		}		
		return $(this);
	}		
		
	$.fn.DialogConfig = function(settings) {
		var _Dialog = $(this);
		var _DialogFrom = $('dialog#box');
		_Dialog.data({
			Closing: true,
			Closed: true,
			Width: 500,
			Speed: 100,
			Fade: 250
		});
		$.extend(_Dialog.data(), settings);	
		
		$(window).resize(function() {
			_DialogFrom.width(_DialogFrom.data('Width')).ScreenCenter();
		});		
		_DialogFrom.click(function(e) { _Dialog.data('Closed',false); });
		$('dialog#control').click(function() {
			if(_Dialog.data('Closed') && _Dialog.data('Closing')) _Dialog.Dialog('close'); else _Dialog.data('Closed',true);
		});
		$(window).bind('beforeunload', function() {
			if (!_Dialog.data('Closing') && typeof(_Dialog.data('Closing'))!="undefined") {
				return "";
			}
		}); 
	}
});
