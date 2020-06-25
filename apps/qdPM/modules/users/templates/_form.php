<?php
/* TODO: LICENSE INFORMATION HERE */
?>


<form name="users" class="form-horizontal" role="form"  autocomplete="off" id="users" action="<?php echo url_for('users/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<div class="modal-body">
  <div class="form-body">

<!--hidden fields to set off autocomplete since autocomplete tag ignoring-->  
<input style="display:none">
<input type="password" style="display:none">
  
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>

<?php echo $form->renderHiddenFields(false) ?>
<?php echo $form->renderGlobalErrors() ?>


  <div class="form-group">
  	<label class="col-md-3 control-label"> <?php echo $form['active']->renderLabel() ?></label>
  	<div class="col-md-9">
  		<div class="checkbox-list"><label class="checkbox-inline"><?php echo $form['active'] ?></label></div>
  	</div>
  </div>
  
  <div class="form-group">
  	<label class="col-md-3 control-label"> <?php echo $form['users_group_id']->renderLabel() ?></label>
  	<div class="col-md-9">
  		<?php echo $form['users_group_id'] ?>
  	</div>
  </div>
  
  <div class="form-group">
  	<label class="col-md-3 control-label"><span class="required">*</span> <?php echo $form['name']->renderLabel() ?></label>
  	<div class="col-md-9">
  		<?php echo $form['name'] ?>
  	</div>
  </div>
 
 <?php if($form->getObject()->isNew()){ ?> 
  <div class="form-group">
  	<label class="col-md-3 control-label"><span class="required">*</span> <?php echo $form['password']->renderLabel() ?></label>
  	<div class="col-md-9">
  		<?php echo $form['password'] ?>
  	</div>
  </div>
  <?php }else{ ?>
  
  <div class="form-group">
  	<label class="col-md-3 control-label"> <?php echo $form['new_password']->renderLabel() ?></label>
  	<div class="col-md-9">
  		<?php echo $form['new_password'] ?>
  	</div>
  </div>
  
  <?php }?> 
  
  
  <div class="form-group">
  	<label class="col-md-3 control-label"><span class="required">*</span> <?php echo $form['email']->renderLabel() ?></label>
  	<div class="col-md-9">
  		<?php echo $form['email'] ?>
      <div id="email_error" class="error"></div>
  	</div>
  </div>
  
  <?php echo ExtraFieldsList::renderFormFileds('users',$form->getObject(),$sf_user)?>
  
  <div class="form-group">
  	<label class="col-md-3 control-label"> <?php echo $form['photo']->renderLabel() ?></label>
  	<div class="col-md-9">
  		<?php echo $form['photo'] ?>
      <div><?php if(strlen($form['photo']->getValue())>0) echo renderUserPhoto($form['photo']->getValue())  . '<br>'. $form['remove_photo'] . ' ' . $form['remove_photo']->renderLabel() ?></div>
  	</div>
  </div>
  
  <div class="form-group">
  	<label class="col-md-3 control-label"> <?php echo $form['culture']->renderLabel() ?></label>
  	<div class="col-md-9">
  		<?php echo $form['culture'] ?>
  	</div>
  </div>

  </div>
</div>  


              
  <div class="modal-footer">    
    <input type="button" class="btn btn-primary" value="<?php echo __('Save')?>" id="submit_button" onClick="check_user_form('users','<?php echo url_for('users/checkUser' . (!$form->getObject()->isNew()? '?id=' . $form->getObject()->getId():'' )) ?>')"/>
    <button type="button" class="btn btn-default" data-dismiss="modal"> <?php echo __('Close') ?></button>
    <div>      
      <?php if($form->getObject()->isNew()) echo '&nbsp;&nbsp;' . $form['notify'] . '&nbsp;' . $form['notify']->renderLabel(); ?>
      <div id="loading" ></div>    
    </div>
  </div>'
  
</form>

<?php include_partial('global/formValidator',array('form_id'=>'users')); ?>

<script type="text/javascript">    
  $(function() {  
                 
     appHandleUniform()
      
    $("#submit_button").click(function() {
        $("#users").valid()                              
    });
                      
  });
</script> 
