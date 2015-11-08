<?php
class Webinse_Lessons4_Block_Adminhtml_Lessons4 extends Mage_Adminhtml_Block_Widget_Grid_Container
{
	 protected $_blockGroup = 'lessons4';
    protected function _construct()
    {
        $this->_addButtonLabel = Mage::helper('lessons4')->__('Add New Question');
        $this->_blockGroup = 'lessons4';
        $this->_controller = 'adminhtml_lessons4';
        $this->_headerText = Mage::helper('lessons4')->__('Question');
	parent::_construct();
    }

 public function getHeaderCssClass()
    {
        return 'icon-head head-faq';
    }
}
