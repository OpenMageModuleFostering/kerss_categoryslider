<?php

/**
 * Kerss Infotech
 * Kerss Category Banner Slider Magento Extension
 *
 * @category   Kerss
 * @package    Kerss_Categoryslider
 * @copyright  Copyright © 2015-2016 Kerss Infotech (http://kersstech.com/)
 */
class Kerss_Categoryslider_Adminhtml_CategorysliderController extends Mage_Adminhtml_Controller_Action {

    protected function _initAction() {
        $this->loadLayout()->_setActiveMenu("categoryslider/categoryslider")->_addBreadcrumb(Mage::helper("adminhtml")->__("Categoryslider  Manager"), Mage::helper("adminhtml")->__("Category Slider Manager"));
        return $this;
    }

    public function indexAction() {
        $this->_title($this->__("Category Slider"));
        $this->_title($this->__("Category Slider Manager"));

        $this->_initAction();
        $this->renderLayout();
    }

    public function editAction() {
        $this->_title($this->__("Category Slider"));
        $this->_title($this->__("Category Slider"));
        $this->_title($this->__("Edit Banner"));

        $id = $this->getRequest()->getParam("id");
        $model = Mage::getModel("categoryslider/categoryslider")->load($id);
        if ($model->getId()) {
            Mage::register("categoryslider_data", $model);
            $this->loadLayout();
            $this->_setActiveMenu("categoryslider/categoryslider");
            $this->_addBreadcrumb(Mage::helper("adminhtml")->__("Categoryslider Manager"), Mage::helper("adminhtml")->__("Category Slider Manager"));
            $this->_addBreadcrumb(Mage::helper("adminhtml")->__("Categoryslider Description"), Mage::helper("adminhtml")->__("Category Slider Description"));
            $this->getLayout()->getBlock("head")->setCanLoadExtJs(true);
            $this->_addContent($this->getLayout()->createBlock("categoryslider/adminhtml_categoryslider_edit"))->_addLeft($this->getLayout()->createBlock("categoryslider/adminhtml_categoryslider_edit_tabs"));
            $this->renderLayout();
        } else {
            Mage::getSingleton("adminhtml/session")->addError(Mage::helper("categoryslider")->__("Banner does not exist."));
            $this->_redirect("*/*/");
        }
    }

    public function newAction() {

        $this->_title($this->__("Categoryslider"));
        $this->_title($this->__("Categoryslider"));
        $this->_title($this->__("New Banner"));

        $id = $this->getRequest()->getParam("id");
        $model = Mage::getModel("categoryslider/categoryslider")->load($id);

        $data = Mage::getSingleton("adminhtml/session")->getFormData(true);
        if (!empty($data)) {
            $model->setData($data);
        }

        Mage::register("categoryslider_data", $model);

        $this->loadLayout();
        $this->_setActiveMenu("categoryslider/categoryslider");

        $this->getLayout()->getBlock("head")->setCanLoadExtJs(true);

        $this->_addBreadcrumb(Mage::helper("adminhtml")->__("Category Slider Manager"), Mage::helper("adminhtml")->__("Category Slider Manager"));
        $this->_addBreadcrumb(Mage::helper("adminhtml")->__("Category Slider Description"), Mage::helper("adminhtml")->__("Category Slider Description"));


        $this->_addContent($this->getLayout()->createBlock("categoryslider/adminhtml_categoryslider_edit"))->_addLeft($this->getLayout()->createBlock("categoryslider/adminhtml_categoryslider_edit_tabs"));

        $this->renderLayout();
    }

    public function saveAction() {
        $post_data = $this->getRequest()->getPost();
        if ($post_data) {
            try {
                $post_data['category_id'] = implode(',', $post_data['category_id']);
                //save image
                try {
                    if ((bool) $post_data['image']['delete'] == 1) {
                        $post_data['image'] = '';
                    } else {
                        unset($post_data['image']);
                        if (isset($_FILES)) {
                            if ($_FILES['image']['name']) {
                                if ($this->getRequest()->getParam("id")) {
                                    $model = Mage::getModel("categoryslider/categoryslider")->load($this->getRequest()->getParam("id"));
                                    if ($model->getData('image')) {
                                        $io = new Varien_Io_File();
                                        $io->rm(Mage::getBaseDir('media') . DS . implode(DS, explode('/', $model->getData('image'))));
                                    }
                                }
                                $path = Mage::getBaseDir('media') . DS . 'categoryslider' . DS . 'categoryslider' . DS;
                                $uploader = new Varien_File_Uploader('image');
                                $uploader->setAllowedExtensions(array('jpg', 'png', 'gif'));
                                $uploader->setAllowRenameFiles(false);
                                $uploader->setFilesDispersion(false);
                                $destFile = $path . $_FILES['image']['name'];
                                $filename = $uploader->getNewFileName($destFile);
                                $uploader->save($path, $filename);

                                $post_data['image'] = 'categoryslider/categoryslider/' . $filename;
                            }
                        }
                    }
                } catch (Exception $e) {
                    Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                    $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                    return;
                }
                //save image
                $model = Mage::getModel("categoryslider/categoryslider")
                        ->addData($post_data)
                        ->setId($this->getRequest()->getParam("id"))
                        ->save();

                Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Banner was successfully saved"));
                Mage::getSingleton("adminhtml/session")->setCategorysliderData(false);

                if ($this->getRequest()->getParam("back")) {
                    $this->_redirect("*/*/edit", array("id" => $model->getId()));
                    return;
                }
                $this->_redirect("*/*/");
                return;
            } catch (Exception $e) {
                Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
                Mage::getSingleton("adminhtml/session")->setCategorysliderData($this->getRequest()->getPost());
                $this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
                return;
            }
        }
        $this->_redirect("*/*/");
    }

    public function deleteAction() {
        if ($this->getRequest()->getParam("id") > 0) {
            try {
                $model = Mage::getModel("categoryslider/categoryslider");
                $model->setId($this->getRequest()->getParam("id"))->delete();
                Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Banner was successfully deleted"));
                $this->_redirect("*/*/");
            } catch (Exception $e) {
                Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
                $this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
            }
        }
        $this->_redirect("*/*/");
    }

    public function massRemoveAction() {
        try {
            $ids = $this->getRequest()->getPost('slider_ids', array());
            foreach ($ids as $id) {
                $model = Mage::getModel("categoryslider/categoryslider");
                $model->setId($id)->delete();
            }
            Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Banner(s) was successfully removed"));
        } catch (Exception $e) {
            Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
        }
        $this->_redirect('*/*/');
    }

    public function massStatusAction() {
        $ids = $this->getRequest()->getParam('slider_ids');
        if (!is_array($ids)) {
            Mage::getSingleton('adminhtml/session')->addError($this->__('Please select banner(s)'));
        } else {
            try {
                foreach ($ids as $id) {
                    $model = Mage::getSingleton('categoryslider/categoryslider')
                            ->load($id)
                            ->setStatus($this->getRequest()->getParam('status'))
                            ->setIsMassupdate(true)
                            ->save();
                }
                $this->_getSession()->addSuccess(
                        $this->__('Total of %d record(s) were successfully updated', count($ids))
                );
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/');
    }

    /**
     * Export order grid to CSV format
     */
    public function exportCsvAction() {
        $fileName = 'categoryslider.csv';
        $grid = $this->getLayout()->createBlock('categoryslider/adminhtml_categoryslider_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
    }

    /**
     *  Export order grid to Excel XML format
     */
    public function exportExcelAction() {
        $fileName = 'categoryslider.xml';
        $grid = $this->getLayout()->createBlock('categoryslider/adminhtml_categoryslider_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
    }

    protected function _isAllowed() {
        return true;
    }

}
