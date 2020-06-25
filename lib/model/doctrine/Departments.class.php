<?php
/* TODO: LICENSE INFORMATION HERE */
?>
<?php

/**
 * Departments
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Departments extends BaseDepartments
{
  public static function getTicketsTypesJsList()
  {
    $departments = Doctrine_Core::getTable('Departments')
      ->createQuery('a')
      ->orderBy('sort_order, name')
      ->execute();
      
    $html = '
      <script>
        var departments_tickets_types = new Array();
    ';  
    
    foreach($departments as $v)
    {
      $html .= 'departments_tickets_types[' . $v->getId() .']="' . $v->getTicketsTypes() . '";' . "\n";
    }
  
    $html .= '</script>';
    
    return $html;
  }

  public static function getChoices($public_status = array(1,3))
  {
    $l = Doctrine_Core::getTable('Departments')
          ->createQuery()
          ->addWhere('active=1')
          ->whereIn('public_status',$public_status)
          ->orderBy('sort_order, name')
          ->fetchArray();
    
    $choices = array();
                            
    foreach($l as $v)
    {
      $choices[$v['id']] = $v['name'];
    }
    
    return $choices;
  }

  public static function getChoicesByProject($projects)
  {
    $choices = array();
    if(strlen($projects->getTeam())>0)
    {                        
      if(strlen($projects->getDepartments())>0)
      {
        $departments = Doctrine_Core::getTable('Departments')->createQuery()->addWhere('active=1')->whereIn('public_status',array(1,3))->whereIn('id',explode(',',$projects->getDepartments()))->orderBy('sort_order,name')->execute();
      }
      else
      {
        $departments = Doctrine_Core::getTable('Departments')->createQuery()->addWhere('active=1')->whereIn('public_status',array(1,3))->whereIn('users_id',explode(',',$projects->getTeam()))->orderBy('sort_order,name')->execute();
      }
      
      foreach($departments as $v)
      {
        $choices[$v->getId()] = $v->getName();
      }
                  
    }
    
    return $choices;
  }
  
  public static function getPublicStatusList()
  {
    $list = array();
    $list[1] = t::__('Use for public tickets');
    $list[2] = t::__('Only for public tickets');
    $list[3] = t::__('Don\'t use for public tickets');
  
    return $list;
  }
  
  public static function getDepartmentIdByUserId($id)
  {
    $departments = Doctrine_Core::getTable('Departments')->createQuery()->addWhere('users_id=?',$id)->execute();
    
    $l = array(0);
    foreach($departments as $d)
    {
      $l[] = $d->getId();
    }
    
    return $l;
    
  }
}
