// JavaScript Dialog
if(jQuery) (function(){
	$.extend($.fn, {
		TextBox: function(toggle, handler) {
	
			return $(this);
		},		
		
		DialogConfig: function(settings) {			

			return $(this);
		},
	});
	
})(jQuery);


// JavaScript From for dl-fs
$(function(){
	// Textbox
	$.fn.TextBox = function(){
		var idCheckbox = $(this).attr('id')+'_checkbox';
	}
	$.fn.dlComboBox = function(list, column){
		var me = this;
		var id = 'list_'+$(this).attr('class');
		var cValue = 'select_'+$(this).attr('class');
		var heightSelected = 22;
		var classSelected = "list-selected "+cValue;
		$(this).css('padding-right','23px');
		$(this).before('<div class="combobox" id="'+id+'" style="display:none;"></div>');
		
		if(typeof(column)=="number") $('#'+id).height(heightSelected*column);
		for(var key in list) {
			if(!$(this).attr('start')) {
				$(this).val(list[key]);
				$(this).attr('start',key);
				$(this).attr('d',key);
			} else {
				$(this).attr('d',$(this).attr('start'));
			}
			if($(this).attr('start')==key) {
				$(this).val(list[key]);
				classSelected += " highlight";
			}
			$('#'+id).append('<div><input class="'+classSelected+'" id="'+id+key+'" type="button" key="'+key+'" value="'+list[key]+'" style="width:'+($(this).width()+6)+'px;" /></div>');
			$('#'+id+key).click(function(e) {
				$(me).attr('itop', parseInt(($(me).position().top+3)-$(this).position().top));
				$(me).attr('start', $(this).attr('key'));
				$(me).val($(this).val());
				$('#'+id).fadeOut(100);
				
				var DefaultDate = "";
				var CurrentDate = "";
				$('input#txt_birthday').each(function(index, element) {
					DefaultDate += $(element).attr('d'); 
					CurrentDate += $(element).attr('start');      
                });
				if(DefaultDate!=CurrentDate) {
					$('input#txt_birthday').each(function(index, element) {
						$(element).data('verify', true);
						$(element).css('border','#2382c2 solid 2px');
					});
				} else {
					$('input#txt_birthday').each(function(index, element) {
						$(element).data('verify', false);
						$(element).css('border','#c8c8c8 solid 2px');
					});
				}
			});			
		}
		// 
		$('#'+id).width($(this).width()+23);		
		$(this).mousedown(function(e) {			
            if(!$(me).attr('itop')) {
/////////////// Defualt Conbox Items Selected
				$(me).attr('itop',($(me).position().top+3));
			}
        });
		$(this).mouseup(function(e) {
			$('.combobox').each(function(i, e) { $(e).fadeOut(100); });
			$('.highlight').removeClass('highlight');
			$('#'+id+parseInt($(this).attr('start'))).addClass('highlight');
			$('#'+id).fadeIn(100).css({'left': ($(this).position().left+3),'top': parseInt($(this).attr('itop'))});
        });
		
	}
	
	// CheckBox
	$.fn.CheckBox = function(){
		$(this).disableTextSelect();
		var idCheckbox = $(this).attr('id')+'_checkbox';
		$(this).html('<div class="blockinput"><input type="button" id="'+idCheckbox+'" class="chk_'+$(this).val()+'" /></div><div class="checkbox_text">'+$(this).html()+'</div>');
		
		$(this).mouseover(function(){
			if($(this).val()=='false') $('#'+idCheckbox).css('background-position','-16px 0px');
			else $('#'+idCheckbox).css('background-position','-16px -16px');
		});
		$(this).mouseleave(function(){			
			if($(this).val()=='false') $('#'+idCheckbox).css('background-position','0px 0px');
			else $('#'+idCheckbox).css('background-position','0px -16px');
		});
		$(this).mousedown(function(){
			$('#'+idCheckbox).css('background-position','-32px 0px');		
			if($(this).val()=='false') {
				$(this).val('true');
			} else {
				$(this).val('false');
			}
		});
		$(this).mouseup(function(){			
			if($(this).val()=='false') $('#'+idCheckbox).css('background-position','-16px 0px');
			else $('#'+idCheckbox).css('background-position','-16px -16px');
		});
	}
	
	// RadioBox
	
	
	/*$.fn.val = function(text){
		if(typeof(text)!='undefined') $(this).attr('value',text);
		return $(this).attr('value');
	}*/
});
