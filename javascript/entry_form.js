$(document).ready(function() {

    var title = $('title').text();
	var entry_title = $('.heading h2').text();
	var tt = $('#title').val();
	
    if(tt != '') $('title').text(tt+" | "+title); else $('title').text(title);
	if(tt != '') $('.heading h2').html('<span class="head_title">'+tt+" | "+entry_title+'</span>'); else $('.heading h2').html('<span class="head_title">'+entry_title+'</span>');
	if(tt != '') $('#breadCrumb li.last').text(tt); else $('#breadCrumb li.last').text(entry_title);
	
	hosei_add_button();
		
    $('#title').keyup(function(){

        var tt = $(this).val();

        if(tt != '') $('title').text(tt+" | "+title); else $('title').text(title);
		if(tt != '') $('.head_title').text(tt+" | "+entry_title); else $('.head_title').text(entry_title);
		if(tt != '') $('#breadCrumb li.last').text(tt); else $('.heading h2').text(entry_title);
		
    });

});