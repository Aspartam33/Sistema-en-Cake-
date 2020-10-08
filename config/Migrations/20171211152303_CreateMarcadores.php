<?php
use Migrations\AbstractMigration;

class CreateMarcadores extends AbstractMigration
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
        $table = $this->table('marcadores');
        $table->addColumn('titulo', 'string', [
            'default' => null,
            'limit' => 120,
            'null' => false,
        ]);
        $table->addColumn('descripcion', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('url', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
		$table->addColumn('usuario_id','integer',array('signed'=>'disable'));
		$table->addForeignKey('usuario_id','usuarios','id',array('delete'=>'CASCADE','update'=>'NO_ACTION'));
        $table->create();
		
		
		
    }
}
