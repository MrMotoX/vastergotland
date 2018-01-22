<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ApplicationsFields Controller
 *
 * @property \App\Model\Table\ApplicationsFieldsTable $ApplicationsFields
 *
 * @method \App\Model\Entity\ApplicationsField[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ApplicationsFieldsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Applications', 'Fields']
        ];
        $applicationsFields = $this->paginate($this->ApplicationsFields);

        $this->set(compact('applicationsFields'));
    }

    /**
     * View method
     *
     * @param string|null $id Applications Field id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $applicationsField = $this->ApplicationsFields->get($id, [
            'contain' => ['Applications', 'Fields']
        ]);

        $this->set('applicationsField', $applicationsField);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $applicationsField = $this->ApplicationsFields->newEntity();
        if ($this->request->is('post')) {
            $applicationsField = $this->ApplicationsFields->patchEntity($applicationsField, $this->request->getData());
            if ($this->ApplicationsFields->save($applicationsField)) {
                $this->Flash->success(__('The applications field has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The applications field could not be saved. Please, try again.'));
        }
        $applications = $this->ApplicationsFields->Applications->find('list', ['limit' => 200]);
        $fields = $this->ApplicationsFields->Fields->find('list', ['limit' => 200]);
        $this->set(compact('applicationsField', 'applications', 'fields'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Applications Field id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $applicationsField = $this->ApplicationsFields->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $applicationsField = $this->ApplicationsFields->patchEntity($applicationsField, $this->request->getData());
            if ($this->ApplicationsFields->save($applicationsField)) {
                $this->Flash->success(__('The applications field has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The applications field could not be saved. Please, try again.'));
        }
        $applications = $this->ApplicationsFields->Applications->find('list', ['limit' => 200]);
        $fields = $this->ApplicationsFields->Fields->find('list', ['limit' => 200]);
        $this->set(compact('applicationsField', 'applications', 'fields'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Applications Field id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $applicationsField = $this->ApplicationsFields->get($id);
        if ($this->ApplicationsFields->delete($applicationsField)) {
            $this->Flash->success(__('The applications field has been deleted.'));
        } else {
            $this->Flash->error(__('The applications field could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
