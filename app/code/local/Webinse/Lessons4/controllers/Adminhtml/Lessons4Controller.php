<?php
class Webinse_Lessons4_Adminhtml_Lessons4Controller extends Mage_Adminhtml_Controller_Action
{

 protected function _initFaq()
    {
        $helper = Mage::helper('lessons4');
        $this->_title($helper->__('Webinse'))->_title($helper->__('lessons4')); 

        Mage::register('current_faq', Mage::getModel('lessons4/faq'));
        $faqId = $this->getRequest()->getParam('id');
        if (!is_null($faqId)) {
            Mage::registry('current_faq')->load($faqId);
        }
    }

    public function indexAction()
    {
        $this->loadLayout();
        $this->_setActiveMenu('lessons4');
        $this->renderLayout();
    }
    
    public function newAction()
    {
	$this->_forward('edit');

    }

    public function editAction()
    {
	$this->_initFaq();
        $this->loadLayout();
        $this->_setActiveMenu('lessons4');
        $this->renderLayout();
    }

    public function saveAction()
    {
                if ($data = $this->getRequest()->getPost()) {
            try {
                $model = Mage::getModel('lessons4/faq');
                $model->setData($data)->setId($this->getRequest()->getParam('id'));
                $user = Mage::getSingleton('admin/session');
                $userid = $user->getUser()->getUserId();
                $model -> setUserId($userid);
                $model->save();

                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Data saved successfully!'));
                Mage::getSingleton('adminhtml/session')->setFormData(false);
                $this->_redirect('*/*/');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit', array(
                    'id' => $this->getRequest()->getParam('id')
                ));
            }
            return;
        }
        Mage::getSingleton('adminhtml/session')->addError($this->__('Unable to find item to save'));
        $this->_redirect('*/*/');
}
    public function deleteAction()
    {
	
        if ($id = $this->getRequest()->getParam('id')) {
            try {
                Mage::getModel('lessons4/faq')->setId($id)->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Successfully deleted!'));
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $id));
            }
        }
        $this->_redirect('*/*/');
    }
}
