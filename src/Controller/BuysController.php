<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Buys Controller
 *
 * @property \App\Model\Table\BuysTable $Buys
 * @method \App\Model\Entity\Buy[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BuysController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $buys = $this->paginate($this->Buys);

        $this->set(compact('buys'));
    }

    /**
     * View method
     *
     * @param string|null $id Buy id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $buy = $this->Buys->get($id, [
            'contain' => ['Customers'],
        ]);

        $this->set(compact('buy'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $buy = $this->Buys->newEmptyEntity();
        if ($this->request->is('post')) {
            $buy = $this->Buys->patchEntity($buy, $this->request->getData());
            if ($this->Buys->save($buy)) {
                $this->Flash->success(__('The buy has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The buy could not be saved. Please, try again.'));
        }
        $customers = $this->Buys->Customers->find('list', ['limit' => 200])->all();
        $this->set(compact('buy', 'customers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Buy id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $buy = $this->Buys->get($id, [
            'contain' => ['Customers'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $buy = $this->Buys->patchEntity($buy, $this->request->getData());
            if ($this->Buys->save($buy)) {
                $this->Flash->success(__('The buy has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The buy could not be saved. Please, try again.'));
        }
        $customers = $this->Buys->Customers->find('list', ['limit' => 200])->all();
        $this->set(compact('buy', 'customers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Buy id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $buy = $this->Buys->get($id);
        if ($this->Buys->delete($buy)) {
            $this->Flash->success(__('The buy has been deleted.'));
        } else {
            $this->Flash->error(__('The buy could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
