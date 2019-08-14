<?php

/**
 * Kerss Infotech
 * Kerss Category Banner Slider Magento Extension
 *
 * @category   Kerss
 * @package    Kerss_Categoryslider
 * @copyright  Copyright © 2015-2016 Kerss Infotech (http://kersstech.com/)
 */
class Kerss_Categoryslider_Block_Adminhtml_Categoryslider_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs {

    public function __construct() {
        parent::__construct();
        $this->setId("categoryslider_tabs");
        $this->setDestElementId("edit_form");
        $this->setTitle(Mage::helper("categoryslider")->__("Banner Information"));
    }

    protected function _beforeToHtml() {
        $this->addTab("form_section", array(
            "label" => Mage::helper("categoryslider")->__("General"),
            "title" => Mage::helper("categoryslider")->__("General"),
            "content" => $this->getLayout()->createBlock("categoryslider/adminhtml_categoryslider_edit_tab_form")->toHtml(),
        ));
        $this->addTab("category_section", array(
            "label" => Mage::helper("categoryslider")->__("Category"),
            "title" => Mage::helper("categoryslider")->__("Category"),
            "content" => $this->getLayout()->createBlock("categoryslider/adminhtml_categoryslider_edit_tab_category")->toHtml(),
        ));
        return parent::_beforeToHtml();
    }

}
