<?php
class SiteDomainsController extends SitesAppController {

	var $name = 'SiteDomains';

	function admin_index() {
		$this->SiteDomain->recursive = 0;

		if (!empty($this->params['pass'][0])) {
			$this->paginate = array(
				'conditions' => array(
					'Site.id' => $this->params['pass'][0],
					),
				);
		}
		$this->set('siteDomains', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid site domain', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('siteDomain', $this->SiteDomain->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->SiteDomain->create();
			if ($this->SiteDomain->save($this->data)) {
				$this->Session->setFlash(__('The site domain has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The site domain could not be saved. Please, try again.', true));
			}
		}
		$sites = $this->SiteDomain->Site->find('list');
		$this->set(compact('sites'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid site domain', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->SiteDomain->save($this->data)) {
				$this->Session->setFlash(__('The site domain has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The site domain could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->SiteDomain->read(null, $id);
		}
		$sites = $this->SiteDomain->Site->find('list');
		$this->set(compact('sites'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for site domain', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->SiteDomain->delete($id)) {
			$this->Session->setFlash(__('Site domain deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Site domain was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
