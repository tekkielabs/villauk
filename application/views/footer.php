<div class="clear"></div>
<div id="footer">
	<ul class="left">
    
     <?php 
					foreach($footer_menus as $menu)
					{
							?>
                                 <li><a href="<?php echo base_url(); ?>index.php/pages/content/<?php echo $menu['menu_slug']; ?>"><?php echo $menu['menu_name']; ?></a></li>
                             <?php
					}
					?>
    </ul>
    <ul class="right">
    	<li>© <?php date('Y'); ?> Villa UK, All Rights Reserved</li>
        <li class="last">Powered by <a href="http://www.tekkielabs.com" target="_blank">Tekkie Labs</a></li>
    </ul>
    <div class="clear"></div>
</div>
</body>
</html>
