<div id="page-content-wrapper">
    <div id="page-title"><h3>Pages List</h3></div><!-- #page-title -->
    
    
        
                
  
    
<div id="page-content" style="min-height: 229px;">
        <div class="example-box">
            <div class="example-code">
                <table class="table" id="example1">
                    <thead>
                        <tr>
                            <th>Page Name</th>
                            <th>Actions</th> 
                        </tr>
                    </thead>
                    <tbody>
  <?php
if(is_array($pages))
{
  foreach($pages as $page)
  {
	  ?>                  
                        <tr>
                            <td><?php echo $page['title']; ?></td>
                            <td>
                            		<div class="dropdown">
                                    <a href="javascript:;" title="" class="btn medium bg-blue" data-toggle="dropdown">
                                        <span class="button-content">
                                            <i class="glyph-icon font-size-11 icon-cog"></i>
                                            <i class="glyph-icon font-size-11 icon-chevron-down"></i>
                                        </span>
                                    </a>
                                    <ul class="dropdown-menu float-right">
                                        <li><a href="<?php echo base_url(); ?>index.php/admin/pages/edit/<?php echo $page['id']; ?>" title=""><i class="glyph-icon icon-edit mrg5R"></i>Edit</a></li>
                                        <li class="divider"></li>
                                       
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