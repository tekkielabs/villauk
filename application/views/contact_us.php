  <script type="text/javascript" src="js/cont_slide.js"></script>
  <div id="content_sec">
  <h4 class="heading colr"><?php echo $content['title']; ?></h4>
  
  	<form method="post" action="">
            <ul class="forms">
            	<li class="txt">Name</li>
                <li class="inputfield<?php if(form_error('name')) echo ' error'; ?>"><input name="name" id="name" type="text" class="bar" value="<?php echo set_value('fname'); ?>"><?php echo form_error('fname'); ?></li>
            </ul>
            <ul class="forms">
            	<li class="txt">Email</li>
                <li class="inputfield<?php if(form_error('email')) echo ' error'; ?>"><input name="email" id="email" type="text" class="bar" value="<?php echo set_value('email'); ?>"><?php echo form_error('email'); ?></li>
            </ul>
             <ul class="forms">
            	<li class="txt">Phone</li>
                <li class="inputfield<?php if(form_error('phone')) echo ' error'; ?>"><input name="phone" id="phone" type="text" class="bar" value="<?php echo set_value('phone'); ?>"><?php echo form_error('phone'); ?></li>
            </ul>
            <ul class="forms">
            	<li class="txt">Message</li>
                <li class="textfield<?php if(form_error('cover')) echo ' error'; ?>"><textarea name="cover" id="cover" cols="" rows="6"><?php echo set_value('cover'); ?></textarea><?php echo form_error('cover'); ?></li>
            </ul>
            <div class="clear"></div>
            <ul class="forms">
            	<li class="txt">&nbsp;</li>
                <li class="textfield"><input name="submit" id="submit" type="submit" value="Send" class="simplebtn"></li>
            </ul>
            </form>
  </div>
  <div class="clear"></div>
  
  <iframe width="960" height="300" src="http://regiohelden.de/google-maps/map_en.php?width=960&amp;height=300&amp;hl=en&amp;q=646c%20Kingsbury%20Road%20London%20%E2%80%93%20NW9%209HN+(Villa%20UK)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=A&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="margin:20px;"></iframe>
 
</div>

