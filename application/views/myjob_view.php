 <div id="content_sec">
    <div class="col1">
    	<div class="blog">
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
        
        	<ul>
            	<li>
                	<p class="date">Exp<br/><?php echo $job['min_exp']."-".$job['max_exp']; ?></p>
                	<h2 class="colr"><?php echo $job['title']; ?></h2>
                    <div class="clear"></div>
                    <div class="cont">
                    <p>
                    	<strong>Location :</strong> <?php echo $job['location']; ?>
                    </p>
                    <p>
                    	<strong>Experience :</strong> <?php echo $job['min_exp']; ?> to <?php echo $job['max_exp']; ?> Yrs
                    </p>
                    
                    <p>
                    	<strong>Compensation :</strong> <?php echo $job['min_sal']; ?> to <?php echo $job['max_sal']; ?> Lacs
                    </p>
                    
                    <p>
                    	<strong>Job Description :</strong> <br/> <?php echo nl2br($job['desc']); ?> Lacs
                    </p>
                    <br/>
                    <div class="featured_links">
							
						</div><br/><br/>
                         <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                    
                </li>
            </ul>
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