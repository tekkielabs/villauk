<div id="content_sec">
    <div class="col1">
    	<div class="contact">
            <h4 class="heading colr">Register</h4>
            <?php
			if(isset($errorMessage)) echo '<label class="error">'.$errorMessage.'</label><br/>';
			
			elseif($this->session->flashdata('success'))  echo '<label class="success">'.$this->session->flashdata('success').'</label><br/>';
			?>
            <form method="post" action="" enctype="multipart/form-data">
            <ul class="forms">
            	<li class="txt">First name</li>
                <li class="inputfield<?php if(form_error('fname')) echo ' error'; ?>"><input name="fname" id="fname" type="text" class="bar" value="<?php echo set_value('fname'); ?>"><?php echo form_error('fname'); ?></li>
            </ul>
            <ul class="forms">
            	<li class="txt">Last name</li>
                <li class="inputfield<?php if(form_error('lname')) echo ' error'; ?>"><input name="lname" id="lname" type="text" class="bar" value="<?php echo set_value('fname'); ?>" ><?php echo form_error('lname'); ?></li>
            </ul>
            <ul class="forms">
            	<li class="txt">Email</li>
                <li class="inputfield<?php if(form_error('email')) echo ' error'; ?>"><input name="email" id="email" type="text" class="bar" value="<?php echo set_value('email'); ?>"><?php echo form_error('email'); ?></li>
            </ul>
            <ul class="forms">
            	<li class="txt">Password</li>
                <li class="inputfield<?php if(form_error('password')) echo ' error'; ?>"><input name="password" id="password" type="password" class="bar" value="<?php echo set_value('password'); ?>"><?php echo form_error('password'); ?></li>
            </ul>
            <ul class="forms">
            	<li class="txt">Confirm Password</li>
                <li class="inputfield<?php if(form_error('cpassword')) echo ' error'; ?>"><input name="cpassword" id="cpassword" type="password" class="bar" value="<?php echo set_value('cpassword'); ?>"><?php echo form_error('cpassword'); ?></li>
            </ul>
            <ul class="forms">
            	<li class="txt">Resume</li>
                <li class="inputfield<?php if(form_error('resume')) echo ' error'; ?>"><input name="resume" id="resume" type="file"><?php echo form_error('resume'); ?></li>
            </ul>
            <ul class="forms">
            	<li class="txt">Cover</li>
                <li class="textfield<?php if(form_error('cover')) echo ' error'; ?>"><textarea name="cover" id="cover" cols="" rows="6"><?php echo set_value('cover'); ?></textarea><?php echo form_error('cover'); ?></li>
            </ul>
            <div class="clear"></div>
            <ul class="forms">
            	<li class="txt">&nbsp;</li>
                <li class="textfield"><input name="submit" id="submit" type="submit" value="Register" class="simplebtn"></li>
            </ul>
            </form>
        </div>
    </div>
    
    <div class="clear"></div>
  </div>