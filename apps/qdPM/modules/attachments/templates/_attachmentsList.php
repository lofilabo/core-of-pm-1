<?php
/* TODO: LICENSE INFORMATION HERE */
?>
<?php

$html = '';

$related_attachments = array();
foreach ($attachments as $v)
{
 $file_path = sfConfig::get('sf_upload_dir') . '/attachments/' . $v['file'];
  
 if(is_file($file_path))
 {
   if(getimagesize($file_path))
   {
     $html .= '<tr><td>' . Attachments::getFileIcon($v['file'])  . ' ' . link_to( substr($v['file'],7), 'attachments/view?id=' . $v['id'], array('target'=>'_blank', 'absolute'=>true)) . '&nbsp;</td><td id="hide_in_email">&nbsp;' .  link_to(image_tag(public_path('images/icons/zoom.png', true),array('border'=>0)) . '&nbsp;' .  __('view'), 'attachments/view?id=' . $v['id'], array('target'=>'_blank', 'id'=>'attachments_view_link', 'absolute'=>true))  . '&nbsp;&nbsp;'  . link_to(image_tag(public_path('images/icons/download.png', true),array('border'=>0)) . '&nbsp;'.   __('download'), 'attachments/download?id=' . $v['id'], array('id'=>'attachments_download_link','absolute'=>true)) . '&nbsp;</td><td  width="100%">&nbsp;' . nl2br($v['info']) . '</td></tr>'  . "\n";
   }
   else
   {
     $html .= '<tr><td>' . Attachments::getFileIcon($v['file'])  . ' ' . link_to( substr($v['file'],7), 'attachments/download?id=' . $v['id'], array('absolute'=>true))  . '&nbsp;</td><td id="hide_in_email">&nbsp;'  . link_to(image_tag(public_path('images/icons/download.png', true),array('border'=>0)) . '&nbsp;'.   __('download'), 'attachments/download?id=' . $v['id'], array('id'=>'attachments_download_link','absolute'=>true)) . '&nbsp;</td><td width="100%">&nbsp;' . $v['info'] . '</td></tr>'  . "\n";
   } 
   
   $related_attachments[] = $v['id'];
 }
}

?>
<?php if(strlen($html)>0):?>

  <div class="table-scrollable table-attachments ">
  <table class="table table-hover  table-attachments">
    <thead>
    <tr>
      <th><?php echo __('Attachments') ?></th>
    </tr>
    </thead>
    <tbody>
      <?php echo $html; ?>
    </tbody>
  </table>
  </div>
  

  <?php echo input_hidden_tag('item_attachments',implode(',',$related_attachments)) ?>
<?php endif ?>


