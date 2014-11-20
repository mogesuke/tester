<?php
/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class TestsController extends AppController {
	public $helpers = array('Html', 'Form');
	public $uses = array('Test', 'Question', 'Selection');

	public function index() {
		$this->set('tests', $this->Test->find('all'));
	}

	public function exec($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

		$this->Test->recursive = 2;
        $test = $this->Test->findById($id);
        if (!$test) {
            throw new NotFoundException(__('Invalid post'));
        }
		$this->set('test', json_encode($test));
	}

	public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $test = $this->Test->findById($id);
        if (!$test) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->Session->write('test_id', $test['Test']['id']);
        $this->set('test', $test);
    }

	public function add() {
        if ($this->request->is('Post')) {
            $this->Test->create();
            
			$test = $this->Test->save($this->request->data);
            if ($test) {
                $this->Session->setFlash(__('Your test has been saved.'));
                return $this->redirect(array('action' => 'view', $test['Test']['id']));
            }
            $this->Session->setFlash(__('Unable to add your test.'));
        }
	}

	public function edit($id = null) {
	    if (!$id) {
	        throw new NotFoundException(__('Invalid test'));
	    }

	    $test = $this->Test->findById($id);
	    if (!$test) {
	        throw new NotFoundException(__('Invalid test'));
	    }

	    if ($this->request->is(array('test', 'put'))) {
	        $this->Test->id = $id;
	        if ($this->Test->save($this->request->data)) {
	            $this->Session->setFlash(__('Your test has been updated.'));
	            return $this->redirect(array('action' => 'view', $test['Test']['id']));
	        }
	        $this->Session->setFlash(__('Unable to update your test.'));
	    }

	    if (!$this->request->data) {
	        $this->request->data = $test;
	    }
	}

	public function delete($id) {
	    if ($this->request->is('get')) {
	        throw new MethodNotAllowedException();
	    }

	    $test = $this->Test->findById($id);
	    if ($this->Test->delete($id)) {
	        $this->Session->setFlash(__('The post with title: ' .$test['Test']['title'] .' has been deleted.', h($id)));
	        return $this->redirect(array('action' => 'index'));
	    }
	}

	public function addQuestion() {
		if ($this->request->is('Post')) {
			$test_id = $this->Session->read('test_id');
		    if (!$test_id) {
		        throw new NotFoundException(__('Invalid question'));
		    }

		    $test = $this->Test->findById($test_id);
		    if (!$test_id) {
		        throw new NotFoundException(__('Invalid question'));
		    }

            $question = $this->request->data;
            $question['Question']['test_id'] = $test_id;
            if ($this->Question->saveAll($question)) {
                $this->Session->setFlash(__('Your question has been saved.'));
                return $this->redirect(array('action' => 'view', $test_id));
            }
            $this->Session->setFlash(__('Unable to add your question.'));
        }
	}

	public function editQuestion($id) {
	    if (!$id) {
	        throw new NotFoundException(__('Invalid question'));
	    }

	    $question = $this->Question->findById($id);
	    if (!$id) {
	        throw new NotFoundException(__('Invalid question'));
	    }

	    if ($this->request->is(array('question', 'put'))) {
	        $this->Question->id = $id;
	        $this->Selection->deleteAll(array('Selection.question_id' => $question['Question']['id']), false);
	        if ($this->Question->saveAll($this->request->data)) {
	            $this->Session->setFlash(__('Your question has been updated.'));
	            return $this->redirect(array('action' => 'view', $question['Question']['test_id']));
	        }
	        $this->Session->setFlash(__('Unable to update your question.'));
	    }

        if (!$this->request->data) {
	        $this->request->data = $question;
	    }
	}

	public function deleteQuestion($id) {
	    if ($this->request->is('get')) {
	        throw new MethodNotAllowedException();
	    }

	    $question = $this->Question->findById($id);
	    if ($this->Question->delete($id)) {
	        $this->Session->setFlash(__('The post with question: ' .$question['Question']['question'] .' has been deleted.', h($id)));
	        return $this->redirect(array('action' => 'view', $question['Question']['test_id']));
	    }
	}
}
