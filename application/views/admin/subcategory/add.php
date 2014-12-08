
<div id="page-content-wrapper">
    <div id="page-title"><h3>Add Sub Category</h3></div><!-- #page-title -->
    
    
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
            <p>Category has been successfully added.</p>
        </div>
        
    <?php
	}
	?>
                
                
    <br/>
    
<div id="page-content">
        <div class="example-box">
            <div class="example-code">
                <form id="subcategory-form" action="<?php echo base_url(); ?>subcategory/add/" class="col-md-10 center-margin" method="post">
                    <div class="form-row">
                        <div class="form-label col-md-2">
                            <label for="">
                                Select Category :
                                <span class="required">*</span>
                            </label>
                        </div>
                        <div class="form-input col-md-3">
                            <select name="category_id" id="category_id" data-required="true" class="parsley-validated">
                            	<option value="">Choose Category</option>
                                <?php
								foreach($categories as $category)
								{
									?>
                                    <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                    <?php
								}
								?>
                            </select>
                        </div>
                    </div>
                    
                    
                     <div class="form-row">
                        <div class="form-label col-md-2">
                            <label for="">
                                Sub Category :
                                <span class="required">*</span>
                            </label>
                        </div>
                        <div class="form-input col-md-3">
                            <input type="text" id="subcategory_name" name="subcategory_name" data-required="true" class="parsley-validated" value="<?php echo set_value('subcategory_name'); ?>">
                        </div>
                    </div>
                   
                    <div class="form-row">
                        <div class="form-input col-md-3 col-md-offset-2">
                               <input type="submit" name="submit" value="Add Sub Category" class="btn medium primary-bg radius-all-4 button-content" id="demo-form-2-valid" onclick="javascript:$('#subcategory-form').parsley( 'validate' );">                    
                        </div>
                    </div>
                </form>
            </div>
        </div>
 </div>            
            


</div><!-- #page-content-wrapper -->