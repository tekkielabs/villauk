<div id="page-content-wrapper">
    <div id="page-title"><h3>Jobs List</h3></div><!-- #page-title -->
    
    
        
                
  
    
<div id="page-content" style="min-height: 229px;">
        <div class="example-box">
            <div class="example-code">
                <table class="table" id="example1">
                    <thead>
                        <tr>
                            <th>Job Title</th>
                            <th>Category</th>
                            <th>Location Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
  <?php
if(is_array($jobs))
{
  foreach($jobs as $job)
  {
	  ?>                  
                        <tr>
                            <td><?php echo $job['title']; ?></td>
                            <td><?php echo $this->Jobs_model->get_category_name($job['cat_id']); ?></td>
                            <td><?php echo $this->Jobs_model->get_location_name($job['location']); ?></td>
                            <td>
                            		<div class="dropdown">
                                    <a href="javascript:;" title="" class="btn medium bg-blue" data-toggle="dropdown">
                                        <span class="button-content">
                                            <i class="glyph-icon font-size-11 icon-cog"></i>
                                            <i class="glyph-icon font-size-11 icon-chevron-down"></i>
                                        </span>
                                    </a>
                                    <ul class="dropdown-menu float-right">
                                        <li><a href="<?php echo base_url(); ?>index.php/admin/jobs/edit/<?php echo $job['id']; ?>" title=""><i class="glyph-icon icon-edit mrg5R"></i>Edit</a></li>
                                        <li class="divider"></li>
                                        <li><a href="javascript:void();" class="font-red" title="" onclick="delete_job('<?php echo $job['id']; ?>');"><i class="glyph-icon icon-remove mrg5R"></i>Delete</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
      <?php
  }
}
  ?>
                       
                    </tbody>
                </table>

            </div>
        </div>
 </div>            
            


</div><!-- #page-content-wrapper -->