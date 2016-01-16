<script>
$(function(){
	/*
	jQuery.fn.GobalConfig.Interval.data({ "mod_notice": {
			wait: 0,
			time: 30,
			code: function(){
				// Code
			}
		}
	});*/
	
});

/*
$(function(){
	if(parseInt($('#user_notice').attr('ex'))!=0) $('#notice_name').css('color','#c22323'); else $('#notice_name').css('color','#939393');

	setInterval(function(){
		if($.fn.GobalConfig.ajax && $.fn.GobalConfig.wait) {		
			$.ajax({ url: '?@mod_SupportNotice',
				data: { last_id: $('#user_notice').attr('last') },
				success: function(data) {
					if((data.notice!=null && $('#user_notice').attr('ex')=="") || (parseInt($('#user_notice').attr('ex'))<=data.time && data.notice!=null)) {
						$('#notice_name').animate({ 'margin-left': -25, opacity:0 },200);
						$('#notice_message').animate({ 'margin-left': -50, opacity:0 },200).fadeOut(0, function() {
							$('#notice_name').html(data.notice.name);
							$('#notice_message').html(data.notice.message).fadeIn(0, function(){
								$('#notice_name').css('margin-left',25).animate({ 'margin-left': 0, opacity:1 },200);
								if(data.config.expire!=0) $('#notice_name').css('color','#c22323'); else $('#notice_name').css('color','#939393');
								$('#notice_message').css('margin-left',50).animate({ 'margin-left': 0, opacity:1 },200,0,function(){
									
								});
							});
							switch(parseInt(data.config.icon)) {
								case 0: $('#notice_message').append('<img id="notice_icon" src="../images/icon/notice/1344290317_19.png" width="16" height="16" />'); break;
							}
						});
						$('#user_notice').attr('last',data.config.last);
						$('#user_notice').attr('ic',data.config.icon);
						$('#user_notice').attr('ex',data.config.expire);
						$.fn.Session({
							'notice_name': data.notice.name,
							'notice_message': data.notice.message,
							'notice_icon': data.config.icon,
							'notice_expire': data.config.expire
						});
						$.fn.Cookie('notice_last',data.config.last,43200);
					}
					if(parseInt($('#user_notice').attr('ex'))>0) {
						var ExpireTime = parseInt($('#user_notice').attr('ex'))-data.time;
						if(ExpireTime>=60) {
							if(ExpireTime>=3600) {
								if(ExpireTime>=86400) {
									$('#notice_name').html('<?php echo _TIME_ABOUT;?>'+parseInt(ExpireTime/86400)+'<?php echo _TIME_DAY;?>');
								} else {
									$('#notice_name').html('<?php echo _TIME_ABOUT;?>'+parseInt(ExpireTime/3600)+'<?php echo _TIME_HOUR;?>');
								}
							} else {
								$('#notice_name').html('<?php echo _TIME_ABOUT;?>'+parseInt(ExpireTime/60)+'<?php echo _TIME_MINUTE;?>');
							}
						} else {
							if(ExpireTime>0) {
								$('#notice_name').html('<?php echo _TIME_ABOUT;?>'+parseInt(ExpireTime)+'<?php echo _TIME_SECOND;?>');
							} else {
								$('#notice_name').html("-");
							}
						}
					}
				}
			});
		}
	}, <?php echo $config['delay']; ?>);	
});*/
</script>
<div id="user_notice" last="" ic="" ex="">
  <div style="display:inline-block;">
    <div style="position:relative;"><div id="notice_name"></div><div id="notice_message"><?php echo _SITE_NOTICE_WAIT; ?></div></div>
  </div>
</div>
