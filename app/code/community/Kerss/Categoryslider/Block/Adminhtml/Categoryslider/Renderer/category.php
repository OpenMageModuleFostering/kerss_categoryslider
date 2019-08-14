<?php

class Kerss_Categoryslider_Block_Adminhtml_Categoryslider_Renderer_Category extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract {

    public function render(Varien_Object $row) {
        $categoryId = explode(',', $row->getData($this->getColumn()->getIndex()));
        
        $categoryData = array();
        foreach ($categoryId as $key => $catData) {
            $category = Mage::getModel('catalog/category')->load($catData);
            echo $categoryData[] = $category->getName().'<br />';
        }
    }

}