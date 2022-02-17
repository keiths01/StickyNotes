$(document).ready(function(){
	/* This code is executed after the DOM has been completely loaded */

	var tmp;
	
	$('.note').each(function(){
		/* Finding the biggest z-index value of the notes */
		tmp = $(this).css('z-index');
		if (tmp>zIndex) zIndex = tmp;
	})

	/* A helper function for converting a set of elements to draggables: */
//	$(".note").draggable();
	make_draggable($('.note'));
	
	/* Configuring the fancybox plugin for the "Add a note" button: */
	$("#addButton").fancybox({
		'zoomSpeedIn'		: 600,
		'zoomSpeedOut'		: 500,
		'easingIn'			: 'easeOutBack',
		'easingOut'			: 'easeInBack',
		'hideOnContentClick': false,
		'padding'			: 15,
		/*'afterClose':function() { // v2+
			//window.location.reload();
			parent.location.reload(true);
		},*/
		/*'onClosed': function() {   // v1.3+
			parent.location.reload(true); 
		}*/
		'callbackOnClose'	: function() {  // v1.26 
			parent.location.reload(true); 
		}
	});
	
	/* Listening for keyup events on fields of the "Add a note" form: */
	$('.pr-body,.pr-author').live('keyup',function(e){
		if(!this.preview)
			this.preview=$('#fancy_ajax .note');
		
		/* Setting the text of the preview to the contents of the input field, and stripping all the HTML tags: */
		this.preview.find($(this).attr('class').replace('pr-','.')).html($(this).val().replace(/<[^>]+>/ig,''));
	});
	
	/* Changing the color of the preview note: */
	$('.color').live('click',function(){
		$('#fancy_ajax .note').removeClass('yellow green blue').addClass($(this).attr('class').replace('color',''));
	});
	
	/* The submit button: */
	$('#note-submit').live('click',function(e){
		
		if ($('.pr-author').val().length<1) {
			alert("お名前を教えてください!")
			return false;
		}
		
		if ($('.pr-file').val().length>1) {
			$(this).replaceWith('<img src="img/ajax_load.gif" style="margin:30px auto;display:block" />');

			var data = new FormData($('.note-form')[0]);

			jQuery.ajax({
				async: true,
				xhr : function() {
					var XHR = $.ajaxSettings.xhr();
					return XHR;
				},
				url:  "ajax/post_file.php",
				type: "post",
				data: data,
				contentType: false,
				processData: false,
				async: false
			}).done(function(text) {
				alert(text);
				$('.pr-body').val($('.pr-file').val());
			});
		} else {
			if ($('.pr-body').val().length<4) {
				alert("もっと長いコメントが欲しいです!")
				return false;
			}
		}
		
		$(this).replaceWith('<img src="img/ajax_load.gif" style="margin:30px auto;display:block" />');

		var data = {
			'zindex'	: ++zIndex,
			'body'		: $('.pr-body').val().replace('C:\\fakepath\\',''),
			'author'	: $('.pr-author').val(),
			'color'		: $.trim($('#fancy_ajax .note').attr('class').replace('note','')),
		};
		
		
		/* Sending an AJAX POST request: */
		$.post('ajax/post.php',data,function(msg){
						 
			if(parseInt(msg))
			{
				/* msg contains the ID of the note, assigned by MySQL's auto increment: */
				
				var tmp = $('#fancy_ajax .note').clone();
				
				tmp.find('span.data').text(msg).end().css({'z-index':zIndex,top:0,left:0});
				tmp.appendTo($('#main'));
				
				make_draggable(tmp);
			}
			
			$("#addButton").fancybox.close();
		});
		
		e.preventDefault();
	})
	
	$('.note-form').live('submit',function(e){e.preventDefault();});
});

var zIndex = 0;

function make_draggable(elements)
{
	/* Elements is a jquery object: */
	
	elements.draggable({
		containment:'parent',
		start:function(e,ui){ ui.helper.css('z-index',++zIndex); },
		stop:function(e,ui){
			
			/* Sending the z-index and positon of the note to update_position.php via AJAX GET: */

			$.get('ajax/update_position.php',{
				  x		: ui.position.left,
				  y		: ui.position.top,
				  z		: zIndex,
				  id	: parseInt(ui.helper.find('span.data').html())
			});
		}
	});
}

function del_note(note_id)
{
	if (!confirm(note_id + 'を削除します。\nよろしいですか？')) {
		return false;
	}
	//alert(note_id + "を削除します。");
	$.get("ajax/update_del.php?id=" + note_id);
	$("#note" + note_id).hide("slow");
}
