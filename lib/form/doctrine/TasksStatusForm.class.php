<?php
/* TODO: LICENSE INFORMATION HERE */
?>
<?php

/**
 * TasksStatus form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TasksStatusForm extends BaseTasksStatusForm
{
  public function configure()
  {  
    $this->widgetSchema['active'] = new sfWidgetFormInputCheckbox(array(),array('value'=>1));
    $this->setDefault('active',1);
    
    $this->widgetSchema['default_value'] = new sfWidgetFormInputCheckbox(array(),array('value'=>1));
    $this->setDefault('default_value',0);
    
    $this->widgetSchema['group'] = new sfWidgetFormChoice(array('choices'=>app::getStatusGroupsChoices()), array('class'=>'form-control'));
    
    $this->widgetSchema['name']->setAttribute('class','form-control required');
    $this->widgetSchema['sort_order']->setAttribute('class','form-control input-xsmall');    

    $this->widgetSchema->setLabels(array('status_group'=>'Group',
                                         'sort_order'=>'Sort Order',
                                         'default_value'=>'Default?',                                                                                  
                                         'active'=>'Active?'));
  }
}
