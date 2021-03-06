<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Bookmarks Controller
 *
 * @property \App\Model\Table\BookmarksTable $Bookmarks
 *
 * @method \App\Model\Entity\Bookmark[] paginate($object = null, array $settings = [])
 */
class BookmarksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'conditions'=>['user_id'=>$this->Auth->user('id')],
			'order'=>['id'=>'desc']
        ];
        $bookmarks = $this->paginate($this->Bookmarks);

        $this->set(compact('bookmarks'));
        $this->set('_serialize', ['bookmarks']);
    }
	 public function isAuthorized($user){
		if (isset($user['role'])and $user['role']==='user')
		{
			if (in_array($this->request->action,['add','index']))
			{
				return true;
			}
			if (in_array($this->request->action,['edit','delete']))
			{
				$id=$this->request->params['pass'][0];
				$bookmark=$this->Bookmarks->get($id);
				if ($bookmark->user_id==$user['id']){
					return true;
				}
			}
		} return parent::isAuthorized($user);
	}

    /**
     * View method
     *
     * @param string|null $id Bookmark id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bookmark = $this->Bookmarks->newEntity();
		
        if ($this->request->is('post')) {
            $bookmark = $this->Bookmarks->patchEntity($bookmark, $this->request->getData());
			$bookmark->user_id=$this->Auth->user('id');
            if ($this->Bookmarks->save($bookmark)) {
                $this->Flash->success(__('Enlace almacenado'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Enlace no almacenado, intente de nuevo'));
        }
       
        $this->set(compact('bookmark'));
       
    }

    /**
     * Edit method
     *
     * @param string|null $id Bookmark id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bookmark = $this->Bookmarks->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bookmark = $this->Bookmarks->patchEntity($bookmark, $this->request->getData());
            $bookmark->user_id=$this->Auth->user('id');
			if ($this->Bookmarks->save($bookmark)) {
                $this->Flash->success(__('Enlace actualizado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El enlace no fue actualizado, intente de nuevo.'));
        }
        $users = $this->Bookmarks->Users->find('list', ['limit' => 200]);
        $this->set(compact('bookmark', 'users'));
        $this->set('_serialize', ['bookmark']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Bookmark id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bookmark = $this->Bookmarks->get($id);
        if ($this->Bookmarks->delete($bookmark)) {
            $this->Flash->success(__('Enlace eliminado.'));
        } else {
            $this->Flash->error(__('No pudo ser elimininado.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
