<?php
/* TODO: LICENSE INFORMATION HERE */
?>
<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('UserReports', 'doctrine');

/**
 * BaseUserReports
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
 * @property string $assigned_to
 * @property string $tasks_status_id
 * @property string $tasks_type_id
 * @property string $tasks_label_id
 * @property date $due_date_from
 * @property date $due_date_to
 * @property date $created_from
 * @property date $created_to
 * @property date $closed_from
 * @property date $closed_to
 * @property integer $sort_order
 * @property Users $Users
 * 
 * @method integer     getId()                 Returns the current record's "id" value
 * @method integer     getUsersId()            Returns the current record's "users_id" value
 * @method string      getName()               Returns the current record's "name" value
 * @method integer     getDisplayOnHome()      Returns the current record's "display_on_home" value
 * @method string      getProjectsId()         Returns the current record's "projects_id" value
 * @method string      getProjectsTypeId()     Returns the current record's "projects_type_id" value
 * @method string      getProjectsStatusId()   Returns the current record's "projects_status_id" value
 * @method string      getAssignedTo()         Returns the current record's "assigned_to" value
 * @method string      getTasksStatusId()      Returns the current record's "tasks_status_id" value
 * @method string      getTasksTypeId()        Returns the current record's "tasks_type_id" value
 * @method string      getTasksLabelId()       Returns the current record's "tasks_label_id" value
 * @method date        getDueDateFrom()        Returns the current record's "due_date_from" value
 * @method date        getDueDateTo()          Returns the current record's "due_date_to" value
 * @method date        getCreatedFrom()        Returns the current record's "created_from" value
 * @method date        getCreatedTo()          Returns the current record's "created_to" value
 * @method date        getClosedFrom()         Returns the current record's "closed_from" value
 * @method date        getClosedTo()           Returns the current record's "closed_to" value
 * @method integer     getSortOrder()          Returns the current record's "sort_order" value
 * @method Users       getUsers()              Returns the current record's "Users" value
 * @method UserReports setId()                 Sets the current record's "id" value
 * @method UserReports setUsersId()            Sets the current record's "users_id" value
 * @method UserReports setName()               Sets the current record's "name" value
 * @method UserReports setDisplayOnHome()      Sets the current record's "display_on_home" value
 * @method UserReports setProjectsId()         Sets the current record's "projects_id" value
 * @method UserReports setProjectsTypeId()     Sets the current record's "projects_type_id" value
 * @method UserReports setProjectsStatusId()   Sets the current record's "projects_status_id" value
 * @method UserReports setAssignedTo()         Sets the current record's "assigned_to" value
 * @method UserReports setTasksStatusId()      Sets the current record's "tasks_status_id" value
 * @method UserReports setTasksTypeId()        Sets the current record's "tasks_type_id" value
 * @method UserReports setTasksLabelId()       Sets the current record's "tasks_label_id" value
 * @method UserReports setDueDateFrom()        Sets the current record's "due_date_from" value
 * @method UserReports setDueDateTo()          Sets the current record's "due_date_to" value
 * @method UserReports setCreatedFrom()        Sets the current record's "created_from" value
 * @method UserReports setCreatedTo()          Sets the current record's "created_to" value
 * @method UserReports setClosedFrom()         Sets the current record's "closed_from" value
 * @method UserReports setClosedTo()           Sets the current record's "closed_to" value
 * @method UserReports setSortOrder()          Sets the current record's "sort_order" value
 * @method UserReports setUsers()              Sets the current record's "Users" value
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUserReports extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('user_reports');
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
        $this->hasColumn('assigned_to', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('tasks_status_id', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('tasks_type_id', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('tasks_label_id', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('due_date_from', 'date', 25, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('due_date_to', 'date', 25, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('created_from', 'date', 25, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('created_to', 'date', 25, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('closed_from', 'date', 25, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('closed_to', 'date', 25, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
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
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Users', array(
             'local' => 'users_id',
             'foreign' => 'id'));
    }
}