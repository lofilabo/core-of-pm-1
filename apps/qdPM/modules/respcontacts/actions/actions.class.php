<?php
/* TODO: LICENSE INFORMATION HERE */
?>
<?php

/**
 * things actions.
 *
 * @package    sf_sandbox
 * @subpackage tickets
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class respcontactsActions extends sfActions
{


  
  public function executeIndex(sfWebRequest $request)
  {
     //echo("Doing My Thingle-pingle");
     //die;
  	  $this->discussions_list = array(1,2,3,4);
      var_dump( $this->discussions_list );
      //die;
  }

  
}
