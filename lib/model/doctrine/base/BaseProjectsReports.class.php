<?php
/* TODO: LICENSE INFORMATION HERE */
?>
<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('ProjectsReports', 'doctrine');

/**
 * BaseProjectsReports
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $users_id
 * @property string $name
 * @property integer $display_on_home
 * @property string $projects_id
 * @property string $projects_type_id
 * @property string $projects_status_id
 * @property integer $in_team
 * @property integer $sort_order
 * @property integer $display_in_menu
 * @property integer $visible_on_home
 * @property Users $Users
 * 
 * @method integer         getId()                 Returns the current record's "id" value
 * @method integer         getUsersId()            Returns the current record's "users_id" value
 * @method string          getName()               Returns the current record's "name" value
 * @method integer         getDisplayOnHome()      Returns the current record's "display_on_home" value
 * @method string          getProjectsId()         Returns the current record's "projects_id" value
 * @method string          getProjectsTypeId()     Returns the current record's "projects_type_id" value
 * @method string          getProjectsStatusId()   Returns the current record's "projects_status_id" value
 * @method integer         getInTeam()             Returns the current record's "in_team" value
 * @method integer         getSortOrder()          Returns the current record's "sort_order" value
 * @method integer         getDisplayInMenu()      Returns the current record's "display_in_menu" value
 * @method integer         getVisibleOnHome()      Returns the current record's "visible_on_home" value
 * @method Users           getUsers()              Returns the current record's "Users" value
 * @method ProjectsReports setId()                 Sets the current record's "id" value
 * @method ProjectsReports setUsersId()            Sets the current record's "users_id" value
 * @method ProjectsReports setName()               Sets the current record's "name" value
 * @method ProjectsReports setDisplayOnHome()      Sets the current record's "display_on_home" value
 * @method ProjectsReports setProjectsId()         Sets the current record's "projects_id" value
 * @method ProjectsReports setProjectsTypeId()     Sets the current record's "projects_type_id" value
 * @method ProjectsReports setProjectsStatusId()   Sets the current record's "projects_status_id" value
 * @method ProjectsReports setInTeam()             Sets the current record's "in_team" value
 * @method ProjectsReports setSortOrder()          Sets the current record's "sort_order" value
 * @method ProjectsReports setDisplayInMenu()      Sets the current record's "display_in_menu" value
 * @method ProjectsReports setVisibleOnHome()      Sets the current record's "visible_on_home" value
 * @method ProjectsReports setUsers()              Sets the current record's "Users" value
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseProjectsReports extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('projects_reports');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('users_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('display_on_home', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('projects_id', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('projects_type_id', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('projects_status_id', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('in_team', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('sort_order', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('display_in_menu', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('visible_on_home', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 1,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Users', array(
             'local' => 'users_id',
             'foreign' => 'id'));
    }
}