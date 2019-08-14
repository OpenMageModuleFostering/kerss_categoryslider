<?php

/**
 * Kerss Infotech
 * Kerss Category Banner Slider Magento Extension
 *
 * @category   Kerss
 * @package    Kerss_Categoryslider
 * @copyright  Copyright © 2015-2016 Kerss Infotech (http://kersstech.com/)
 */
class Kerss_Categoryslider_Block_Adminhtml_Categoryslider extends Mage_Adminhtml_Block_Widget_Grid_Container {

    public function __construct() {

        $this->_controller = "adminhtml_categoryslider";
        $this->_blockGroup = "categoryslider";
        $this->_headerText = Mage::helper("categoryslider")->__("Category Slider Manager");
        $this->_addButtonLabel = Mage::helper("categoryslider")->__("Add New Banner");
        parent::__construct();
    }

}
