<?php
use Migrations\AbstractMigration;
require_once 'c:users/david/vendor/autoload.php';
class CreateEnlaceSeed extends AbstractMigration
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
	$populator->addEntity('bookmarks',20,[
	'titulo'=>function() use ($faker){
		return $faker->sentence($nbWords=2,$variableNbWords=true);
	},'descripcion'=>function() use ($faker){
		return $faker->paragraph($nbSentences=2,$variableNbSentences=true);
	},'url'=>function() use ($faker){
		return $faker->url;
	},'created'=>function () use ($faker){
		return $faker->dateTimeBetween($starDate='now',$endDate='now');
		
	},'modified'=>function () use ($faker){
		return $faker->dateTimeBetween($starDate='now',$endDate='now');
		
	},'user_id'=>function (){
		return rand(1,12);
	}
	]);
	$populator->execute();
	
    }
}
