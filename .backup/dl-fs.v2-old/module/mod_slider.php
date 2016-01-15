<script>
$(function(){
	$.fn.setting = {
		position: [-3,-2,-1,0,1,2,3],
		divide: [6,4,2,1,2,4,6],
		left: [4,3,2,0,-2,-3,-4],
		opaci: [0,0.8,0.9,1,0.9,0.8,0],
	};
	$('#panel-slide').disableTextSelect();
	$.ajax({ url: 'index.php?ajax=image_slider',
		data: { width: <?php echo $config['width']; ?>, height: <?php echo $config['height']; ?> },
		success: function(data) {
			$('#panel-slide').empty();
			var positionSlide;
			var imgSpace = 30;
			var imgWidth = 0;
			var settings = $.fn.setting;
			var screenWidth = $(window).width()/2;
			
			// Navigator Slide
			$('#panel-slide').append('<div id="nav_back">&nbsp;</div><div id="nav_next">&nbsp;</div>');
			$('#nav_back').animate({
				opacity: 0,
				left: (screenWidth-28)-256,
				top: "+=105px",
			}, 0).hide();
			$('#nav_next').animate({
				opacity: 0,
				left: (screenWidth)+256,
				top: "+=105px",
			}, 0).hide();
			
			
			// Image Loading...
			for(var i=0;i<data.length;i++) {
				var imageWidth = data[i].width/2;
				var imageHeight = data[i].height/2;
				positionSlide = screenWidth - (((imageWidth*data.length)+180)/2);
				
				imgWidth += data[i].width/settings.divide[i];
				var slideImageHTML = '<div class="slider" id="slideimg_'+i+'" onmouseover="$(\'#over_'+i+'\').animate({ opacity: 0.2 },0).fadeIn(<?php echo $config['hover_img']; ?>);">';
				slideImageHTML += '<img id="sizeimg_'+i+'" src="'+data[i].src+'" width="'+imageWidth+'" height="'+imageHeight+'" border="0" />';
				slideImageHTML += '<div class="link_over" id="over_'+i+'" onmouseout="$(this).animate({ opacity: 0.2 },0).fadeOut(<?php echo $config['hover_img']; ?>);" ';		
				slideImageHTML += 'pos="'+settings.position[i]+'" onclick="$(this).clickSlide($(this).attr(\'pos\'),\''+data[i].url+'\')"></div>';
				slideImageHTML += '</div>';

				
				$('#panel-slide').append(slideImageHTML);
				$('#slideimg_'+i).css('left', parseInt(positionSlide + ((imageWidth)+imgSpace)*i));
				$('#slideimg_'+i).animate({ top: "+=50px", opacity: settings.opaci[i] },0);
				
			}	
			
			// Image Setting Position	
			for(var i=0;i<data.length;i++) {
				var imageWidth = data[i].width/settings.divide[i];
				var imageHeight = data[i].height/settings.divide[i];
				
				var topPosition = (-144/settings.divide[i])+144;				
				var leftPosition = parseInt((screenWidth-(225*settings.left[i]))-(imageWidth/2));

				$('#slideimg_'+i).delay(<?php echo $config['delay_time']; ?>).animate({
					opacity: settings.opaci[i],
					left: leftPosition,
					top: topPosition,
				}, 300);	
				$('#sizeimg_'+i).delay(<?php echo $config['delay_time']; ?>).animate({
					width: imageWidth,
					height: imageHeight,
				}, 300);
			}
			// Show Navigator
			$('#nav_back').show(0).delay(<?php echo ($config['delay_time']); ?>).animate({ opacity: 1, left: "-=20px" }, 500);
			$('#nav_next').show(0).delay(<?php echo ($config['delay_time']); ?>).animate({ opacity: 1, left: "+=20px" }, 500);
			
			// Events Browser Resize
			$(window).resize(function(){
				var screenWidth = $(window).width()/2;
				for(var i=0;i<data.length;i++) {
					var imageWidth = data[i].width/settings.divide[i];
					var imageHeight = data[i].height/settings.divide[i];					
					var leftPosition = parseInt((screenWidth-(225*settings.left[i]))-(imageWidth/2));	
					
					$('#nav_back').css('left', (screenWidth-28)-276);
					$('#nav_next').css('left', (screenWidth)+276);	
					$('#slideimg_'+i).css('left', leftPosition);
				}
			});
		
			/*setInterval(function(){
				settings.divide.unshift(settings.divide.pop());
				settings.left.unshift(settings.left.pop());
				settings.opaci.unshift(settings.opaci.pop());
				navSlide();
			},3000);*/
				
			// Navigator Back Slide
			$('#nav_back').click(function(){
				settings.divide.push(settings.divide.shift());
				settings.left.push(settings.left.shift());
				settings.opaci.push(settings.opaci.shift());
				settings.position.push(settings.position.shift());
				navSlide();
			});
			
			$('#nav_next').click(function(){
				settings.divide.unshift(settings.divide.pop());
				settings.left.unshift(settings.left.pop());
				settings.opaci.unshift(settings.opaci.pop());
				settings.position.unshift(settings.position.pop());
				navSlide();
			});
			
			if ($.browser.mozilla) {
				$(document).keypress(checkKey);
			} else {
				$(document).keydown(checkKey);
			}
			
			function checkKey(e){
				switch (e.keyCode) {
				case 37:
					settings.divide.push(settings.divide.shift());
					settings.left.push(settings.left.shift());
					settings.opaci.push(settings.opaci.shift());
					settings.position.push(settings.position.shift());
					navSlide();
					break;
				case 39:
					settings.divide.unshift(settings.divide.pop());
					settings.left.unshift(settings.left.pop());
					settings.opaci.unshift(settings.opaci.pop());
					settings.position.unshift(settings.position.pop());
					navSlide();
					break;
				}
			}

			$.fn.clickSlide = function(id, url) { 
				var loop = id;
				if(id<0) {
					loop = id*-1;
					for(var n=0;n<loop;n++) {
						settings.divide.push(settings.divide.shift());
						settings.left.push(settings.left.shift());
						settings.opaci.push(settings.opaci.shift());
						settings.position.push(settings.position.shift());
					}
					navSlide();
				} else if(id>0) {
					for(var n=0;n<loop;n++) {
						settings.divide.unshift(settings.divide.pop());
						settings.left.unshift(settings.left.pop());
						settings.opaci.unshift(settings.opaci.pop());
						settings.position.unshift(settings.position.pop());
					}
					navSlide();
				} else {
					if(url) window.open(url, '_blank');
				}
			}

			function navSlide() {
				var screenWidth = $(window).width()/2;
				//$('.bg_main').empty();
				for(var i=0;i<data.length;i++) {
					var imageWidth = data[i].width/settings.divide[i];
					var imageHeight = data[i].height/settings.divide[i];					
					var leftPosition = parseInt((screenWidth-(225*settings.left[i]))-(imageWidth/2));		
					var topPosition = (-144/settings.divide[i])+144;			
				
					$('#slideimg_'+i).animate({ opacity: settings.opaci[i], left: leftPosition, top: topPosition }, <?php echo $config['slide_time']; ?>);
					$('#sizeimg_'+i).animate({ width: imageWidth, height: imageHeight }, <?php echo $config['slide_time']; ?>);
					
					$('#over_'+i).attr('pos',settings.position[i]);
				}				
			}
			
		},
	});
});
</script>
<div style="height:330px;"><div id="panel-slide" align="center"><img src="images/loading_wh.gif" border="0" vspace="100" /></div></div>
