
<div id="page-content-wrapper">
    <div id="page-title"><h3>Add Job</h3></div><!-- #page-title -->
    
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
            <h4 class="infobox-title"><?php echo $successMessage; ?></h4>
        </div>
        
    <?php
	}
	?>
                
                
    <br/>
    
<div id="page-content">
        <div class="example-box">
            <div class="example-code">
                <form id="job-form" action="<?php echo base_url(); ?>index.php/admin/jobs/add_job/" class="col-md-10 center-margin" method="post">
                    <div class="form-row">
                        <div class="form-label col-md-2">
                            <label for="">
                                Job Title:
                                <span class="required">*</span>
                            </label>
                        </div>
                        <div class="form-input col-md-3">
                            <input type="text" id="title" name="title" data-required="true" class="parsley-validated" value="<?php echo set_value('title'); ?>" maxlength="50">
                        </div>
                    </div>
                    
                    
                    <div class="form-row">
                        <div class="form-label col-md-2">
                            <label for="">
                                Job Category:
                                <span class="required">*</span>
                            </label>
                        </div>
                        <div class="form-input col-md-3">
                            <select name="category" nae="category" data-required="true" class="parsley-validated">
                            	<option value="">Select</option>
                                <?php
								foreach($categories as $category)
								{
									?>
                                    <option value="<?php echo $category['id']; ?>" <?php if(set_value('category')==$category['id']) echo 'selected'; ?>><?php echo $category['name']; ?></option>
                                    <?php
								}
								?>
                            </select>
                        </div>
                    </div>
                    
                    
                    <div class="form-row">
                        <div class="form-label col-md-2">
                            <label for="">
                                Location:
                                <span class="required">*</span>
                            </label>
                        </div>
                        <div class="form-input col-md-3">
                             <select name="location" id="location" data-required="true" class="parsley-validated">
                            	<option value="">Select</option>
                                <?php
								foreach($locations as $location)
								{
									?>
                                    <option value="<?php echo $location['id']; ?>" <?php if(set_value('location')==$location['id']) echo 'selected'; ?>><?php echo $location['name']; ?></option>
                                    <?php
								}
								?>
                            </select>
                        </div>
                    </div>
                    
                    
                    <div class="form-row">
                        <div class="form-label col-md-2">
                            <label for="">
                                Compensation:
                                <span class="required">*</span>
                            </label>
                        </div>
                        <div class="form-input col-md-3">
                            <select id="min_sal" name="min_sal" data-required="true" class="parsley-validated" style="width:45%">
                            	<option value="">Min</option>
                               <?php for($i=1;$i<=90;$i++)
							   { ?>
                               <option value="<?php echo $i; ?>" <?php if(set_value('min_sal')==$i) echo 'selected'; ?>><?php echo $i ?> lac</option>
							   <?php }
							   ?>
                             </select>
                             to
                             <select id="max_sal" name="max_sal" data-required="true" class="parsley-validated" style="width:45%">
                            	<option value="">Max</option>
                               <?php for($i=2;$i<=90;$i++)
							   { ?>
                               <option value="<?php echo $i; ?>" <?php if(set_value('max_sal')==$i) echo 'selected'; ?>><?php echo $i ?> lac</option>
							   <?php }
							   ?>
                             </select>
                                               
                        </div>
                    </div>
                    
                    
                    
                     <div class="form-row">
                        <div class="form-label col-md-2">
                            <label for="">
                                Experience:
                                <span class="required">*</span>
                            </label>
                        </div>
                        <div class="form-input col-md-3">
                            <select id="min_exp" name="min_exp" data-required="true" class="parsley-validated" style="width:45%">
                            	<option value="">Min</option>
                               <?php for($i=0;$i<=50;$i++)
							   { ?>
                               <option value="<?php echo $i; ?>" <?php if(set_value('min_sal')==$i) echo 'selected'; ?>><?php echo $i ?></option>
							   <?php }
							   ?>
                             </select>
                             to
                             <select id="max_exp" name="max_exp" data-required="true" class="parsley-validated" style="width:45%">
                            	<option value="">Max</option>
                               <?php for($i=1;$i<=50;$i++)
							   { ?>
                               <option value="<?php echo $i; ?>" <?php if(set_value('max_exp')==$i) echo 'selected'; ?>><?php echo $i ?></option>
							   <?php }
							   ?>
                             </select>
                                               
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-label col-md-2">
                            <label for="">
                                Job Type:
                                <span class="required">*</span>
                            </label>
                        </div>
                        <div class="form-input col-md-3">
                            <select name="jobtype" id="jobtype" data-required="true" class="parsley-validated" value="<?php echo set_value('jobtype'); ?>">
                            	<option value="">Select</option>
                                <option value="0" <?php if(set_value('jobtype')==0) echo 'selected'; ?>>Temporary</option>
                                <option value="1" <?php if(set_value('jobtype')==1) echo 'selected'; ?>>Permanent</option>
                            </select>
                        </div>
                    </div>
                    
                    
                     <div class="form-row">
                        <div class="form-label col-md-2">
                            <label for="">
                                Job Code:
                                <span class="required">*</span>
                            </label>
                        </div>
                        <div class="form-input col-md-3">
                            <input type="text" id="jobcode" name="jobcode" data-required="true" class="parsley-validated" value="<?php echo set_value('jobcode'); ?>" maxlength="10">
                        </div>
                    </div>
                    
                    
                    <div class="form-row">
                        <div class="form-label col-md-2">
                            <label for="">
                                Description:
                                <span class="required">*</span>
                            </label>
                        </div>
                        <div class="form-input col-md-9">
                            <textarea id="desc" name="desc" data-required="true" class="ckeditor parsley-validated" rows="10" maxlength="1000"><?php echo set_value('desc'); ?></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-label col-md-2">
                            <label for="">
                                Email:
                                <span class="required">*</span>
                            </label>
                        </div>
                        <div class="form-input col-md-3">
                            <input type="text" id="email" name="email" data-required="true" class="parsley-validated" value="<?php echo set_value('email'); ?>" maxlength="75">
                        </div>
                    </div>
                   
                    <div class="form-row">
                        <div class="form-input col-md-3 col-md-offset-2">
                               <input type="submit" name="submit" value="Add Job" class="btn medium primary-bg radius-all-4 button-content" id="demo-form-2-valid" onclick="javascript:$('#job-form').parsley( 'validate' );">                    
                        </div>
                    </div>
                </form>
            </div>
        </div>
 </div>            
            


</div><!-- #page-content-wrapper -->