<?php

class Webinse_Lessons4_IndexController extends Mage_Core_Controller_Front_Action
{

	private function _initLayout()
	    {
		$this->loadLayout();
		$this->renderLayout();
	    }

	public function getAllFaqAction()
	    {
	       $this->_initLayout();
	    } 


	public function editFaqAction()
	{
		$this->_initLayout();
	}

	 public function addFaqAction()
	    {
		 $this->_initLayout();
	    }


	public function saveAction()
	    {
		$params=$this->getRequest()->getParams('id');
		if($params) {
				$user = Mage::getModel('lessons4/faq')->load($params['id']);
					
					$dat = new Mage_Core_Model_Date();
					$user -> setDate($dat -> date());
					$user -> setQuestion($_POST['question']);
					$user -> setAnswer($_POST['answer']);
					$user -> setUserId($_POST['user_id']);
					$user -> save();

					Mage::getSingleton('core/session')->addSuccess(Mage::helper('lessons4')->__('Record successfully changed!'));
					return $this -> _redirectUrl(Mage::getUrl('lessons4/index/getallfaq'));				
			}
	    }

	public function deleteAction()
	{
		if ($id = $params = $this->getRequest()->getParams('id'))
			{
				try {
					Mage::getModel('lessons4/faq')->setId($id)->delete();
					Mage::getSingleton('core/session')->addSuccess(Mage::helper('lessons4')->__('Record deleted successfully!'));
				} catch (Exception $e) {
					Mage::getSingleton('core/session')->addError($e->getMessage());
				}		
			return $this->_redirectUrl(Mage::getUrl('lessons4/index/getallfaq'));
			}
	}
}
