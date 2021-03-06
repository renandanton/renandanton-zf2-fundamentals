<?php

namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PostController extends AbstractActionController
{
    public $categories;

    private $postForm;

    public function setPostForm($postForm)
    {
        $this->postForm = $postForm;
    }

    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    public function indexAction()
    {
        $data = $this->params()->fromPost();

        $viewModel = new ViewModel(['postForm' => $this->postForm, 'data' => $data]);
        $viewModel->setTemplate('market/post/index.phtml');

        if($this->getRequest()->isPost()) {
            $this->postForm->setData($data);
            if($this->postForm->isValid()) {
                $this->flashMessenger()->addMessage('Thanks for posting!');
                $this->redirect()->toRoute('home');
            } else {
                $invalidView = new ViewModel();
                $invalidView->setTemplate('market/post/invalid.phtml');
                $invalidView->addChild($viewModel, 'main');

                return $invalidView;
            }
        }

        return $viewModel;
    }
}
