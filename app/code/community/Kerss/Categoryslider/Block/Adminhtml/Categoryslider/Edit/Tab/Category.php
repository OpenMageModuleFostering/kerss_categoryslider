<?php

/**
 * Kerss Infotech
 * Kerss Category Banner Slider Magento Extension
 *
 * @category   Kerss
 * @package    Kerss_Categoryslider
 * @copyright  Copyright © 2015-2016 Kerss Infotech (http://kersstech.com/)
 */
class Kerss_Categoryslider_Block_Adminhtml_Categoryslider_Edit_Tab_Category extends Mage_Adminhtml_Block_Widget_Form {

    protected function _prepareForm() {

        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset("categoryslider_form", array("legend" => Mage::helper("categoryslider")->__("Category")));

        $fieldset->addField('category_id', 'multiselect', array(
            'label' => Mage::helper('categoryslider')->__('Categories'),
            'required' => true,
            'values' => Kerss_Categoryslider_Block_Adminhtml_Categoryslider_Grid::getValueArray6(),
            'name' => 'category_id[]',
        ));
        if (Mage::getSingleton("adminhtml/session")->getCategorysliderData()) {
            $form->setValues(Mage::getSingleton("adminhtml/session")->getCategorysliderData());
            Mage::getSingleton("adminhtml/session")->setCategorysliderData(null);
        } elseif (Mage::registry("categoryslider_data")) {
            $form->setValues(Mage::registry("categoryslider_data")->getData());
        }
        return parent::_prepareForm();
    }

}
