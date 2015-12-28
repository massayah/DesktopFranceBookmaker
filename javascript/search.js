
$(document).ready(function(){

	$.extend($.expr[':'], {
	'containsi': function(elem, i, match, array)
	{
		return (elem.textContent || elem.innerText || '').toLowerCase()
		.indexOf((match[3] || "").toLowerCase()) >= 0;
	}
	});
	
	$('#info_team').keyup(function(){
		if ($(this).val()=='')
		{
			$('#datematch').show();
			$('#daymatch').show();
			$('#mainblock div').show();
			$('.hidelightbox').css("display", "none");
		}
		else
		{
			$('#datematch').hide();
			$('#daymatch').hide();
			$('#mainblock .class1test').hide();
			$('span.mls strong:containsi('+$(this).val()+')').parents('.class1test').show();
		}
	});
	
	$('#search_users').keyup(function(){
	if( $(this).val()=='')
	{
		$('#admin_users tbody tr').show();
	}
	else
	{
		$('#admin_users tbody tr').hide();
		$('#admin_users tbody tr td.first:containsi('+$(this).val()+')').parents('tr').show();
		$('#admin_users tbody tr td.first:containsi('+$(this).val()+')').show();
	}
	});
	$('#ranking_users').keyup(function(){
	if( $(this).val()=='')
	{
		$('#rank_users tbody tr').show();
	}
	else
	{
		$('#rank_users tbody tr').hide();
		$('#rank_users tbody tr td.user:containsi('+$(this).val()+')').parents('tr').show();
		$('#rank_users tbody tr td.user:containsi('+$(this).val()+')').show();
	}
	});
});