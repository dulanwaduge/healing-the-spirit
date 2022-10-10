<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * HomeContent Controller
 *
 * @property \App\Model\Table\HomeContentTable $HomeContent
 * @method \App\Model\Entity\HomeContent[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HomeContentController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $homeContent = $this->paginate($this->HomeContent);

        $this->set(compact('homeContent'));
    }

    /**
     * View method
     *
     * @param string|null $id Home Content id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $homeContent = $this->HomeContent->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('homeContent'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $homeContent = $this->HomeContent->newEmptyEntity();
        if ($this->request->is('post')) {
            $homeContent = $this->HomeContent->patchEntity($homeContent, $this->request->getData());
            if ($this->HomeContent->save($homeContent)) {
                $this->Flash->success(__('The home content has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The home content could not be saved. Please, try again.'));
        }
        $this->set(compact('homeContent'));
    }

    

    /**
     * Edit method
     *
     * @param string|null $id Home Content id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $homeContent = $this->HomeContent->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $homeContent = $this->HomeContent->patchEntity($homeContent, $this->request->getData());
            if ($this->request->getData('logo')){
                $logo = $this->request->getData('logo');
                
                $logoName = $logo->getClientFileName();
                if ($logoName != '') {
                    $targetPath1 = WWW_ROOT.'img'.DS.$logoName;
                    $logo->moveTo($targetPath1);
                    $homeContent->logo = $logoName;
                }
               
            }
            // get image
            if($this->request->getData('section1_img')){
                $section1_img = $this->request->getData('section1_img');
                $section1Name = $section1_img->getClientFileName();
                if ($section1Name != '') {
                $targetPath2 = WWW_ROOT.'img'.DS.$section1Name;
                $section1_img->moveTo($targetPath2);
                $homeContent->section1_img = $section1Name;
                }
            }

            if($this->request->getData('section2_img')){
                $section2_img = $this->request->getData('section2_img');
                $section2Name = $section2_img->getClientFileName();
                if ($section2Name != '') {
                $targetPath3 = WWW_ROOT.'img'.DS.$section2Name;
                $section2_img->moveTo($targetPath3);
                $homeContent->section2_img = $section2Name;
                }
            }

            if($this->request->getData('section3_img')){
                $section3_img = $this->request->getData('section3_img');
                $section3Name = $section3_img->getClientFileName();
                if ($section3Name != '') {
                $targetPath4 = WWW_ROOT.'img'.DS.$section3Name;
                $section3_img->moveTo($targetPath4);
                $homeContent->section3_img = $section3Name;
                }
            }
            if($this->request->getData('section4_img')){
                $section4_img = $this->request->getData('section4_img');
                $section4Name = $section4_img->getClientFileName();
                if ($section4Name != '') {
                $targetPath5 = WWW_ROOT.'img'.DS.$section4Name;
                $section4_img->moveTo($targetPath5);
                $homeContent->section4_img = $section4Name;
                }
            }

            if ($this->HomeContent->save($homeContent)) {
                $this->Flash->success(__('The home content has been saved.'));

                return $this->redirect(['action' => 'edit',1]);
            }
            $this->Flash->error(__('The home content could not be saved. Please, try again.'));
        }
        $this->set(compact('homeContent'));
    }
    /**
     * Delete method
     *
     * @param string|null $id Home Content id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $homeContent = $this->HomeContent->get($id);
        if ($this->HomeContent->delete($homeContent)) {
            $this->Flash->success(__('The home content has been deleted.'));
        } else {
            $this->Flash->error(__('The home content could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
