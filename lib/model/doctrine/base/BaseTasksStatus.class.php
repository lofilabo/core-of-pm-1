<?php
/* TODO: LICENSE INFORMATION HERE */
?>
<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('TasksStatus', 'doctrine');

/**
 * BaseTasksStatus
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property string $group
 * @property integer $sort_order
 * @property integer $default_value
 * @property integer $active
 * @property Doctrine_Collection $Tasks
 * @property Doctrine_Collection $TasksComments
 * 
 * @method integer             getId()            Returns the current record's "id" value
 * @method string              getName()          Returns the current record's "name" value
 * @method string              getGroup()         Returns the current record's "group" value
 * @method integer             getSortOrder()     Returns the current record's "sort_order" value
 * @method integer             getDefaultValue()  Returns the current record's "default_value" value
 * @method integer             getActive()        Returns the current record's "active" value
 * @method Doctrine_Collection getTasks()         Returns the current record's "Tasks" collection
 * @method Doctrine_Collection getTasksComments() Returns the current record's "TasksComments" collection
 * @method TasksStatus         setId()            Sets the current record's "id" value
 * @method TasksStatus         setName()          Sets the current record's "name" value
 * @method TasksStatus         setGroup()         Sets the current record's "group" value
 * @method TasksStatus         setSortOrder()     Sets the current record's "sort_order" value
 * @method TasksStatus         setDefaultValue()  Sets the current record's "default_value" value
 * @method TasksStatus         setActive()        Sets the current record's "active" value
 * @method TasksStatus         setTasks()         Sets the current record's "Tasks" collection
 * @method TasksStatus         setTasksComments() Sets the current record's "TasksComments" collection
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTasksStatus extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('tasks_status');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
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
        $this->hasColumn('group', 'string', 64, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 64,
             ));
        $this->hasColumn('sort_order', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('default_value', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('active', 'integer', 1, array(
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
        $this->hasMany('Tasks', array(
             'local' => 'id',
             'foreign' => 'tasks_status_id'));

        $this->hasMany('TasksComments', array(
             'local' => 'id',
             'foreign' => 'tasks_status_id'));
    }
}
