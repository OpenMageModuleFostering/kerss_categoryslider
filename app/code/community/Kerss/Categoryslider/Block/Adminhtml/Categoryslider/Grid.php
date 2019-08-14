<?php

class Kerss_Categoryslider_Block_Adminhtml_Categoryslider_Grid extends Mage_Adminhtml_Block_Widget_Grid {

    public function __construct() {
        parent::__construct();
        $this->setId("categorysliderGrid");
        $this->setDefaultSort("slider_id");
        $this->setDefaultDir("DESC");
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection() {
        $collection = Mage::getModel("categoryslider/categoryslider")->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns() {
        $this->addColumn("slider_id", array(
            "header" => Mage::helper("categoryslider")->__("ID"),
            "align" => "right",
            "width" => "50px",
            "type" => "number",
            "index" => "slider_id",
        ));

        $this->addColumn('image', array(
            'header' => Mage::helper('categoryslider')->__('Image'),
            'width' => '100px',
            'type' => 'image',
            'index' => 'image',
            'renderer' => 'categoryslider/adminhtml_categoryslider_renderer_image',
            'style' => 'text-align:center'
        ));

        $this->addColumn("title", array(
            "header" => Mage::helper("categoryslider")->__("Title"),
            "index" => "title",
            "width" => "500px"
        ));

        $this->addColumn("category_id", array(
            "header" => Mage::helper("categoryslider")->__("Category"),
            "index" => "category_id",
            "renderer" => "categoryslider/adminhtml_categoryslider_renderer_category",
            "width" => "250px",
        ));

        $this->addColumn("sortorder", array(
            "header" => Mage::helper("categoryslider")->__("Sort Order"),
            "index" => "sortorder",
            "width" => "80px",
        ));

        $this->addColumn('status', array(
            'header' => Mage::helper('categoryslider')->__('Status'),
            'index' => 'status',
            'type' => 'options',
            'options' => Kerss_Categoryslider_Block_Adminhtml_Categoryslider_Grid::getOptionArray8(),
        ));

        $this->addExportType('*/*/exportCsv', Mage::helper('sales')->__('CSV'));
        $this->addExportType('*/*/exportExcel', Mage::helper('sales')->__('Excel'));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row) {
        return $this->getUrl("*/*/edit", array("id" => $row->getId()));
    }

    protected function _prepareMassaction() {
        $this->setMassactionIdField('slider_id');
        $this->getMassactionBlock()->setFormFieldName('slider_ids');
        $this->getMassactionBlock()->setUseSelectAll(true);
        $this->getMassactionBlock()->addItem('remove_categoryslider', array(
            'label' => Mage::helper('categoryslider')->__('Delete'),
            'url' => $this->getUrl('*/adminhtml_categoryslider/massRemove'),
            'confirm' => Mage::helper('categoryslider')->__('Are you sure?')
        ));
        $statuses = Mage::getSingleton('categoryslider/status')->getOptionArray();
        
        //array_unshift($statuses, array('label' => '', 'value' => ''));
        $this->getMassactionBlock()->addItem('status', array(
            'label' => Mage::helper('categoryslider')->__('Change status'),
            'url' => $this->getUrl('*/*/massStatus', array('_current' => true)),
            'additional' => array(
                'visibility' => array(
                    'name' => 'status',
                    'type' => 'select',
                    'class' => 'required-entry',
                    'label' => Mage::helper('categoryslider')->__('Status'),
                    'values' => $statuses
                )
            )
        ));
        return $this;
    }

    static public function getOptionArray4() {
        $data_array = array();
        $data_array[0] = 'Same Tab';
        $data_array[1] = 'New Tab';
        return($data_array);
    }

    static public function getValueArray4() {
        $data_array = array();
        foreach (Kerss_Categoryslider_Block_Adminhtml_Categoryslider_Grid::getOptionArray4() as $k => $v) {
            $data_array[] = array('value' => $k, 'label' => $v);
        }
        return($data_array);
    }

    static public function getOptionArray6() {
        $categories = Mage::getModel('catalog/category')
                ->getCollection()
                ->addAttributeToSelect('name')
                ->addAttributeToSort('path', 'asc')
                ->addFieldToFilter('is_active', array('eq' => '1'))
                ->load()
                ->toArray();

        // Arrange categories in required array
        $categoryList = array();
        foreach ($categories as $catId => $category) {
            if (isset($category['name'])) {
                $categoryList[] = array(
                    'label' => $category['name'],
                    'level' => $category['level'],
                    'value' => $catId
                );
            }
        }
        return $categoryList;
    }

    static public function getValueArray6() {
        $data_array = array();
        $categoriesTreeView = Kerss_Categoryslider_Block_Adminhtml_Categoryslider_Grid::getOptionArray6();
        foreach ($categoriesTreeView as $value) {
            $catName = $value['label'];
            $catId = $value['value'];
            $catLevel = $value['level'];
            $space = '';
            for ($i = 1; $i < $catLevel; $i++) {
                $space = $space . "--";
            }
            $catName = $space . $catName;
            $data_array[] = array('value' => $catId, 'label' => $catName);
        }
        return($data_array);
    }

    static public function getOptionArray8() {
        $data_array = array();
        $data_array[0] = 'Enable';
        $data_array[1] = 'Disable';
        return($data_array);
    }

    static public function getValueArray8() {
        $data_array = array();
        foreach (Kerss_Categoryslider_Block_Adminhtml_Categoryslider_Grid::getOptionArray8() as $k => $v) {
            $data_array[] = array('value' => $k, 'label' => $v);
        }
        return($data_array);
    }

    static public function getOptionArray9() {
        $data_array = array();
        $data_array[0] = 'No';
        $data_array[1] = 'Yes';
        return($data_array);
    }

    static public function getValueArray9() {
        $data_array = array();
        foreach (Kerss_Categoryslider_Block_Adminhtml_Categoryslider_Grid::getOptionArray9() as $k => $v) {
            $data_array[] = array('value' => $k, 'label' => $v);
        }
        return($data_array);
    }

}