<?php
class IndexController extends Controller
{
    public function indexAction()
    {
        $post = $this->getResource("entityManager")->find("Wdm\Model\Post", 1);
        $this->view->helloText = $post->getTitle();
    }
}



