<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EventsFields Controller
 *
 * @property \App\Model\Table\EventsFieldsTable $EventsFields
 *
 * @method \App\Model\Entity\EventsField[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EventsFieldsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Events', 'Fields']
        ];
        $eventsFields = $this->paginate($this->EventsFields);

        $this->set(compact('eventsFields'));
    }

    /**
     * View method
     *
     * @param string|null $id Events Field id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $eventsField = $this->EventsFields->get($id, [
            'contain' => ['Events', 'Fields']
        ]);

        $this->set('eventsField', $eventsField);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $eventsField = $this->EventsFields->newEntity();
        if ($this->request->is('post')) {
            $eventsField = $this->EventsFields->patchEntity($eventsField, $this->request->getData());
            if ($this->EventsFields->save($eventsField)) {
                $this->Flash->success(__('The events field has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The events field could not be saved. Please, try again.'));
        }
        $events = $this->EventsFields->Events->find('list', ['limit' => 200]);
        $fields = $this->EventsFields->Fields->find('list', ['limit' => 200]);
        $this->set(compact('eventsField', 'events', 'fields'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Events Field id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $eventsField = $this->EventsFields->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $eventsField = $this->EventsFields->patchEntity($eventsField, $this->request->getData());
            if ($this->EventsFields->save($eventsField)) {
                $this->Flash->success(__('The events field has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The events field could not be saved. Please, try again.'));
        }
        $events = $this->EventsFields->Events->find('list', ['limit' => 200]);
        $fields = $this->EventsFields->Fields->find('list', ['limit' => 200]);
        $this->set(compact('eventsField', 'events', 'fields'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Events Field id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $eventsField = $this->EventsFields->get($id);
        if ($this->EventsFields->delete($eventsField)) {
            $this->Flash->success(__('The events field has been deleted.'));
        } else {
            $this->Flash->error(__('The events field could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
