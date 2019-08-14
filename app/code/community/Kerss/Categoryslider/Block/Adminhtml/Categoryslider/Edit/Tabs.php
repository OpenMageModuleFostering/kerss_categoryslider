<?php
class Kerss_Categoryslider_Block_Adminhtml_Categoryslider_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
		public function __construct()
		{
				parent::__construct();
				$this->setId("categoryslider_tabs");
				$this->setDestElementId("edit_form");
				$this->setTitle(Mage::helper("categoryslider")->__("Item Information"));
		}
		protected function _beforeToHtml()
		{
				$this->addTab("form_section", array(
				"label" => Mage::helper("categoryslider")->__("Item Information"),
				"title" => Mage::helper("categoryslider")->__("Item Information"),
				"content" => $this->getLayout()->createBlock("categoryslider/adminhtml_categoryslider_edit_tab_form")->toHtml(),
				));
				return parent::_beforeToHtml();
		}

}
