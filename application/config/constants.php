<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

define('SITE_TITLE', 'Villa UK');
define('ENTER_CATEGORY', 'Please enter category');
define('CATEGORY_ADDED_SUCCESS', 'Added Successfully');
define('CATEGORY_DUPLICATE', 'Already Exists');
define('CATEGORY_EDITED_SUCCESS', 'Edited Successfully');

define('ENTER_LOCATION', 'Please enter location');
define('LOCATION_ADDED_SUCCESS', 'Added Successfully');
define('LOCATION_DUPLICATE', 'Already Exists');
define('LOCATION_EDITED_SUCCESS', 'Edited Successfully');

define('LOGIN_FAILED','Invalid Email OR Password');

define('MENU_EDITED_SUCCESS','Menu Updated Successfully');
define('ENTER_MENU','Enter Menu');

define('JOB_ADDED_SUCCESS','Job Added Successfully');
define('JOB_DUPLICATE','Job Code already exists');
define('JOB_EDITED_SUCCESS','Job Saved Successfully');

define('ENTER_TITLE','Enter Page Title');
define('PAGE_DUPLICATE','Page title already exists');
define('PAGE_EDITED_SUCCESS','Page Saved Successfully');

define('REGISTER_SUCCESS','Successfully Registered!');

define('JOB_APPLY_SUCCESS','You successfully applied for this job!');
define('JOB_APPLY_FAILED','You already applied for this job!');

define('UPDATE_PROFILE_SUCCESS','Profile updated successfully!');

/* End of file constants.php */
/* Location: ./application/config/constants.php */