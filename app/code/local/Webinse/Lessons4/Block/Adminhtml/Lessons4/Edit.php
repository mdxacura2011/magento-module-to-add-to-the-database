<?php

class Webinse_Lessons4_Block_Adminhtml_Lessons4_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function _construct()
    {
		$this -> _blockGroup = 'lessons4';
        $this -> _controller = 'adminhtml_lessons4';
		$this->_mode = 'edit';

        parent::_construct();

        if (!Mage::registry('current_faq')->getId()) {
		$this -> removeButton('delete');
        }
    }

    public function getHeaderText()
    {	
        $model = Mage::registry('current_faq');
        if ($model->getId()) {
            return Mage::helper('lessons4')->__("Edit Question '%s'", $this->escapeHtml($model->getName()));
        } else {
            return Mage::helper('lessons4')->__("Add new Question");
        }
    }

    public function getHeaderCssClass()
    {
        return 'icon-head head-faq';
    }

}
