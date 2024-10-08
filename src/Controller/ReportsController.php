<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Reports Controller
 *
 * @method \App\Model\Entity\Report[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReportsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

     public function customerReport()
{
    $startDate = $this->request->getQuery('start_date');
    $endDate = $this->request->getQuery('end_date');
    // debug($startDate);
    // die();
    $this->loadModel('Customers');

    $query = $this->Customers->find()
        ->contain(['Purchases', 'Sales']) 
        ->matching('Purchases', function ($q) use ($startDate, $endDate) {
            if ($startDate && $endDate) {
                return $q->where([
                    'Purchases.date >=' => $startDate,
                    'Purchases.date <=' => $endDate
                ]);
            } elseif ($startDate) {
                return $q->where(['Purchases.date >=' => $startDate]);
            } elseif ($endDate) {
                return $q->where(['Purchases.date <=' => $endDate]);
            }
            return $q; 
        });

        // ->matching('Sales', function ($q) use ($startDate, $endDate) {
        //     if ($startDate && $endDate) {
        //         return $q->where([
        //             'Sales.date >=' => $startDate,
        //             'Sales.date <=' => $endDate
        //         ]);
        //     } elseif ($startDate) {
        //         return $q->where(['Sales.date >=' => $startDate]);
        //     } elseif ($endDate) {
        //         return $q->where(['Sales.date <=' => $endDate]);
        //     }
        //     return $q; // jika tidak ada filter
        // });

    // Debug query
    // debug($query->sql()); // Menampilkan query SQL yang dihasilkan
    // die(); 

    // Ambil semua data
    $customers = $query->all();

    // Kirim data ke view
    $this->set(compact('customers', 'startDate', 'endDate'));
}


    public function index()
    {
        $reports = $this->paginate($this->Reports);

        $this->set(compact('reports'));
    }

    /**
     * View method
     *
     * @param string|null $id Report id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $report = $this->Reports->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('report'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $report = $this->Reports->newEmptyEntity();
        if ($this->request->is('post')) {
            $report = $this->Reports->patchEntity($report, $this->request->getData());
            if ($this->Reports->save($report)) {
                $this->Flash->success(__('The report has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The report could not be saved. Please, try again.'));
        }
        $this->set(compact('report'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Report id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $report = $this->Reports->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $report = $this->Reports->patchEntity($report, $this->request->getData());
            if ($this->Reports->save($report)) {
                $this->Flash->success(__('The report has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The report could not be saved. Please, try again.'));
        }
        $this->set(compact('report'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Report id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $report = $this->Reports->get($id);
        if ($this->Reports->delete($report)) {
            $this->Flash->success(__('The report has been deleted.'));
        } else {
            $this->Flash->error(__('The report could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
