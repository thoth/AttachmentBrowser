<?php

App::uses('AttachmentsController', 'FileManager.Controller');
App::uses('File', 'Utility');

/**
 * FileManager Controller
 *
 * @category FileManager.Controller
 * @package  Croogo.FileManager.Controller
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class AttachmentBrowserController extends AttachmentsController {

	public function admin_browse(){
		parent::admin_browse();
		$this->layout = 'ajax';

		$fieldid = $this->request->params['named']['fieldid'];
		$this->set(compact('fieldid'));

	}

	public function admin_add() {
		$this->set('title_for_layout', __d('croogo', 'Add Attachment'));


		if ($this->request->is('post') || !empty($this->request->data)) {

			if (empty($this->data['Attachment'])) {
				$this->Attachment->invalidate('file', __d('croogo', 'Upload failed. Please ensure size does not exceed the server limit.'));
				return;
			}

			$this->Attachment->create();
			if ($this->Attachment->save($this->request->data)) {

				$this->Session->setFlash(__d('croogo', 'The Attachment has been saved'), 'default', array('class' => 'success'));

				if (isset($this->request->params['named']['editor'])) {
					$this->redirect(array('action' => 'browse'));
				} else {
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash(__d('croogo', 'The Attachment could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}

		$fieldid = $this->request->params['named']['fieldid'];
		$this->set(compact('fieldid'));
		$this->layout = 'ajax';
	}
}