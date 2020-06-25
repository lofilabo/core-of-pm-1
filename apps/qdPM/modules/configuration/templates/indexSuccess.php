<?php
/* TODO: LICENSE INFORMATION HERE */
?>
<?php
  
  if($sf_request->hasParameter('type'))
  {
    $default_selector = array();
    $default_selector['off'] = __('No');
    $default_selector['on'] = __('Yes');
  
    echo form_tag('configuration/index',array('enctype'=>'multipart/form-data','class'=>'form-horizontal')) . input_hidden_tag('type', $sf_request->getParameter('type')) . '<div class="form-body">';
    include_partial('configuration/' . $sf_request->getParameter('type'),array('default_selector'=>$default_selector));
    echo '<br>' . submit_tag(__('Save')) . '</div></form>';
  }
  
  
  
