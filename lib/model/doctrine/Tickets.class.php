<?php
/* TODO: LICENSE INFORMATION HERE */
?>
<?php

/**
 * Tickets
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Tickets extends BaseTickets
{
  public static function hasViewOwnAccess($sf_user,$tickets,$project=false)
  {
    if($project)
    {
      $has_access =Users::hasAccess('view_own','tickets',$sf_user,$project->getId());
    }
    else
    {
      $has_access =Users::hasAccess('view_own','tickets',$sf_user);
    }
     
    if($has_access)
    {      
      if(!in_array($tickets->getDepartmentsId(),Departments::getDepartmentIdByUserId($sf_user->getAttribute('id'))) and $tickets->getUsersId()!=$sf_user->getAttribute('id'))
      {
        return false;
      }
      else
      {
        return true;
      }
    }
    else
    {
      return true;
    }
  }
  
  public static function checkViewOwnAccess($c,$sf_user,$tickets,$project=false)
  {
    if($project)
    {
      $has_access =Users::hasAccess('view_own','tickets',$sf_user,$project->getId());
    }
    else
    {
      $has_access =Users::hasAccess('view_own','tickets',$sf_user);
    }
     
    if($has_access)
    {      
      if(!in_array($tickets->getDepartmentsId(),Departments::getDepartmentIdByUserId($sf_user->getAttribute('id'))) and $tickets->getUsersId()!=$sf_user->getAttribute('id'))
      {
        $c->redirect('accessForbidden/index');
      }
    }
  }
    
  
  public static function sendNotification($c,$tickets,$send_to,$sf_user, $extra_notification = array())
  {
    if(count($send_to)==0) return false;
    
    foreach($send_to as $type=>$users)
    {
      switch($type)
      {
        case 'status': $subject = t::__('Tickets Status Updated');
          break;
        default: $subject = t::__('New Ticket');
          break;
      }
      
      $to = array();
      
      $to = array();
      foreach($users as $v)
      {
        if($u = Doctrine_Core::getTable('Users')->find($v))
        {
          $to[$u->getEmail()]=$u->getName();
        }
      }                  
      
      foreach($extra_notification as $v)
      {
        if($u = Doctrine_Core::getTable('Users')->find($v))
        {
          $to[$u->getEmail()]=$u->getName();
        }
      }
          
      $user = $sf_user->getAttribute('user');
      
      $from[$user->getEmail()] = $user->getName();            
      $to[$user->getEmail()] = $user->getName();
      $to[$tickets->getUsers()->getEmail()] = $tickets->getUsers()->getName();
      
      if(sfConfig::get('app_send_email_to_owner')=='off')
      {
        unset($to[$user->getEmail()]);             
      }
       
      $subject .= ': ' . $tickets->getProjects()->getName() . ' - '  .  $tickets->getName() . ($tickets->getTicketsStatusId()>0 ? ' [' . $tickets->getTicketsStatus()->getName() . ']':'');
      $body  = $c->getComponent('tickets','emailBody',array('tickets'=>$tickets));
                  
      Users::sendEmail($from,$to,$subject,$body,$sf_user);
    }                
  }
    
  public static function addFiltersToQuery($q,$filters)
  {    
    $count_e = 0;
    
    foreach($filters as $table=>$fstr)
    {
      $ids = explode(',',$fstr);
      
      switch($table)
      {
        case 'TicketsStatus':
            $q->whereIn('t.tickets_status_id',$ids);
          break;
        case 'TicketsTypes':
            $q->whereIn('t.tickets_types_id',$ids);
          break;

        case 'Departments':
            $q->whereIn('t.departments_id',$ids);
          break;

        case 'TicketsCreatedBy':
            $filter_sql_array = array();
            foreach($ids as $id)
            {
              $filter_sql_array[] = 'find_in_set(' . $id . ',t.users_id)';
            }
            
            $q->addWhere(implode(' or ',$filter_sql_array));
          break; 
          
        case 'Projects':
            $q->whereIn('t.projects_id',$ids);
          break; 

        case 'ProjectsStatus':
            $q->whereIn('p.projects_status_id',$ids);
          break;
        case 'ProjectsTypes':
            $q->whereIn('p.projects_types_id',$ids);
          break;        
      }
      
    } 
          
    return $q;  
  }
  
  public static function getReportType($request)
  {
    if((int)$request->getParameter('projects_id')>0)
    {
      return 'filter' . $request->getParameter('projects_id');
    }
    else
    {
      return 'filter';
    }
  }
  

  
  public static function getDefaultFilter($request,$sf_user)
  {      
    $f = array();
  
    if(($v = app::getDefaultValueByTable('TicketsStatus'))>0)
    {
      $f['TicketsStatus'] = $v;
    }
                
    return $f;
  }
  
  public static function  getListingOrderByType($q,$type)
  {
   switch($type)
   {
     case 'date_added':           $q->orderBy('t.created_at desc');
       break;
     case 'date_last_commented':  $q->orderBy('t.last_comment_date desc');
       break;
     case 'name':                 $q->orderBy('LTRIM(p.name), LTRIM(t.name)');
       break;
     case 'priority':             $q->orderBy('LTRIM(p.name), tp.sort_order, LTRIM(tp.name), LTRIM(t.name)');
       break;                                  
     case 'status':               $q->orderBy('LTRIM(p.name),  ts.sort_order, LTRIM(ts.name),  LTRIM(t.name)');
       break;
     case 'type':                 $q->orderBy('LTRIM(p.name), tt.sort_order, LTRIM(tt.name),  LTRIM(t.name)');
       break;
     case 'group':                $q->orderBy('LTRIM(p.name), tg.sort_order, LTRIM(tg.name),  LTRIM(t.name)');
       break; 
     case 'department':           $q->orderBy('LTRIM(p.name), td.sort_order, LTRIM(td.name),  LTRIM(t.name)');
       break;
     default:                     $q->orderBy('LTRIM(p.name), ts.sort_order, LTRIM(ts.name),  LTRIM(t.name)');
      break;             
   }
   
   return $q;
  }
  
}
