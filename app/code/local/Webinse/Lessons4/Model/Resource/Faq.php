<?php

class Webinse_Lessons4_Model_Resource_Faq extends Mage_Core_Model_Resource_Db_Abstract
{

    protected function _construct()
    {
        $this->_init('lessons4/faq', 'entity_id');
    }

}
