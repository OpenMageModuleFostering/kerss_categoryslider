<?php

/**
 * Kerss Infotech
 * Kerss Category Banner Slider Magento Extension
 *
 * @category   Kerss
 * @package    Kerss_Categoryslider
 * @copyright  Copyright © 2015-2016 Kerss Infotech (http://kersstech.com/)
 */
class Kerss_Categoryslider_Block_Adminhtml_Categoryslider_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {

    protected function _prepareLayout() {
        parent::_prepareLayout();
        if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
            $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
        }
    }

    public function __construct() {

        parent::__construct();
        $this->_objectId = "slider_id";
        $this->_blockGroup = "categoryslider";
        $this->_controller = "adminhtml_categoryslider";
        $this->_updateButton("save", "label", Mage::helper("categoryslider")->__("Save Banner"));
        $this->_updateButton("delete", "label", Mage::helper("categoryslider")->__("Delete Banner"));

        $this->_addButton("saveandcontinue", array(
            "label" => Mage::helper("categoryslider")->__("Save And Continue Edit"),
            "onclick" => "saveAndContinueEdit()",
            "class" => "save",
                ), -100);



        $this->_formScripts[] = "

							function saveAndContinueEdit(){
								editForm.submit($('edit_form').action+'back/edit/');
							}
						";
    }

    public function getHeaderText() {
        if (Mage::registry("categoryslider_data") && Mage::registry("categoryslider_data")->getId()) {

            return Mage::helper("categoryslider")->__("Edit Banner '%s'", $this->htmlEscape(Mage::registry("categoryslider_data")->getTitle()));
        } else {

            return Mage::helper("categoryslider")->__("Add Banner");
        }
    }

}
