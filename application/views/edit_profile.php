<div id="content_sec">
    <div class="col1">
    	<div class="contact">
            <h4 class="heading colr">Edit Profile</h4>
            <?php
			if(isset($errorMessage)) echo '<div id="error-message">'.$errorMessage.'</div><br/>';
			
			elseif($this->session->flashdata('success'))  echo '<div id="success-message">'.$this->session->flashdata('success').'</div><br/>';
			?>
            <form method="post" action="" enctype="multipart/form-data">
            <ul class="forms">
            	<li class="txt">First name</li>
                <li class="inputfield<?php if(form_error('fname')) echo ' error'; ?>"><input name="fname" id="fname" type="text" class="bar" value="<?php if(set_value('fname')) echo set_value('fname'); else echo $profile_info['fname']; ?>"><?php echo form_error('fname'); ?></li>
            </ul>
            <ul class="forms">
            	<li class="txt">Last name</li>
                <li class="inputfield<?php if(form_error('lname')) echo ' error'; ?>"><input name="lname" id="lname" type="text" class="bar" value="<?php if(set_value('lname')) echo set_value('lname'); else echo $profile_info['lname']; ?>" ><?php echo form_error('lname'); ?></li>
            </ul>
            <ul class="forms">
            	<li class="txt">Email</li>
                <li class="inputfield<?php if(form_error('email')) echo ' error'; ?>"><input name="email" id="email" type="text" class="bar" value="<?php if(set_value('email')) echo set_value('email'); else echo $profile_info['email']; ?>" disabled="disabled"></li>
            </ul>
            <ul class="forms">
            	<li class="txt">Resume</li>
                <li class="inputfield<?php if(form_error('resume')) echo ' error'; ?>"><input name="resume" id="resume" type="file">
				<input name="resume2" id="resume2" type="hidden" value="<?php echo $profile_info['resume']; ?>">
				<?php echo form_error('resume'); ?></li>
                <strong>Current Resume :</strong> <a href="<?php echo base_url(); ?>uploads/resume/<?php echo $profile_info['resume']; ?>">Download</a>
            </ul>
            <ul class="forms">
            	<li class="txt">Cover</li>
                <li class="textfield<?php if(form_error('cover')) echo ' error'; ?>"><textarea name="cover" id="cover" cols="" rows="6"><?php if(set_value('cover')) echo set_value('cover'); else echo $profile_info['cover'];  ?></textarea><?php echo form_error('cover'); ?></li>
            </ul>
            <div class="clear"></div>
            <ul class="forms">
            	<li class="txt">&nbsp;</li>
                <li class="textfield"><input name="submit" id="submit" type="submit" value="Save" class="simplebtn"></li>
            </ul>
            </form>
        </div>
    </div>
    
    <div class="clear"></div>
  </div>