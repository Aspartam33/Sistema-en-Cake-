<?php
use Migrations\AbstractMigration;
use Cake\Auth\DeafultPasswordHasher;
require_once 'c:users/david/vendor/autoload.php';
class CreateAdminSeedMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
		$faker= Faker\Factory::create();
	$populator= new Faker\ORM\CakePHP\Populator($faker);
	$populator->addEntity('Usuarios',1,[
	'first_name'=>'lisbeth',
	'apellido'=>'Cacua',
	'email'=>'lisbbcc@correp.com',
	'password'=>'123abc',
	'role'=>'admin','act'=>1,
	'created'=>function () use ($faker){
		return $faker->dateTimeBetween($starDate='now',$endDate='now');
		
	},'modified'=>function () use ($faker){
		return $faker->dateTimeBetween($starDate='now',$endDate='now');
		
	}]);
    $populator->execute();}
}
?>