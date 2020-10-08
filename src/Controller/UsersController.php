<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *boooooooooooooooooooooooooooooo
     * @return \Cake\Http\Response|void
     */
	 public function initialize()
{
    parent::initialize();
    // Add the 'add' action to the allowed actions list.
    $this->Auth->allow(['logout', 'add','view']);
}
	 public function login(){
		if ($this->request->is('post')){
			$user=$this->Auth->identify();
			if ($user){
				$this->Auth->setUser($user);
				return $this->redirect($this->Auth->redirectUrl());
			}else {$this->Flash->error('datos invalidos',['key'=>'auth']);}
		}
	}
	public function logout (){
		return $this->redirect($this->Auth->logout());
	}

    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }
	public function home(){
		$this->render();
	}

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function isAuthorized($user){
		if (isset($user['role'])and $user['role']==='user')
		{
			if (in_array($this->request->action,['home','logout','view']))
			{
				return true;
			}
		} return parent::isAuthorized($user);
	}
	public function view($id){
		$user=$this->Users->get($id);
		
		$this->set('user',$user);
	}
	public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('listo'));

                return $this->redirect(['action' => 'index']);
            }
            //$this->Flash->error(__('no pudo ser registrado'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
	public function edit($id=null){
		$user=$this->Users->get($id);
		if($this->request->is(['patch','post','put'])){
			$user=$this->Users->patchEntity($user,$this->request->data);
			if($this->Users->save($user)){
				$this->Flash->success('Usuario modificado');
				return $this->redirect(['action'=>'index']);
			}else $this->Flash->Error('el usuario no pudo ser modificado');
		}
		$this->set(compact('user'));
	}
	public function delete($id=null){
		/*debug('Borrar'.$id);
		exit();*/
		$this->request->allowMethod(['post','delete']);
		$user=$this->Users->get($id);
		if ($this->Users->delete($user)){
			$this->Flash->success('Ha sido eliminado');
		}else $this->Flash->error('No pudo ser eliminado, por favor intente de nuevo');
return $this->redirect(['action'=>'index']);	}
	
    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
   
        
    }

