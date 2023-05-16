<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * CustomersBuys Controller
 *
 * @property \App\Model\Table\CustomersBuysTable $CustomersBuys
 * @method \App\Model\Entity\CustomersBuy[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CustomersBuysController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers', 'Buys'],
        ];
        $customersBuys = $this->paginate($this->CustomersBuys);

        $this->set(compact('customersBuys'));
    }

    /**
     * View method
     *
     * @param string|null $id Customers Buy id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $customersBuy = $this->CustomersBuys->get($id, [
            'contain' => ['Customers', 'Buys'],
        ]);

        $this->set(compact('customersBuy'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $customersBuy = $this->CustomersBuys->newEmptyEntity();
        if ($this->request->is('post')) {
            $customersBuy = $this->CustomersBuys->patchEntity($customersBuy, $this->request->getData());
            if ($this->CustomersBuys->save($customersBuy)) {
                $this->Flash->success(__('The customers buy has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customers buy could not be saved. Please, try again.'));
        }
        $customers = $this->CustomersBuys->Customers->find('list', ['limit' => 200])->all();
        $buys = $this->CustomersBuys->Buys->find('list', ['limit' => 200])->all();
        $this->set(compact('customersBuy', 'customers', 'buys'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Customers Buy id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customersBuy = $this->CustomersBuys->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customersBuy = $this->CustomersBuys->patchEntity($customersBuy, $this->request->getData());
            if ($this->CustomersBuys->save($customersBuy)) {
                $this->Flash->success(__('The customers buy has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customers buy could not be saved. Please, try again.'));
        }
        $customers = $this->CustomersBuys->Customers->find('list', ['limit' => 200])->all();
        $buys = $this->CustomersBuys->Buys->find('list', ['limit' => 200])->all();
        $this->set(compact('customersBuy', 'customers', 'buys'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Customers Buy id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customersBuy = $this->CustomersBuys->get($id);
        if ($this->CustomersBuys->delete($customersBuy)) {
            $this->Flash->success(__('The customers buy has been deleted.'));
        } else {
            $this->Flash->error(__('The customers buy could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
