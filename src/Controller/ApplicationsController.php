<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Applications Controller
 *
 * @property \App\Model\Table\ApplicationsTable $Applications
 *
 * @method \App\Model\Entity\Application[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ApplicationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Events', 'Pricings', 'Users']
        ];
        $applications = $this->paginate($this->Applications);

        $this->set(compact('applications'));
    }

    /**
     * View method
     *
     * @param string|null $id Application id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $application = $this->Applications->get($id, [
            'contain' => ['Events', 'Pricings', 'Users', 'Fields', 'EventsFields']
        ]);

        $this->set('application', $application);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $application = $this->Applications->newEntity();
        if ($this->request->is('post')) {
            $application = $this->Applications->patchEntity($application, $this->request->getData());
            if ($this->Applications->save($application)) {
                $this->Flash->success(__('The application has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The application could not be saved. Please, try again.'));
        }
        $events = $this->Applications->Events->find('list', ['limit' => 200]);
        $pricings = $this->Applications->Pricings->find('list', ['limit' => 200]);
        $users = $this->Applications->Users->find('list', ['limit' => 200]);
        $fields = $this->Applications->Fields->find('list', ['limit' => 200]);
        $eventsFields = $this->Applications->EventsFields->find('list', ['limit' => 200]);
        $this->set(compact('application', 'events', 'pricings', 'users', 'fields', 'eventsFields'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Application id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $application = $this->Applications->get($id, [
            'contain' => ['Fields', 'EventsFields']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $application = $this->Applications->patchEntity($application, $this->request->getData());
            if ($this->Applications->save($application)) {
                $this->Flash->success(__('The application has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The application could not be saved. Please, try again.'));
        }
        $events = $this->Applications->Events->find('list', ['limit' => 200]);
        $pricings = $this->Applications->Pricings->find('list', ['limit' => 200]);
        $users = $this->Applications->Users->find('list', ['limit' => 200]);
        $fields = $this->Applications->Fields->find('list', ['limit' => 200]);
        $eventsFields = $this->Applications->EventsFields->find('list', ['limit' => 200]);
        $this->set(compact('application', 'events', 'pricings', 'users', 'fields', 'eventsFields'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Application id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $application = $this->Applications->get($id);
        if ($this->Applications->delete($application)) {
            $this->Flash->success(__('The application has been deleted.'));
        } else {
            $this->Flash->error(__('The application could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
