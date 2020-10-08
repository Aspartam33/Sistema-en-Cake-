<?php
use Migrations\AbstractMigration;

class CreateUsuariosTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {$table=$this->table('usuarios');
	$table->addColumn('first_name','string',array('limit'=>100));
	$table->addColumn('apellido','string',array('limit'=>100));
	 $table->addColumn('email','string',array('limit'=>100));
		  
		  $table->addColumn('password','string');
		  $table->addColumn('role','string',array());
		  $table->addColumn('act','boolean');
		  $table->addColumn('created','datetime');
		  $table->addColumn('modified','datetime');
		  $table->create();
		  
    }
}
