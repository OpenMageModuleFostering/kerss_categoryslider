<?php


class Kerss_Categoryslider_Block_Adminhtml_Categoryslider extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_categoryslider";
	$this->_blockGroup = "categoryslider";
	$this->_headerText = Mage::helper("categoryslider")->__("Categoryslider Manager");
	$this->_addButtonLabel = Mage::helper("categoryslider")->__("Add New Item");
	parent::__construct();
	
	}

}