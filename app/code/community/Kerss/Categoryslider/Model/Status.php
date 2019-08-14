<?php

class Kerss_Categoryslider_Model_Status extends Varien_Object {

    const STATUS_ENABLED = 0;
    const STATUS_DISABLED = 1;

    static public function getOptionArray() {
        return array(
            self::STATUS_ENABLED => Mage::helper('categoryslider')->__('Enabled'),
            self::STATUS_DISABLED => Mage::helper('categoryslider')->__('Disabled')
        );
    }

}