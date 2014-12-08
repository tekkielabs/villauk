  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/cont_slide.js"></script>
  <div id="content_sec">
  	<div class="upcoming_events">
    	<h4 class="heading colr">Latest Jobs</h4>
        <ul>
        	
            	<?php 
	   foreach($recent_jobs as $jobs)
	   {
		   $job_title = str_replace(' ','-',$jobs['title']);
			?>
            <li>
            	<h3><?php echo $jobs['title']; ?></h3>
                <div class="conts">
                	<p class="bold"><a href="<?php echo base_url(); ?>index.php/jobs/view/<?php echo $job_title; ?>" class="colr"><?php echo $jobs['title']; ?></a></p>
                    <p><?php echo substr($jobs['desc'],0,100); ?></p>
                </div>
            </li>
            <?php
	   }
	   ?>
        </ul>
    </div>
    <div class="location">
    	<h4 class="heading colr">Jobs by Location</h4>
       <?php 
	   $i=1;
	   foreach($jobs_location as $loc)
	   {
		   	$loc_name = str_replace(' ','-',$loc['name']);
			echo '<div style="width:150px;float:left;"><a href="'.base_url().'index.php/jobs/location/'.$loc_name.'">'.$loc['name'].' </a></div>';   
			if($i%2==0)
			{
				echo '<div class="clear"></div><br/>';
			}
			$i++;
	   }
	   ?>
    </div>
    <div class="gallery">
    	<h4 class="heading colr">Jobs by Category</h4>
        <?php 
		$j=1;
	   foreach($jobs_category as $cat)
	   {
		   $cat_name = str_replace(' ','-',$cat['name']);
			echo '<div style="width:150px;float:left;"><a href="'.base_url().'index.php/jobs/category/'.$cat_name.'">'.$cat['name'].' </a></div>';   
			if($j%2==0)
			{
				echo '<div class="clear"></div><br/>';
			}
			$j++;  
	   }
	   ?>
     </div>
    <div class="clear"></div>
    <div class="programe">
    	<div class="progs left">
    		<h3 class="colr">Jobseekers</h3>
            <div class="prog1 left">
            	<h4>Vestibulum</h4>
                <p>
                	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Sed elit. Nulla sem risus, vestibulum in, volutpat eget, dapibus ac.                </p>
            </div>
        </div>
        <div class="progs right">
    		<h3 class="colr">Recruiters</h3>
            <div class="prog2 right">
            	<h4>Vestibulum</h4>
                <p>
                	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Sed elit. Nulla sem risus, vestibulum in, volutpat eget, dapibus ac.                </p>
            </div>
        </div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</div>

