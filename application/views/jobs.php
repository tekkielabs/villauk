 <div id="content_sec">
 <h4 class="heading colr"><?php echo $heading; ?></h4>
    <div class="col1">
    	<div class="news">
        
        
        <?php
		if($this->session->flashdata('applied'))
		{
			echo '<div id="success-message">'.$this->session->flashdata('applied').'</div>';
		}
		elseif($this->session->flashdata('failed'))
		{
			echo '<div id="error-message">'.$this->session->flashdata('failed').'</div>';
		}
		
		?>
        
        <?php 
		if(!empty($jobs))
		{
			foreach($jobs as $job)
			{
				$job_title = str_replace(' ','-',$job['title']);
				?>
				<div class="featured_news">
				   <?php if($job['featured']==1){?>
					<span class="featured">&nbsp;</span>
					<?php } ?>
					<div class="cont">
						<p class="featuredate"><?php echo $job['location']; ?></p>
						
							<h4 <?php if($job['featured']==1){?> style="margin-left:50px;" <?php } ?>><?php echo $job['title']; ?></h4>
						
						<br/>
						<p class="txt">
							<?php echo substr($job['desc'],0,360); ?>
						</p>
						<div class="featured_links">
							<a href="<?php echo base_url(); ?>index.php/jobs/view/<?php echo $job_title; ?>" class="simplebtn left" >View Job</a>
                            <?php
							if($this->session->userdata('user_id'))
							{
							?>
							<a href="<?php echo base_url(); ?>index.php/jobs/apply/<?php echo $job['id']; ?>" class="simplebtn left" style="margin-left:20px;">Apply</a>&nbsp;
                            <?php
							}
							else
							{
								?>
                                <a href="#" onclick="alert('Please login or register to apply this job!');" class="simplebtn left" style="margin-left:20px;">Apply</a>&nbsp;
                                <?php
							}
							?>
						</div>
					</div>
				</div>
			<?php
			}
			echo $this->pagination->create_links();
		}
		else
		{
			echo "No jobs found!";
		}
		?>
            
           
     </div>
   </div>
   
   
   
   
   
   <div class="col2">
    	<div class="upcoming_events">
    	<h4 class="heading colr">Recent Jobs</h4>
        <ul>
        <?php
		foreach($recent_jobs as $recent)
		{
			$job_title = str_replace(' ','-',$recent['title']);
		?>
        	<li>
            	<a href="<?php echo base_url(); ?>index.php/jobs/view/<?php echo $job_title; ?>" class="colr"><h3><?php echo $recent['category']; ?></h3></a>
                <div class="conts">
                	<p class="bold"><a href="<?php echo base_url(); ?>index.php/jobs/view/<?php echo $job_title; ?>" class="colr"><?php echo $recent['title']; ?>s</a></p>
                    <p><strong>Exp :</strong> <?php echo $recent['min_exp']; ?> - <?php echo $recent['max_exp']; ?> yrs</p>
                </div>
            </li>
        <?php	
		}
		?>
        </ul>
    </div>
    </div>
    <div class="clear"></div>
  </div>
  
  
</div>