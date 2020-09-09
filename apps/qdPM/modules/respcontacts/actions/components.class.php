<?php
/* TODO: LICENSE INFORMATION HERE */
?>
<?php

class respcontactsComponents extends sfComponents
{
  public function executeListing(sfWebRequest $request)
  {
      $this->discussions_list = array(1,2,3,4);
      var_dump( $this->discussions_list );
      die;
  }
  
  public function executeFilters(sfWebRequest $request)
  {  
    
  }
      
  public function executeDetails()
  {
       
  }
  
  public function executeEmailBody()
  {
       
  }
  
  
  public function executeRelatedTicketsToTasks()
  {          
  }
}
