<?php
/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class TrainRoutesController extends AppController {

	public $components = array('Metro', 'Translate');

    public function index() 
    {
    	$railways = $this->Metro->getRailways();
    	$this->Session->write('railways', $railways);
    	$this->set("railways", $railways);   	
	}

	public function view( $index )
	{
		$railways = $this->Session->read('railways');
		if (null != $railways) {
			$railway = $railways[$index];
		} else {
			$railway = $this->Metro->getRailways($index);
		}
		$railway = $this->Metro->getStations($railway);
		$this->set("railway", $railway);
	}
}