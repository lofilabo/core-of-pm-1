<?php
/* TODO: LICENSE INFORMATION HERE */
?>
<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Discussions', 'doctrine');

/**
 * BaseDiscussions
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $projects_id
 * @property integer $users_id
 * @property integer $discussions_status_id
 * @property string $name
 * @property string $description
 * @property string $assigned_to
 * @property Projects $Projects
 * @property Users $Users
 * @property DiscussionsStatus $DiscussionsStatus
 * @property Doctrine_Collection $DiscussionsComments
 * 
 * @method integer             getId()                    Returns the current record's "id" value
 * @method integer             getProjectsId()            Returns the current record's "projects_id" value
 * @method integer             getUsersId()               Returns the current record's "users_id" value
 * @method integer             getDiscussionsStatusId()   Returns the current record's "discussions_status_id" value
 * @method string              getName()                  Returns the current record's "name" value
 * @method string              getDescription()           Returns the current record's "description" value
 * @method string              getAssignedTo()            Returns the current record's "assigned_to" value
 * @method Projects            getProjects()              Returns the current record's "Projects" value
 * @method Users               getUsers()                 Returns the current record's "Users" value
 * @method DiscussionsStatus   getDiscussionsStatus()     Returns the current record's "DiscussionsStatus" value
 * @method Doctrine_Collection getDiscussionsComments()   Returns the current record's "DiscussionsComments" collection
 * @method Discussions         setId()                    Sets the current record's "id" value
 * @method Discussions         setProjectsId()            Sets the current record's "projects_id" value
 * @method Discussions         setUsersId()               Sets the current record's "users_id" value
 * @method Discussions         setDiscussionsStatusId()   Sets the current record's "discussions_status_id" value
 * @method Discussions         setName()                  Sets the current record's "name" value
 * @method Discussions         setDescription()           Sets the current record's "description" value
 * @method Discussions         setAssignedTo()            Sets the current record's "assigned_to" value
 * @method Discussions         setProjects()              Sets the current record's "Projects" value
 * @method Discussions         setUsers()                 Sets the current record's "Users" value
 * @method Discussions         setDiscussionsStatus()     Sets the current record's "DiscussionsStatus" value
 * @method Discussions         setDiscussionsComments()   Sets the current record's "DiscussionsComments" collection
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDiscussions extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('discussions');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('projects_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('users_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('discussions_status_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
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
        $this->hasColumn('description', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('assigned_to', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Projects', array(
             'local' => 'projects_id',
             'foreign' => 'id'));

        $this->hasOne('Users', array(
             'local' => 'users_id',
             'foreign' => 'id'));

        $this->hasOne('DiscussionsStatus', array(
             'local' => 'discussions_status_id',
             'foreign' => 'id'));

        $this->hasMany('DiscussionsComments', array(
             'local' => 'id',
             'foreign' => 'discussions_id'));
    }
}
