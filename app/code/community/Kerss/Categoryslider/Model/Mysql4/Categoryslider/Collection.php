<?php

/**
 * Kerss Infotech
 * Kerss Category Banner Slider Magento Extension
 *
 * @category   Kerss
 * @package    Kerss_Categoryslider
 * @copyright  Copyright © 2015-2016 Kerss Infotech (http://kersstech.com/)
 */
class Kerss_Categoryslider_Model_Mysql4_Categoryslider_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract {

    public function _construct() {
        $this->_init("categoryslider/categoryslider");
    }

}
