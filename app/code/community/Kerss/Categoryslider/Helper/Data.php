<?php

/**
 * Kerss Infotech
 * Kerss Category Banner Slider Magento Extension
 *
 * @category   Kerss
 * @package    Kerss_Categoryslider
 * @copyright  Copyright © 2015-2016 Kerss Infotech (http://kersstech.com/)
 */
class Kerss_Categoryslider_Helper_Data extends Mage_Core_Helper_Abstract {

    public function getCategoryCollection($currCatid) {
        $collection = Mage::getModel('categoryslider/categoryslider')->getCollection();
        $collection->addFieldToFilter('category_id', array('finset' => array($currCatid)));
        $collection->addFieldToFilter('status', '0');
        $collection->setOrder('sortorder', 'ASC');

        return $collection;
    }

}
