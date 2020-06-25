<?php
/* TODO: LICENSE INFORMATION HERE */
?>
<?php $form->setDefault('bind_type',$sf_request->getParameter('bind_type')) ?>

<form class="form-horizontal" role="form"  id="extraFields" action="<?php echo url_for('extraFields/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<div class="modal-body">
  <div class="form-body">
  
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>

<?php echo $form->renderHiddenFields(false) ?>
<?php echo input_hidden_tag('bind_type',$sf_request->getParameter('bind_type')) ?>
<?php echo $form->renderGlobalErrors() ?>



<div class="form-group">
	<label class="col-md-3 control-label"><?php echo $form['name']->renderLabel() ?></label>
	<div class="col-md-9">
	<?php echo $form['name'] ?>	
	</div>
</div>

<div class="form-group">
	<label class="col-md-3 control-label"><?php echo $form['type']->renderLabel() ?></label>
	<div class="col-md-9">
	<?php echo $form['type'] ?>
  <span class="help-block" id="default_values_notes">
    
  </span>	
	</div>
</div>

<div class="form-group">
	<label class="col-md-3 control-label"><?php echo $form['sort_order']->renderLabel() ?></label>
	<div class="col-md-9">
	 <?php echo $form['sort_order'] ?>	
	</div>
</div>

<div class="form-group">
	<label class="col-md-3 control-label"><?php echo $form['display_in_list']->renderLabel() ?></label>
	<div class="col-md-9">
		<div class="checkbox-list"><label class="checkbox-inline"><?php echo $form['display_in_list'] ?></label></div>
	</div>
</div>

<div class="form-group">
	<label class="col-md-3 control-label"><?php echo $form['active']->renderLabel() ?></label>
	<div class="col-md-9">
	 <div class="checkbox-list"><label class="checkbox-inline"><?php echo $form['active'] ?></label></div>	
	</div>
</div>

  </div>
</div>

<?php echo ajax_modal_template_footer() ?>

</form>

<?php
$n = array();
$n['text'] = __('Simple input text field.');
$n['number'] = __('This field used for numbers.');
$n['textarea'] = __('Simple textarea field.');
$n['textarea_wysiwyg'] = __('WYSIWYG editor will be automatically added to this field.');
$n['date_dropdown'] = __('Date with dropdown select');
$n['date_time_dropdown'] = __('Date - Time with dropdown select');
?>

<script type="text/javascript">


  function renderFieldNotes(ftype)
  {
    var n = new Array();
    
    <?php
      foreach($n as $k=>$v)
      {
        echo 'n["' . $k . '"]="' . addslashes($v) . '";' . "\n";
      }
    ?>
    
    if(n[ftype])
    {
      return n[ftype]; 
    }
    else
    {
      return '';
    }
  }
  

  $(function() {                
    
    $("#extra_fields_type").change(function() {         
        $("#default_values_notes").html(renderFieldNotes($(this).val()));                                          
    });
    
    type = $('#extra_fields_type').val();
    
    $("#default_values_notes").html(renderFieldNotes(type));
          
  });
  
</script>

<?php include_partial('global/formValidator',array('form_id'=>'extraFields')); ?>
