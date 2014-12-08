<div id="page-content-wrapper">
    <div id="page-title"><h3>Locations List</h3></div><!-- #page-title -->
    
    
        
                
  
    
<div id="page-content" style="min-height: 229px;">
        <div class="example-box">
            <div class="example-code">
                <table class="table" id="example1">
                    <thead>
                        <tr>
                            <th>Location Name</th
                            ><th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
  <?php
if(is_array($locations))
{
  foreach($locations as $location)
  {
	  ?>                  
                        <tr>
                            <td><?php echo $location['name']; ?></td>
                            <td>
                            		<div class="dropdown">
                                    <a href="javascript:;" title="" class="btn medium bg-blue" data-toggle="dropdown">
                                        <span class="button-content">
                                            <i class="glyph-icon font-size-11 icon-cog"></i>
                                            <i class="glyph-icon font-size-11 icon-chevron-down"></i>
                                        </span>
                                    </a>
                                    <ul class="dropdown-menu float-right">
                                        <li><a href="<?php echo base_url(); ?>index.php/admin/location/edit/<?php echo $location['id']; ?>" title=""><i class="glyph-icon icon-edit mrg5R"></i>Edit</a></li>
                                        <li class="divider"></li>
                                        <li><a href="javascript:void();" class="font-red" title="" onclick="delete_location('<?php echo $location['id']; ?>');"><i class="glyph-icon icon-remove mrg5R"></i>Delete</a>
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