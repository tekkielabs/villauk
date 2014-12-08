<div id="page-content-wrapper">
    <div id="page-title"><h3>Menu List</h3></div><!-- #page-title -->
    
    
        
                
  
    
<div id="page-content" style="min-height: 229px;">
        <div class="example-box">
            <div class="example-code">
                <table class="table" id="example1">
                    <thead>
                        <tr>
                            <th>Menu Name</th>
                            <th>Actions</th>
                            <th>Main Menu Status</th>
                            <th>Footer Status</th>
                        </tr>
                    </thead>
                    <tbody>
  <?php
if(is_array($categories))
{
  foreach($categories as $category)
  {
	  ?>                  
                        <tr>
                            <td><?php echo $category['menu_name']; ?></td>
                            <td>
                            		<div class="dropdown">
                                    <a href="javascript:;" title="" class="btn medium bg-blue" data-toggle="dropdown">
                                        <span class="button-content">
                                            <i class="glyph-icon font-size-11 icon-cog"></i>
                                            <i class="glyph-icon font-size-11 icon-chevron-down"></i>
                                        </span>
                                    </a>
                                    <ul class="dropdown-menu float-right">
                                        <li><a href="<?php echo base_url(); ?>index.php/admin/menu/edit/<?php echo $category['id']; ?>" title=""><i class="glyph-icon icon-edit mrg5R"></i>Edit</a></li>
                                        <li class="divider"></li>
                                        <li><a href="javascript:void();" class="font-red" title="" onclick="delete_menu('<?php echo $category['id']; ?>');"><i class="glyph-icon icon-remove mrg5R"></i>Delete</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                            <td>
                            <?php if($category['main_menu']==1) { ?>
                            <a href="<?php echo base_url(); ?>index.php/admin/menu/main_menu_display/<?php echo $category['id']; ?>/0" class="btn medium bg-green" title="">
                                <span class="button-content">Active</span>
                            </a>
                            <?php } else { ?>
                            		<a href="<?php echo base_url(); ?>index.php/admin/menu/main_menu_display/<?php echo $category['id']; ?>/1" class="btn medium bg-red" title="">
                                    <span class="button-content">Inactive</span>
                                </a>
                            <?php } ?>
        					</td>
                            <td>
                            	<?php if($category['footer']==1) { ?>
                            <a href="<?php echo base_url(); ?>index.php/admin/menu/footer_display/<?php echo $category['id']; ?>/0" class="btn medium bg-green" title="">
                                <span class="button-content">Active</span>
                            </a>
                            <?php } else { ?>
                            		<a href="<?php echo base_url(); ?>index.php/admin/menu/footer_display/<?php echo $category['id']; ?>/1" class="btn medium bg-red" title="">
                                    <span class="button-content">Inactive</span>
                                </a>
                            <?php } ?>
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