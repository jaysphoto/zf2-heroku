<?php

namespace Hypem\Controller;

use Zend\Mvc\Controller\ActionController,
    Zend\View\Model\ViewModel,
		Zend\View\Model\JsonModel,
		Hypem\Model\Music\Track;

class FeedController extends ActionController
{
    public function readAction()
    {
			/** @var $request \Zend\Http\Request **/
			$request = $this->getRequest();
			// Get view params
			$progress = (int) $request->query()->get('progress', 0);
			
			// Set default progress to 0
			if (!($progress >= 0 && $progress <= 100))
				$progress = 0;
			
			// Add some progress
			$progress += 5;
			
			$view = new ViewModel(array('progress' => $progress));
			
      return $view;
    }
}