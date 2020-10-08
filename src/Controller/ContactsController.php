<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Contacts Controller
 *
 *
 * @method \App\Model\Entity\Contact[] paginate($object = null, array $settings = [])
 */
class ContactsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
		$contacts = $this->paginate($this->Contacts);
       $this->paginate = [
            'conditions'=>['user_id'=>$this->Auth->user('id')],
			'order'=>['id'=>'desc']
        ];
        

        $this->set(compact('contacts'));
        $this->set('_serialize', ['contacts']);
    }
	 public function isAuthorized($user){
		if (isset($user['role'])and $user['role']==='user')
		{
			if (in_array($this->request->action,['add']))
			{
				return true;
			}
			
		} return parent::isAuthorized($user);
	}

    /**
     * View method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id)
    {
	
	$contact=$this->Contacts->get($id);
		
		$this->set('contact',$contact);}

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contact = $this->Contacts->newEntity();
        if ($this->request->is('post')) {
            $contact = $this->Contacts->patchEntity($contact, $this->request->getData());
			$contact->user_id=$this->Auth->user('id');
            if ($this->Contacts->save($contact)) {
                $this->Flash->success(__('Solicitud enviada.'));

                return $this->redirect(['action' => 'index']);
            }
            else $this->Flash->error(__('No pudo ser enviada.'));
        }
        $this->set(compact('contact'));
        
    }

    /**
     * Edit method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
   /* public function edit($id = null)
    {
        $contact = $this->Contacts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contact = $this->Contacts->patchEntity($contact, $this->request->getData());
            if ($this->Contacts->save($contact)) {
                $this->Flash->success(__('The contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contact could not be saved. Please, try again.'));
        }
        $this->set(compact('contact'));
        $this->set('_serialize', ['contact']);
    }*/

    /**
     * Delete method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contact = $this->Contacts->get($id);
        if ($this->Contacts->delete($contact)) {
            $this->Flash->success(__('The contact has been deleted.'));
        } else {
            $this->Flash->error(__('The contact could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
