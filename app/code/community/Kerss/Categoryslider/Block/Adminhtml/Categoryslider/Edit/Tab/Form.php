<?php

class Kerss_Categoryslider_Block_Adminhtml_Categoryslider_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form {

    protected function _prepareForm() {

        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset("categoryslider_form", array("legend" => Mage::helper("categoryslider")->__("Item information")));

        $fieldset->addField("title", "text", array(
            "label" => Mage::helper("categoryslider")->__("Title"),
            "class" => "required-entry",
            "required" => true,
            "name" => "title",
        ));

        $fieldset->addField('image', 'image', array(
            'label' => Mage::helper('categoryslider')->__('Image'),
            'name' => 'image',
            'note' => '(*.jpg, *.png, *.gif)',
        ));
        $fieldset->addField("alttext", "text", array(
            "label" => Mage::helper("categoryslider")->__("ALT Text"),
            "name" => "alttext",
        ));

        $fieldset->addField('showurl', 'select', array(
            'label' => Mage::helper('categoryslider')->__('Set Image URL'),
            'values' => Kerss_Categoryslider_Block_Adminhtml_Categoryslider_Grid::getValueArray9(),
            'name' => 'showurl',
        ));

        $fieldset->addField("url", "text", array(
            "label" => Mage::helper("categoryslider")->__("URL"),
            "name" => "url",
        ));

        $fieldset->addField('urltarget', 'select', array(
            'label' => Mage::helper('categoryslider')->__('URL Target'),
            'values' => Kerss_Categoryslider_Block_Adminhtml_Categoryslider_Grid::getValueArray4(),
            'name' => 'urltarget',
        ));

        $wysiwygConfig = Mage::getSingleton('cms/wysiwyg_config')->getConfig(
                array('tab_id' => $this->getTabId())
        );
        $wysiwygConfig["files_browser_window_url"] = Mage::getSingleton('adminhtml/url')->getUrl('adminhtml/cms_wysiwyg_images/index');
        $wysiwygConfig["directives_url"] = Mage::getSingleton('adminhtml/url')->getUrl('adminhtml/cms_wysiwyg/directive');
        $wysiwygConfig["directives_url_quoted"] = Mage::getSingleton('adminhtml/url')->getUrl('adminhtml/cms_wysiwyg/directive');
        $wysiwygConfig["add_images"] = false;
        $wysiwygConfig["add_widgets"] = false;
        $wysiwygConfig["add_variables"] = false;
        $wysiwygConfig["widget_plugin_src"] = false;
        $wysiwygConfig->setData("plugins", array());

        $style = 'height:20em; width:50em;';
        $config = $wysiwygConfig;
        $fieldset->addField('description', 'editor', array(
            'label' => Mage::helper('categoryslider')->__('Description'),
            'required' => false,
            'name' => 'description',
            'style' => $style,
            'wysiwyg' => true,
            'config' => $config,
        ));

        $fieldset->addField('showdesc', 'select', array(
            'label' => Mage::helper('categoryslider')->__('Show Description'),
            'values' => Kerss_Categoryslider_Block_Adminhtml_Categoryslider_Grid::getValueArray9(),
            'name' => 'showdesc',
        ));

        $fieldset->addField('category_id', 'multiselect', array(
            'label' => Mage::helper('categoryslider')->__('Categories'),
            'required' => true,
            'values' => Kerss_Categoryslider_Block_Adminhtml_Categoryslider_Grid::getValueArray6(),
            'name' => 'category_id[]',
        ));
        $fieldset->addField("sortorder", "text", array(
            "label" => Mage::helper("categoryslider")->__("Sort Order"),
            "name" => "sortorder",
        ));

        $fieldset->addField('status', 'select', array(
            'label' => Mage::helper('categoryslider')->__('Status'),
            'values' => Kerss_Categoryslider_Block_Adminhtml_Categoryslider_Grid::getValueArray8(),
            'name' => 'status',
        ));

        if (Mage::getSingleton("adminhtml/session")->getCategorysliderData()) {
            $form->setValues(Mage::getSingleton("adminhtml/session")->getCategorysliderData());
            Mage::getSingleton("adminhtml/session")->setCategorysliderData(null);
        } elseif (Mage::registry("categoryslider_data")) {
            $form->setValues(Mage::registry("categoryslider_data")->getData());
        }
        return parent::_prepareForm();
    }

    protected function _toHtml() {
        $dependency_block = $this->getLayout()
                ->createBlock('adminhtml/widget_form_element_dependence')
                ->addFieldMap('showurl', 'showurl')
                ->addFieldMap('url', 'url')
                ->addFieldMap('urltarget', 'urltarget')
                ->addFieldDependence('url', 'showurl', 1)
                ->addFieldDependence('urltarget', 'showurl', 1);

        return parent::_toHtml() . $dependency_block->toHtml();
    }

}
