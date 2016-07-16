<?php
namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $messages = [];
        if($this->flashMessenger()) {
            $messages = $this->flashmessenger()->getMessages();
        }

        return new ViewModel(['messages'=> $messages]);
    }

    public function fooAction()
    {
      return new ViewModel();
    }
}
