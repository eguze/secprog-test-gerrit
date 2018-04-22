function conf(txt)
	{
		var r = confirm(txt);
		if(r == true) 
		{
			return true;
		}
		else 
		{ 	
			return false; 
		}
	}