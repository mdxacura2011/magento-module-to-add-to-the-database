<?php

class Webinse_Lessons4_Block_Faq extends Mage_Core_Block_Template
{
    public function getAllFaq()
    {
         $r = Mage::getModel('lessons4/faq')->getCollection();
	return $r;
    }

	public function getFaqById()
	    {

	$id=Mage::app()->getRequest()->getParam('id');

		if($id)
		{
		    return $newsCollection = Mage::getModel('lessons4/faq')->load($id);
		}
		else
		{
		   return $newsCollection = Mage::getModel('lessons4/faq');
		}
	}

}
