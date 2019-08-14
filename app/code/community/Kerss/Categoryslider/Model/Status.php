<?php

/**
 * Kerss Infotech
 * Kerss Category Banner Slider Magento Extension
 *
 * @category   Kerss
 * @package    Kerss_Categoryslider
 * @copyright  Copyright © 2015-2016 Kerss Infotech (http://kersstech.com/)
 */
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
