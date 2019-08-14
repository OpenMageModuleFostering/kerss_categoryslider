<?php

class Kerss_Categoryslider_Model_Options {

    public function positionNavigation() {
        $options = array(
            'out-center-bottom' => Mage::helper('categoryslider')->__('out-center-bottom'),
            'out-left-bottom' => Mage::helper('categoryslider')->__('out-left-bottom'),
            'out-right-bottom' => Mage::helper('categoryslider')->__('out-right-bottom'),
            'out-center-top' => Mage::helper('categoryslider')->__('out-center-top'),
            'out-right-top' => Mage::helper('categoryslider')->__('out-right-top'),
            'in-center-bottom' => Mage::helper('categoryslider')->__('in-center-bottom'),
            'in-left-bottom' => Mage::helper('categoryslider')->__('in-left-bottom'),
            'in-right-bottom' => Mage::helper('categoryslider')->__('in-right-bottom'),
            'in-left-top' => Mage::helper('categoryslider')->__('in-left-top'),
            'in-right-top' => Mage::helper('categoryslider')->__('in-right-top'),
            'in-left-middle' => Mage::helper('categoryslider')->__('in-left-middle'),
            'in-right-middle' => Mage::helper('categoryslider')->__('in-right-middle'),
        );
        return $options;
    }
    
    public function navigationType() {
        $options = array(
            'number' => Mage::helper('categoryslider')->__('Number'),
            'circle' => Mage::helper('categoryslider')->__('Circle'),
            'square' => Mage::helper('categoryslider')->__('Square'),
        );
        return $options;
    }
    
    public function positionControl() {
        $options = array(
            'left-right' => Mage::helper('categoryslider')->__('left-right'),
            'top-center' => Mage::helper('categoryslider')->__('top-center'),
            'bottom-center' => Mage::helper('categoryslider')->__('bottom-center'),
            'top-left' => Mage::helper('categoryslider')->__('top-left'),
            'top-right' => Mage::helper('categoryslider')->__('top-right'),
            'bottom-left' => Mage::helper('categoryslider')->__('bottom-left'),
            'bottom-right' => Mage::helper('categoryslider')->__('bottom-right'),
        );
        return $options;
    }
    
    public function transitionEffect() {
        $options = array(
            'random' => Mage::helper('categoryslider')->__('random'),
            'slide-left' => Mage::helper('categoryslider')->__('slide-left'),
            'slide-right' => Mage::helper('categoryslider')->__('slide-right'),
            'slide-top' => Mage::helper('categoryslider')->__('slide-top'),
            'slide-bottom' => Mage::helper('categoryslider')->__('slide-bottom'),
            'fade' => Mage::helper('categoryslider')->__('fade'),
            'split' => Mage::helper('categoryslider')->__('split'),
            'split3d' => Mage::helper('categoryslider')->__('split3d'),
            'door' => Mage::helper('categoryslider')->__('door'),
            'wave-left' => Mage::helper('categoryslider')->__('wave-left'),
            'wave-right' => Mage::helper('categoryslider')->__('wave-right'),
            'wave-top' => Mage::helper('categoryslider')->__('wave-top'),
            'wave-bottom' => Mage::helper('categoryslider')->__('wave-bottom'),
        );
        return $options;
    }
}
