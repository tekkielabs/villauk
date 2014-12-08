<script type="text/javascript" src="<?php echo base_url(); ?>admin_assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>admin_assets/ckeditor/config.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>admin_assets/ckeditor/contents.css"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>admin_assets/ckeditor/styles.js"></script>

<div id="page-content-wrapper">
    <div id="page-title"><h3>Edit Page</h3></div><!-- #page-title -->
    
    
    <?php 
	if($errorMessage!='')
	{
    ?>
    	<div class="infobox infobox-close-wrapper error-bg mrg0A">
            <a href="#" title="Close Message" class="glyph-icon infobox-close icon-remove"></a>
            <div class="bg-red large btn info-icon">
                <i class="glyph-icon icon-remove"></i>
            </div>
            <h4 class="infobox-title">Alert!</h4>
            <p><?php echo $errorMessage; ?></p>
        </div>
        
    <?php
	}
	?>
            
     
     <?php 
	if($successMessage!='')
	{
    ?>       
       <div class="infobox bg-green">
            <div class="large btn bg-white info-icon">
                <i class="glyph-icon icon-ok-sign"></i>
            </div>
            <h4 class="infobox-title">All ok, that is great!</h4>
            <p>Menu has been successfully edited.</p>
        </div>
        
    <?php
	}
	?>
                
                
    <br/>
    
<div id="page-content">
        <div class="example-box">
            <div class="example-code">
                <form id="menu-form" action="<?php echo base_url(); ?>index.php/admin/pages/edit/<?php echo $this->uri->segment(4); ?>" class="col-md-10 center-margin" method="post">
                    <div class="form-row">
                        <div class="form-label col-md-2">
                            <label for="">
                                Title:
                                <span class="required">*</span>
                            </label>
                        </div>
                         <div class="form-input col-md-3">
                            <input type="text" name="title" value="<?php echo $page_info['title']; ?>" />
                            
                        </div>
                       
                    </div>
                     <div class="form-row">
                     <div class="form-label col-md-2">
                            <label for="">
                                Page Description:
                                <span class="required">*</span>
                            </label>
                        </div>
                         <div class="form-input col-md-9">
                            <textarea name="desc" cols="50" rows="20" class="ckeditor"><?php echo $page_info['desc']; ?></textarea>
                        </div>
                    </div>
                   
                    <div class="form-row">
                        <div class="form-input col-md-3 col-md-offset-2">
                               <input type="submit" name="submit" value="Edit Page" class="btn medium primary-bg radius-all-4 button-content" id="demo-form-2-valid" onclick="javascript:$('#menu-form').parsley( 'validate' );">                    
                        </div>
                    </div>
                </form>
            </div>
        </div>
 </div>            
            


</div><!-- #page-content-wrapper -->