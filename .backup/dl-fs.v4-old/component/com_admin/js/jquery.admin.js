// JavaScript Dialog
$(function(){
	var currentConfig = 'profile';
	
	$('#menu_profile').click(function(){ $(this).AdminConfig('profile') });
	$('#menu_component').click(function(){ $(this).AdminConfig('component') });
	$('#menu_module').click(function(){ $(this).AdminConfig('module') });
	
	 $.fn.AdminConfig = function(config){		 
		if(currentConfig!=config) {
			window.location.hash = config;
			
			$(this).NavigatorNext('index.php');
			$('#admin_manage div').each(function() { $(this).attr('class','admin_menu'); });
			$('.admin_form div').each(function() { $(this).fadeOut(0); });
			$(this).attr('class','admin_mened');
			
			$('#config_'+config).css({ left: 20, opacity:0 }).fadeIn(0);
			$('#config_'+config).animate({ opacity: 1.0, left: 0 },200);
			currentConfig = config;
		}
	}
	
	
});
