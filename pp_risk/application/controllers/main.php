<?php
class Main extends Controller {
	
	function index()
	{
		// Default View
		$template = $this->loadView('default_view');
		$template->render();
	}
}
?>