<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\BookmarksTable|\Cake\ORM\Association\HasMany $Bookmarks
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
	 public function buildRules(RulesChecker $reglas){
		 $reglas->add($reglas->isUnique(['email'],'el correo se encuentra en uso'));
		 return $reglas;
	 }
	 public function validationDefault(Validator $validator){
		 
		 $validator->add('id','valid',['rule'=>'numeric']);
		 $validator->notEmpty('id','create');
		 
		 $validator->requirePresence('first_name','create');
		 $validator->notEmpty('first_name','no deben haber campos vacios');
		 $validator->requirePresence('apellido','create');
		 $validator->notEmpty('apellido','no deben haber campos vacios');
		 $validator->requirePresence('password','create');
		 $validator->notEmpty('password','no deben haber campos vacios','create');
		 $validator->requirePresence('email','create');
		 $validator->notEmpty('email', 'no deben haber campos vacios');
		 $validator->add('email','valid',['rule'=>'email','message'=>'formato invalido, el valido es user@abc.net']);
		 
		 
		 return $validator;
	 }
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Bookmarks', [
            'foreignKey' => 'user_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function recoverPassword($id){
		$user=$this->get($id);
		return $user->password;
	}
	public function findAuth(\Cake\ORM\Query $query, array $options){
		return $query->select(['first_name','apellido','email','role']);
		return $query->where(['Users.act'=>1]);
				
				
	}
	public function beforeDelete($event,$entity,$options){
		//exit('wait henny');
		if($entity->role=='admin')
			return false;
		else return true;
	}
	

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
   // public function buildRules(RulesChecker $rules)
    
}
