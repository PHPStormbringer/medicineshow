function talktome()
{
	alert('hi');
}

	function toggle_menu()
	{
		var x = document.getElementById('topmenu');
		
		if ( x.className.indexOf("open") >= 0 )
		{
			x.classList.remove("open");
		}
		else
		{
			x.className += ' open';
		}
		
	}
	
	function get_offset(x)
	{
		var child=$('#'+x);
		var parent=$('#history_container');
		
		var offset = child.offset().top-parent.offset().top;
		
		var real_offset = Math.round(offset) - 10;
		
		document.getElementById('history_container').style.marginTop = '-'+Math.round(real_offset)+'px';;
	}