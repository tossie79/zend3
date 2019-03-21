<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Album\Controller;

// Add the following import:
use Album\Form\AlbumForm;
use Album\Model\Album;
use Album\Model\AlbumTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AlbumController extends AbstractActionController {

    // Add this property:
    private $table;

    // Add this constructor:
    public function __construct(AlbumTable $table) {
        $this->table = $table;
    }

    public function indexAction() {
        return new ViewModel([
            'albums' => $this->table->fetchAll(),
        ]);
    }

    public function addAction() {
        $albumForm = new AlbumForm();
        $albumForm->get('submit')->setValue('Add');

        $request = $this->getRequest();

        if (!$request->isPost()) {
            return ['albumForm' => $albumForm];
        }

        $album = new Album();
        $albumForm->setInputFilter($album->getInputFilter());
        $albumForm->setData($request->getPost());

        if (!$albumForm->isValid()) {
            return ['albumForm' => $albumForm];
        }

        $album->exchangeArray($albumForm->getData());
        $this->table->saveAlbum($album);
        return $this->redirect()->toRoute('album');
    }

    /* ... */
}
