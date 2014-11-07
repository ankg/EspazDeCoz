function slideSidebar()
{
	var sidebar = $('#sidebar');
	var left = $(sidebar).css('left');
	console.log(left);

	if(left == '0px')
	{
		$(sidebar).css({'left' : '-190px'});
	}
	else
	{
		$(sidebar).css({'left' : '0px'});
	}
}