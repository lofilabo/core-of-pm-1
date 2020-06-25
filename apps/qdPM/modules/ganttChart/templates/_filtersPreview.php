<?php
/* TODO: LICENSE INFORMATION HERE */
?>
<div class="panel panel-info filter-preview">
<div class="panel-heading"><?php include_component('ganttChart','filters') ?></div>
<?php if(count($filter_by)>0): ?>
<ul class="list-group">
<?php 

foreach($filter_tables as $table=>$title): 

if(!isset($filter_by[$table])) continue;

?>    
    <li class="list-group-item filter-preview-item">
      <div class="filterPreviewBox">
        <table>
          <tr>
            <td valign="top" style="padding-top: 2px;"><?php echo link_to('<i class="fa fa-times"></i>','ganttChart/index?remove_filter=' . $table . ($params? '&' . $params:''),array('title'=>__('Remove Filter'),'class'=>'btn btn-default btn-xs'))?></td>
            <td valign="top"><div id="filtersPreviewMenuBox">
            <?php 
                                      
              switch($table)
              {
                case 'TasksStatus':  $m =  app::getFilterMenuStatusItemsByTable(array(),$table,'Status','ganttChart/index',$params,$filter_by[$table]);
                  break;
                case 'TasksAssignedTo':  $m =  app::getFilterMenuUsers(array(),$table,'Assigned To','ganttChart/index',$params,$filter_by[$table]);
                  break;
                case 'TasksCreatedBy':  $m =  app::getFilterMenuUsers(array(),$table,'Created By','ganttChart/index',$params,$filter_by[$table]);
                  break;
                case 'Projects':  $m =  app::getFilterProjects(array(),'ganttChart/index',$params,$filter_by[$table],$sf_user); 
                  break;                  
                default: $m = app::getFilterMenuItemsByTable(array(),$table,$title,'ganttChart/index',$params,$filter_by[$table],$sf_user);                 
                  break;
              }
            
              
              echo renderYuiMenu('filtersMenu' . $table,$m);
                 
                
            ?></div></td>
            <td valign="middle" class="selectedFilterItems"><?php echo (strstr($table,'extraField')? $filter_by[$table] : app::getNameByTableId($table,$filter_by[$table]))?></td>
          </tr>
        </table>
      </div>
      
      <script type="text/javascript">
          YAHOO.util.Event.onContentReady("filtersMenu<?php echo $table ?>", function () {
              var oMenuBar = new YAHOO.widget.MenuBar("filtersMenu<?php echo $table ?>", {autosubmenudisplay: true,hidedelay: 350,submenuhidedelay: 0,scrollincrement:10,showdelay: 150,keepopen: true,lazyload: true });
              oMenuBar.render();
          });
      </script>
      
    </li>
<?php endforeach ?>    
</ul>
<?php endif ?>
</div>
