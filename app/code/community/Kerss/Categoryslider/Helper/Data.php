<?php

class Kerss_Categoryslider_Helper_Data extends Mage_Core_Helper_Abstract {

    public function getCategoryCollection($currCatid) {
        $collection = Mage::getModel('categoryslider/categoryslider')->getCollection();
        $collection->addFieldToFilter('category_id', array('finset' => array($currCatid)));
        $collection->addFieldToFilter('status', '0');
        $collection->setOrder('sortorder', 'ASC');
        
        return $collection;
    }

}

