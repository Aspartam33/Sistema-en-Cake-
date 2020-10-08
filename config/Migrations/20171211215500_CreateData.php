<?php
use Migrations\AbstractMigration;
require_once 'c:users/david/vendor/autoload.php';
class CreateData extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {$faker= Faker\Factory::create();
	$populator= new Faker\ORM\CakePHP\Populator($faker);
	$populator->addEntity('usuarios',12,[
	'first_name'=>function() use ($faker){
		return $faker->firstName();
	},'apellido'=>function() use ($faker){
		return $faker->lastName();
	},
	'email'=>function() use ($faker){
		return $faker->safeEmail();
	},
	'password'=>'abc2334',
	'role'=>'user',
	'act'=>function(){
		return rand(1,0);
	},'created'=>function () use ($faker){
		return $faker->dateTimeBetween($starDate='now',$endDate='now');
		
	},'modified'=>function () use ($faker){
		return $faker->dateTimeBetween($starDate='now',$endDate='now');
		
	}]

	);
	$populator->execute();
    }
}
