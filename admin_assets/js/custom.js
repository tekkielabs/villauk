var base_url = "http://127.0.0.1:8888/PHP/villauk/";

function delete_job(str)
{
	if(confirm('Are you sure you want to delete?'))
	{
		window.location = base_url+"index.php/admin/jobs/delete/"+str;
	}
}

function delete_user(str)
{
	if(confirm('Are you sure you want to delete?'))
	{
		window.location = base_url+"index.php/admin/users/delete/"+str;
	}
}

function delete_category(str)
{
	if(confirm('Are you sure you want to delete?'))
	{
		window.location = base_url+"index.php/admin/category/delete/"+str;
	}
}

function delete_subcategory(str)
{
	if(confirm('Are you sure you want to delete?'))
	{
		window.location = base_url+"subcategory/delete/"+str;
	}
}


function delete_location(str)
{
	if(confirm('Are you sure you want to delete?'))
	{
		window.location = base_url+"index.php/admin/location/delete/"+str;
	}
}


function delete_menu(str)
{
	if(confirm('Are you sure you want to delete?'))
	{
		window.location = base_url+"index.php/admin/menu/delete/"+str;
	}
}