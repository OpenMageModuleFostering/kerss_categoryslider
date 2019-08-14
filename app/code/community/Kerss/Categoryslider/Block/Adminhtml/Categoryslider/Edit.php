<?php

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
        $this->_updateButton("save", "label", Mage::helper("categoryslider")->__("Save Item"));
        $this->_updateButton("delete", "label", Mage::helper("categoryslider")->__("Delete Item"));

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

            return Mage::helper("categoryslider")->__("Edit Item '%s'", $this->htmlEscape(Mage::registry("categoryslider_data")->getId()));
        } else {

            return Mage::helper("categoryslider")->__("Add Item");
        }
    }

}