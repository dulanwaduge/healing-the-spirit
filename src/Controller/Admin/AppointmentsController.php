<?php
declare(strict_types=1);

namespace App\Controller\Admin;

/**
 * Appointments Controller
 *
 * @property \App\Model\Table\AppointmentsTable $Appointments
 * @method \App\Model\Entity\Appointment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AppointmentsController extends BaseController
{

    protected $time_arr = [
        1 => "9:00 - 10:00",
        2 => "10:00 - 11:00",
        3 => "11:00 - 12:00",
        4 => "13:00 - 14:00",
        5 => "14:00 - 15:00",
        6 => "15:00 - 16:00",
        7 => "16:00 - 17:00",
    ];

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $where_str = "is_cancel = 1";
        if (!empty($get['email'])) {
            $where_str .= " and cus_email = '{$get['email']}'";
        }
        $appointments = $this->Appointments->find("all")->where($where_str);
        $appointments = $this->paginate($appointments)->toArray();
//        $appointments = $this->paginate($this->Appointments);
        if (!empty($appointments)) {
            foreach ($appointments as $k => $v) {
                $appointments[$k]['appointment_time'] = isset($this->time_arr[$v->appointment_time]) ? $this->time_arr[$v->appointment_time] : 'No appointment time';
            }
        }
        $this->set(compact('appointments'));
    }

    /**
     * View method
     *
     * @param string|null $id Appointment id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $appointment = $this->Appointments->get($id, [
            'contain' => [],
        ]);
        $appointment->appointment_time = $this->time_arr[$appointment->appointment_time];

        $this->set(compact('appointment'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $appointment = $this->Appointments->newEmptyEntity();
        if ($this->request->is('post')) {
            $appointment = $this->Appointments->patchEntity($appointment, $this->request->getData());
            if ($this->Appointments->save($appointment)) {
                $this->Flash->success(__('The appointment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The appointment could not be saved. Please, try again.'));
        }
        $time = $this->time_arr;
        $this->set(compact('appointment', 'time'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Appointment id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $appointment = $this->Appointments->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appointment = $this->Appointments->patchEntity($appointment, $this->request->getData());
            if ($this->Appointments->save($appointment)) {
                $this->Flash->success(__('The appointment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The appointment could not be saved. Please, try again.'));
        }
        $times = $this->time_arr;
        $this->set(compact('appointment', 'times'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Appointment id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $appointment = $this->Appointments->get($id);
        if ($this->Appointments->delete($appointment)) {
            $this->Flash->success(__('The appointment has been deleted.'));
        } else {
            $this->Flash->error(__('The appointment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function cancel($id = null) {
        if ($this->request->is(['post', 'get'])) {
            $appointment = $this->Appointments->get($id, [
                'contain' => [],
            ]);
            $appointment->is_cancel = 2;
//            $appointment = $this->Appointments->patchEntity($appointment, $this->request->getData());
//            var_dump($appointment);exit;
            if ($this->Appointments->save($appointment)) {
                $this->Flash->success(__('The appointment has been cancelled.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The appointment could not be cancelled. Please, try again.'));
        }
    }

    public function getTime() {
        $date = $this->request->getQuery("date");
        //Check if it is weekend
        $whichDay = date("N", strtotime("$date"));
        if ($whichDay == 6 || $whichDay == 7) {
            $time_arr = [1, 2, 3, 4, 5, 6, 7];
        } else {
            $time_list = $this->Appointments->find()->where("appointment_date = '{$date}'")->all();
            $time_arr = [];
            foreach ($time_list as $time) {
                $time_arr[] = intval($time->appointment_time);
            }
        }
        $this->set($time_arr);
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }
}
