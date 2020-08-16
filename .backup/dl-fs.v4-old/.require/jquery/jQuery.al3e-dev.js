// JavaScript DvG Engine Code
if(jQuery) (function(){
	$.extend($.fn, {
		Disable: function() {
			
		},
		Textbox: function() {
			var _me = $(this);
			_me.data({
				type: 'textbox',
				name: _me.attr('id'),
				value: _me.html(),
				maxlength: parseInt(_me.attr('maxlength')),
				disabled: false,
				readonly: false,
			});
			if(_me.attr('type')=='disabled') _me.data('disabled',true);
			if(_me.attr('type')=='readonly') _me.data('readonly',true);
			
			_me.attr('id','dvg_'+_me.data('name')).empty().append('<input type="text" id="'+_me.data('name')+'" class="textbox" value="'+_me.data('value')+'">');
			_me.append(function() {
				var _textbox = $('#'+_me.data('name'));
				_me.css('cursor','text');
				_textbox.css({ color:'#0879c5',width: parseInt(_me.attr('width')) });
				
				if(_me.attr('pretext') && !_textbox.val()) _textbox.css({ color:'#cdcdcd' }).val(_me.attr('pretext'));
				if(!_me.data('readonly') && !_me.data('disabled')) {
					_textbox.focusin(function(e){
						_me.css({ border:'2px solid #2382c2' });
						_textbox.css({ color:'#0879c5' });
						if(_textbox.val()==_me.attr('pretext')) _textbox.val("")
					});
					_textbox.focusout(function(e){
						_me.css({ border:'2px solid #b6b6b6' });
						if($.trim(_textbox.val())=="") _textbox.css({ color:'#cdcdcd' }).val(_me.attr('pretext'));
					});
				} else {
					if(_me.data('readonly')) {
						_me.css({ border:'2px solid #e8b622', cursor:'default' });
						_textbox.css({ color:'#0879c5' }).attr('readonly','readonly');
						
					} else if(_me.data('disabled')) {
						_me.css({ border:'2px solid #f0f0f0', backgroundColor: '#f0f0f0', cursor:'default' });
						_textbox.css({ color:'#999' }).attr('disabled','disabled');
					}
				}
            });
			return $('#'+_me.data('name'));
		},	
		Textarea: function() {
			var _me = $(this);
			_me.data({
				type: 'textarea',
				name: _me.attr('id'),
				value: _me.html(),
				maxlength: parseInt(_me.attr('maxlength')),
				disabled: false,
				readonly: false,
			});
			if(_me.attr('type')=='disabled') _me.data('disabled',true);
			if(_me.attr('type')=='readonly') _me.data('readonly',true);
			
			_me.attr('id','dvg_'+_me.data('name')).empty().append('<input type="text" id="'+_me.data('name')+'" class="textbox" value="'+_me.data('value')+'">');
			_me.append(function() {
				var _textbox = $('#'+_me.data('name'));
				_me.css('cursor','text');
				_textbox.css({ color:'#0879c5',width: parseInt(_me.attr('width')) });
				
				if(_me.attr('pretext') && !_textbox.val()) _textbox.css({ color:'#cdcdcd' }).val(_me.attr('pretext'));
				if(!_me.data('readonly') && !_me.data('disabled')) {
					_textbox.focusin(function(e){
						_me.css({ border:'2px solid #2382c2' });
						_textbox.css({ color:'#0879c5' });
						if(_textbox.val()==_me.attr('pretext')) _textbox.val("")
					});
					_textbox.focusout(function(e){
						_me.css({ border:'2px solid #b6b6b6' });
						if($.trim(_textbox.val())=="") _textbox.css({ color:'#cdcdcd' }).val(_me.attr('pretext'));
					});
				} else {
					if(_me.data('readonly')) {
						_me.css({ border:'2px solid #2382c2', cursor:'default' });
						_textbox.css({ color:'#0879c5' }).attr('readonly','readonly');
						
					} else if(_me.data('disabled')) {
						_me.css({ border:'2px solid #f0f0f0', backgroundColor: '#f0f0f0', cursor:'default' });
						_textbox.css({ color:'#999' }).attr('disabled','disabled');
					}
				}
            });
			return $('#'+_me.data('name'));
		},	
		Value: function(text) {
			if(!text) {
				
			} else {
				
			}
		}
	});
	
})(jQuery);

// DvG Engine Code
$(function(){

	// CheckBox
	$.fn.CheckBox = function(){
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

});


$.fn.setCursorPosition = function(pos) {
  this.each(function(index, elem) {
    if (elem.setSelectionRange) {
      elem.setSelectionRange(pos, pos);
    } else if (elem.createTextRange) {
      var range = elem.createTextRange();
      range.collapse(true);
      range.moveEnd('character', pos);
      range.moveStart('character', pos);
      range.select();
    }
  });
  return this;
};