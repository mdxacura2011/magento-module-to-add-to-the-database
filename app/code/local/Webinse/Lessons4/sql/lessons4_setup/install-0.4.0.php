<?php
$installer = $this;
$table2 = $installer->getTable('lessons4/faq');
$installer -> startSetup();
$table = $installer->getConnection()
	->newTable($table2)
	->addColumn('entity_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'identity'=>true, 
		'autoinc'=>true, 
		'nullable'=>false, 
		'primary'=>true
	))
	->addColumn('answer', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array( 
		'nullable'=>false
	))
	->addColumn('question', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array( 
		'nullable'=>false
	))
	->addColumn('date', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array( 
		'nullable'=>false
	))
	->addColumn('user_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array( 
		'nullable'=>false,
		'default'=>'0'
	))
	->addForeignKey(
		$installer->getFkName(
			'lessons4/faq', 'user_id',
			'admin/user', 'user_id'), 
			'user_id', $installer->getTable('admin/user'), 'user_id', 
			Varien_Db_Ddl_Table::ACTION_CASCADE, 
			Varien_Db_Ddl_Table::ACTION_CASCADE);
$installer->getConnection()->createTable($table);
$installer->endSetup();
