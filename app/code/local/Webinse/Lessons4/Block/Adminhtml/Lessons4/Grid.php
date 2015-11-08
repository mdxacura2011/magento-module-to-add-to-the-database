<?php
class Webinse_Lessons4_Block_Adminhtml_Lessons4_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    protected function _construct()
    {
       
        $this->setId('lessons4Grid');
        $this->setUseAjax(true);
		$this->_controller = 'adminhtml_lessons4';

        $this->setDefaultSort('id');
		$this->setDefaultDir('desc');

        //$this->setFilterVisibility(false);
        //$this->setPagerVisibility(false);
	parent::_construct();
    }
 
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('lessons4/faq')->getCollection();
        $this->setCollection($collection);
 
        return parent::_prepareCollection();
    }
 
    protected function _prepareColumns()
    { 
         $this -> addColumn('entity_id',array(
            'header' => 'ID',
            'wight' => 50,
            'index' => 'entity_id',
            'sortable' => false,
        ));
        $this -> addColumn('question',array(
            'header' => 'Question',
            'wight' => 50,
            'index' => 'question',
            'sortable' => false,
        ));
        $this -> addColumn('answer',array(
            'header' => 'Answer',
            'wight' => 50,
            'index' => 'answer',
            'sortable' => false,
        ));
        $this -> addColumn('date',array(
        'header' => 'Date',
        'wight' => 50,
        'index' => 'date',
        'sortable' => false,
        ));
	 $this -> addColumn('user_id',array(
            'header' => 'user_id',
            'wight' => 50,
            'index' => 'user_id',
            'sortable' => false,
        ));
        
        return parent::_prepareColumns();
    }
 
    public function getRowUrl($lessons4)
    {
        return $this->getUrl('*/*/edit', array(
            'id' => $lessons4->getId(),
        ));
    }

}
