<?php

/**
 * Kerss Infotech
 * Kerss Category Banner Slider Magento Extension
 *
 * @category   Kerss
 * @package    Kerss_Categoryslider
 * @copyright  Copyright © 2015-2016 Kerss Infotech (http://kersstech.com/)
 */
class Kerss_Categoryslider_Block_Adminhtml_Categoryslider_Edit_Form extends Mage_Adminhtml_Block_Widget_Form {

    protected function _prepareForm() {
        $form = new Varien_Data_Form(array(
            "id" => "edit_form",
            "action" => $this->getUrl("*/*/save", array("id" => $this->getRequest()->getParam("id"))),
            "method" => "post",
            "enctype" => "multipart/form-data",
                )
        );
        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();
    }

}
