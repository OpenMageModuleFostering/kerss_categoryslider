<?php
class Kerss_Categoryslider_Model_Mysql4_Categoryslider extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("categoryslider/categoryslider", "slider_id");
    }
}