<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ApplicationsEventsFields Controller
 *
 * @property \App\Model\Table\ApplicationsEventsFieldsTable $ApplicationsEventsFields
 *
 * @method \App\Model\Entity\ApplicationsEventsField[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ApplicationsEventsFieldsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Applications', 'EventsFields']
        ];
        $applicationsEventsFields = $this->paginate($this->ApplicationsEventsFields);

        $this->set(compact('applicationsEventsFields'));
    }

    /**
     * View method
     *
     * @param string|null $id Applications Events Field id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $applicationsEventsField = $this->ApplicationsEventsFields->get($id, [
            'contain' => ['Applications', 'EventsFields']
        ]);

        $this->set('applicationsEventsField', $applicationsEventsField);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $applicationsEventsField = $this->ApplicationsEventsFields->newEntity();
        if ($this->request->is('post')) {
            $applicationsEventsField = $this->ApplicationsEventsFields->patchEntity($applicationsEventsField, $this->request->getData());
            if ($this->ApplicationsEventsFields->save($applicationsEventsField)) {
                $this->Flash->success(__('The applications events field has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The applications events field could not be saved. Please, try again.'));
        }
        $applications = $this->ApplicationsEventsFields->Applications->find('list', ['limit' => 200]);
        $eventsFields = $this->ApplicationsEventsFields->EventsFields->find('list', ['limit' => 200]);
        $this->set(compact('applicationsEventsField', 'applications', 'eventsFields'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Applications Events Field id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $applicationsEventsField = $this->ApplicationsEventsFields->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $applicationsEventsField = $this->ApplicationsEventsFields->patchEntity($applicationsEventsField, $this->request->getData());
            if ($this->ApplicationsEventsFields->save($applicationsEventsField)) {
                $this->Flash->success(__('The applications events field has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The applications events field could not be saved. Please, try again.'));
        }
        $applications = $this->ApplicationsEventsFields->Applications->find('list', ['limit' => 200]);
        $eventsFields = $this->ApplicationsEventsFields->EventsFields->find('list', ['limit' => 200]);
        $this->set(compact('applicationsEventsField', 'applications', 'eventsFields'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Applications Events Field id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $applicationsEventsField = $this->ApplicationsEventsFields->get($id);
        if ($this->ApplicationsEventsFields->delete($applicationsEventsField)) {
            $this->Flash->success(__('The applications events field has been deleted.'));
        } else {
            $this->Flash->error(__('The applications events field could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
