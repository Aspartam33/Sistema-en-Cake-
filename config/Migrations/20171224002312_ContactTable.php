<?php
use Migrations\AbstractMigration;

class ContactTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
		$table=$this->table('Contacts');
	$table->addColumn('first_name','string',array('limit'=>100));
	$table->addColumn('apellido','string',array('limit'=>100));
	 $table->addColumn('email','string',array('limit'=>100));
	 $table->addColumn('asunto','string',array('limit'=>100));
	 $table->addColumn('Descripcion','string',array('limit'=>100));
	 $table->addColumn('created','datetime');
	 $table->addColumn('user_id','integer',array('signed'=>'disable'));
		$table->addForeignKey('user_id','users','id',array('delete'=>'CASCADE','update'=>'NO_ACTION'));
	  $table->create();
    }
}
