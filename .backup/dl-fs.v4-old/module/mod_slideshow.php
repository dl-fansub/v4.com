<script>
$(function(){	
	var _PanelSlide = $('panel#slide');
	// Navigator BackNext SlideShow
	$('navigator#back').animate({opacity:0,left:(910/2)-48-200,top:(_PanelSlide.height()/2)-($('navigator#back').height()/2)-15,},0).fadeOut(0);
	$('navigator#next').animate({opacity:0,left:(910/2)-48+200,top:(_PanelSlide.height()/2)-($('navigator#next').height()/2)-15,},0).fadeOut(0);
	_PanelSlide.rightClick(function(e) {
		// Do something
	});
	
	$.ajax("require.php?@mod_SliderImages", {
		dataType: 'html',
		success: function(data) {
			_PanelSlide.empty().append(data);
			_PanelSlide.data({
				pause: false,
				press: false,
				wait: <?php echo $config['wait']; ?>, 	 // Wait Delay Show Navigator
				next: <?php echo $config['next']; ?>,	  // Delay Next Image
				delay: <?php echo $config['delay']; ?>,	// Wait Pre Next Image
				space: 30,
				width: 512,
				height: 288,
				position: [-3,-2,-1,0,1,2,3],
				scale: [6,4,2,1,2,4,6],
				left: [4,3,2,0,-2,-3,-4],
				fade: [0,0.6,0.8,1,0.8,0.6,0]
			});

			$('slide.slide-block').each(function(index, element) {
				var _id_ = parseInt($(element).attr('list'));
				var _ImageWidth_ = _PanelSlide.data('width')/2;
				var _ImageHeight_ = _PanelSlide.data('height')/2;
				positionSlide = (_PanelSlide.width()/2)-(((_ImageWidth_*7)+180)/2);
				$('#image-'+_id_).width(_ImageWidth_).height(_ImageHeight_);
				$(element).width(_ImageWidth_).height(_ImageHeight_);
				$(element).css('left', parseInt(positionSlide + ((_ImageWidth_)+_PanelSlide.data('space'))*_id_));
				$(element).animate({ top: $(element).height()/2, opacity: _PanelSlide.data('fade')[_id_] },0);
			});
			
			_PanelSlide.append(function() { PositionImageChanged(_PanelSlide.data('wait'), 0); });
			// Event SlideShow
			$(document).keydown(function(e){ if(!jQuery.fn.GobalConfig.Dialog) _PanelSlide.data('press', false); });
			$(document).keyup(function(e){ if(!jQuery.fn.GobalConfig.Dialog && !_PanelSlide.data('press')){ NavigatorArrow(e); _PanelSlide.data('press', true); }});
			$(window).resize(function(){ PositionImageChanged(0, 1); });
			_PanelSlide.mouseover(function() { _PanelSlide.data('pause', true); });
			_PanelSlide.mouseout(function() { _PanelSlide.data('pause', false); });
			$('navigator#back, navigator#next').mouseover(function() { _PanelSlide.data('pause', true); });	
			$('navigator#back').click(function(){ _PanelSlide.data('pause', true); NavigatorArrow({keyCode:37}); });			
			$('navigator#next').click(function(){ _PanelSlide.data('pause', true); NavigatorArrow({keyCode:39}); });
			// Slide In Time
			jQuery.fn.GobalConfig.Interval.data({ "mod_slideshow": {
					wait: 5,
					time: _PanelSlide.data('delay'),
					code: function(){ if(!_PanelSlide.data('pause')) NavigatorArrow({keyCode:39}); }
				}
			});

			function PositionImageChanged(delay, state) {
				var _WaitAnimate = delay;
				if(state==2) _WaitAnimate = 0;
				if(state==0) { $('navigator#back').fadeIn(0).delay(delay); $('navigator#next').fadeIn(0).delay(delay); } 
				//_PanelSlide.width();
				$('navigator#back').animate({ opacity: 1, left: (910/2)-272 }, _WaitAnimate);
				$('navigator#next').animate({ opacity: 1, left: (910/2)+272 }, _WaitAnimate);
				$('slide.slide-block').each(function(index, element){
					var _id_ = parseInt($(element).attr('list'));
					var _ScaleWidth_ = parseInt(_PanelSlide.data('width')/_PanelSlide.data('scale')[_id_]);
					var _ScaleHeight_ = parseInt(_PanelSlide.data('height')/_PanelSlide.data('scale')[_id_]);
					$('#block-'+_id_).delay(_WaitAnimate).animate({
						opacity: _PanelSlide.data('fade')[_id_],
						left: parseInt(((_PanelSlide.width()/2)-(225*_PanelSlide.data('left')[_id_]))-(_ScaleWidth_/2)),
						top: (-(_PanelSlide.data('height')/2)/_PanelSlide.data('scale')[_id_])+(_PanelSlide.data('height')/2),
						width: _ScaleWidth_,
						height: _ScaleHeight_
					}, delay);				
					$('#image-'+_id_).delay(_WaitAnimate).animate({
						width: _ScaleWidth_,
						height: _ScaleHeight_
					}, delay);				
				});
			}

			function NavigatorArrow(e){
				switch (e.keyCode) {
				case 37: // Navigator Left Image.
					_PanelSlide.data('position').push(_PanelSlide.data('position').shift());				
					_PanelSlide.data('scale').push(_PanelSlide.data('scale').shift());
					_PanelSlide.data('left').push(_PanelSlide.data('left').shift());
					_PanelSlide.data('fade').push(_PanelSlide.data('fade').shift());
					PositionImageChanged(_PanelSlide.data('next'),2);
					break;
				case 39: // Navigator Right Image.
					_PanelSlide.data('position').unshift(_PanelSlide.data('position').pop());
					_PanelSlide.data('scale').unshift(_PanelSlide.data('scale').pop());
					_PanelSlide.data('left').unshift(_PanelSlide.data('left').pop());
					_PanelSlide.data('fade').unshift(_PanelSlide.data('fade').pop());
					PositionImageChanged(_PanelSlide.data('next'),2);
					break;
				}
			}
			$.fn.SlideMouseOut = function() { $(this).css({backgroundImage:'none',backgroundColor:'transparent',opacity:1}); }
			$.fn.SlideMouseHover = function(id,url) {
				if(_PanelSlide.data('position')[id]==0) {
					if(url) $(this).css('background-image','url(\'images/slide/hover.png\')'); else $(this).css({backgroundColor:'#000',opacity:0.1});
				}
			}
			$.fn.SlideMouseClick = function(id,url) { 
				var loop = _PanelSlide.data('position')[id];
				if(_PanelSlide.data('position')[id]<0) {
					loop = _PanelSlide.data('position')[id]*-1;
					for(var n=0;n<loop;n++) NavigatorArrow({keyCode:37});
				} else if(_PanelSlide.data('position')[id]>0) {
					for(var n=0;n<loop;n++) NavigatorArrow({keyCode:39});
				} else {
					if(url) window.open(url, '_blank');
				}
			}			
		},
	});
});
</script>
<div style="height:330px;"><navigator id="back"></navigator><navigator id="next"></navigator><panel id="slide" align="center">
<div style="width:400px; height:220px; display:inline-table; margin:40px; padding-top:25px; ">
<img src="images/ajax_loading.gif" border="0" /></div></panel></div>
