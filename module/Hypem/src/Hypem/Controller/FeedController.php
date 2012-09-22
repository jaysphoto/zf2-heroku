<?php

namespace Hypem\Controller;

use Zend\Mvc\Controller\AbstractActionController, 
		Zend\View\Model\ViewModel,
		Zend\View\Model\JsonModel,
		Hypem\Model\Music\Track;

class FeedController extends AbstractActionController
{
		public function indexAction()
		{
			return new ViewModel();
		}
		
    public function readAction()
    {
			$request = $this->getRequest();
			// Get view params
			$progress = (int) $request->getQuery()->get('progress', 0);
			
			// Set default progress to 0
			if (!($progress >= 0 && $progress <= 100))
				$progress = 0;
			
			$view = new ViewModel(array('progress' => $progress));
			
      return $view;
    }
}