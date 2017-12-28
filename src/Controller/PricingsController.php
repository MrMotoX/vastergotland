<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pricings Controller
 *
 * @property \App\Model\Table\PricingsTable $Pricings
 *
 * @method \App\Model\Entity\Pricing[] paginate($object = null, array $settings = [])
 */
class PricingsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Events']
        ];
        $pricings = $this->paginate($this->Pricings);

        $this->set(compact('pricings'));
    }

    /**
     * View method
     *
     * @param string|null $id Pricing id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pricing = $this->Pricings->get($id, [
            'contain' => ['Events']
        ]);

        $this->set('pricing', $pricing);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pricing = $this->Pricings->newEntity();
        if ($this->request->is('post')) {
            $pricing = $this->Pricings->patchEntity($pricing, $this->request->getData());
            if ($this->Pricings->save($pricing)) {
                $this->Flash->success(__('The pricing has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pricing could not be saved. Please, try again.'));
        }
        $events = $this->Pricings->Events->find('list', ['limit' => 200]);
        $this->set(compact('pricing', 'events'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pricing id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pricing = $this->Pricings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pricing = $this->Pricings->patchEntity($pricing, $this->request->getData());
            if ($this->Pricings->save($pricing)) {
                $this->Flash->success(__('The pricing has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pricing could not be saved. Please, try again.'));
        }
        $events = $this->Pricings->Events->find('list', ['limit' => 200]);
        $this->set(compact('pricing', 'events'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pricing id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pricing = $this->Pricings->get($id);
        if ($this->Pricings->delete($pricing)) {
            $this->Flash->success(__('The pricing has been deleted.'));
        } else {
            $this->Flash->error(__('The pricing could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
