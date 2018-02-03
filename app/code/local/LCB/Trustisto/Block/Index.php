<?php

class LCB_Trustisto_Block_Index extends Mage_Core_Block_Template
{

    /**
     * Get Trustisto service code
     */
    public function getCode()
    {
        return Mage::getStoreConfig('trustisto/general/code', Mage::app()->getStore());
    }

    /**
     * Get current product from registry
     * 
     * @return Mage_Catalog_Model_Product
     */
    public function getProduct()
    {
        return Mage::registry('current_product');
    }
    
    /**
     * Get last order on success page
     * 
     * @return Mage_Sales_Model_Order
     */
    public function getOrder()
    {
        $id = Mage::getSingleton('checkout/session')->getLastOrderId();
        return Mage::getModel('sales/order')->load($id);
    }

    /**
     * Render block HTML
     *
     * @return string
     */
    protected function _toHtml()
    {
        if (!Mage::getStoreConfig('trustisto/general/enabled', Mage::app()->getStore())) {
            return '';
        }

        return parent::_toHtml();
    }

}
