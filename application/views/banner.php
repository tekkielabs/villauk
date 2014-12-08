 <div id="banner">
    	<div class="left">
        	<div class="anythingSlider">
        
          <div class="wrapper">
            <ul>
               
               <li><a href="#"><img src="<?php echo base_url(); ?>assets/images/banner1.jpg" alt="" /></a></li>
               <li><a href="#"><img src="<?php echo base_url(); ?>assets/images/banner3.jpg" alt="" /></a></li>
               <li><a href="#"><img src="<?php echo base_url(); ?>assets/images/banner2.jpg" alt="" /></a></li>
            </ul>        
          </div>
          
        </div>
        </div>    
        <div class="right_accordion">
        <?php
		if(!$this->session->userdata('user_id'))
		{
			?>
        	<div class="glossymenu">
                <a class="menuitem submenuheader" href="#" >Login Here</a>
                <div class="submenu">
                <?php
				if($this->session->flashdata('failed'))  echo '<label class="error">'.$this->session->flashdata('failed').'</label><br/>';
				?>
                <form method="post" action="<?php echo base_url(); ?>index.php/login/">
                    <div class="loginbox">
                    	<ul class="loginform">
                        	<li class="txt">Email : </li>
                            <li class="inputfield"><input name="email" type="text" class="bar" /></li>
                        </ul>
                        <ul class="loginform">
                        	<li class="txt">Password : </li>
                            <li class="inputfield"><input name="password" type="text" class="bar" /></li>
                        </ul>
                        <ul class="loginform">
                        	<li class="formlinks">
                            	<a href="#">Forgot Password?</a><br />
                                <br />
                                <a href="<?php echo base_url(); ?>index.php/register/">Register now</a>
                            </li>
                            <li class="submission"><input type="submit" name="submit" value="Login" class="loginsubmit"/></li>
                        </ul>
                    </div>
                    </form>
                </div>
            <!--   <a class="menuitem submenuheader" href="#" >Newsletter Subscrbtion</a>
                <div class="submenu">
                    <div class="loginbox">
                    	<ul class="loginform">
                        	<li class="txt">Name</li>
                            <li class="inputfield"><input name="in" type="text" class="bar" /></li>
                        </ul>
                        <ul class="loginform">
                        	<li class="txt">Email Address</li>
                            <li class="inputfield"><input name="in" type="text" class="bar" /></li>
                        </ul>
                        <ul class="loginform">
                        	<li class="unsb">
                            	<input name="in" type="checkbox" value="" /> Unsubscribe
                            </li>
                            <li class="submission"><a href="#" class="loginsubmit">Submit Email</a></li>
                        </ul>
                    </div>
                </div>--> 
            </div>
            <?php
		}
		else
		{
			?>
           <div class="login"> Welcome <?php echo $this->session->userdata('fname')." ".$this->session->userdata('lname'); ?>!!!
           
           <ul>
           		<li><a href="<?php echo base_url(); ?>index.php/myjobs/">My Applied Jobs</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/profile/edit_profile/">Edit Profile</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/login/change_password/">Change Password</a></li>
                <li><a href="<?php base_url(); ?>index.php/login/logout">Logout</a></li>
           </ul>
                 
           
           </div>
            <?php
		}
		?>
        </div>
    </div>