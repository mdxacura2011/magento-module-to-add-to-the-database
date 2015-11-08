<?php

class Webinse_Lessons4_Block_Adminhtml_Lessons4_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

     protected function _prepareLayout()
    {
        $helper = Mage::helper('lessons4');
        $model = Mage::registry('current_faq');

	 $form = new Varien_Data_Form(array(
            'id' => 'edit_form',
            'action' => $this->getUrl('*/*/save', array(
                'id' => $this->getRequest()->getParam('id')
            )),
            'method' => 'post',
            'enctype' => 'multipart/form-data',
            'class' => 'validate-no-html-tags'
        ));
	$this->setForm($form);

	$fieldset = $form->addFieldset('news_form', array('legend' => $helper->__('New information')));
        $fieldset->addField('question', 'text', array(
            'label' => $helper->__('Question'),
            'required' => true,
            'name' => 'question',
        ));
        $fieldset->addField('answer', 'text', array(
            'label' => $helper->__('Answer'),
            'required' => true,
            'name' => 'answer',
        ));
        $fieldset->addField('date', 'date', array(
            'format' => Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT),
            'image' => $this->getSkinUrl('images/grid-cal.gif'),
            'label' => $helper->__('date'),
            'name' => 'date'
        ));
  	$form->setUseContainer(true);
        if($data = Mage::getSingleton('adminhtml/session')->getFormData())
        {
            $form->setValues($data);
		
        } else
        {
		$form->setValues($model->getData());
        }
        return parent::_prepareForm();
    } 
}
