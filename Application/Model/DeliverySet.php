<?php

namespace rs\deliverysetlist\Application\Model;

class DeliverySet extends DeliverySet_parent
{

    public function rs_deliverysetlist_calculatePrice()
    {
        $oRet = null;
        /**
         * @var \oxsession $oSession
         */
        if($oSession = $this->getSession())
        {
            /**
             * @var \oxbasket $oBasket
             */
            if($oBasket = $oSession->getBasket())
            {
                //remove all
                $sTmpShippingId = \OxidEsales\Eshop\Core\Registry::getSession()->getVariable('sShipSet');
                $sTmpPaymentId = \OxidEsales\Eshop\Core\Registry::getSession()->getVariable('paymentid');
                $oTmpDeliveryList = \OxidEsales\Eshop\Core\Registry::get(\OxidEsales\Eshop\Application\Model\DeliveryList::class);
                \OxidEsales\Eshop\Core\Registry::getSession()->deleteVariable('sShipSet');
                \OxidEsales\Eshop\Core\Registry::getSession()->deleteVariable('paymentid');
                \OxidEsales\Eshop\Core\Registry::set(\OxidEsales\Eshop\Application\Model\DeliveryList::class,null);

                //calculate
                \OxidEsales\Eshop\Core\Registry::getSession()->setVariable('sShipSet', $this->getId());
                $oBasketClone = clone $oBasket;
                $oBasketClone->enableSaveToDataBase(false);
                $oBasketClone->setDeliveryPrice(null);
                $oBasketClone->setShipping($this->getId());
                $oBasketClone->setPayment(null);
                $oBasketClone->setCost('oxdelivery',null);
                $oBasketClone->onUpdate();
                $oBasketClone->calculateBasket(true);
                $oRet = $oBasketClone->getDeliveryCost();
                unset($oBasketClone);

                //restore
                \OxidEsales\Eshop\Core\Registry::getSession()->setVariable('sShipSet', $sTmpShippingId);
                \OxidEsales\Eshop\Core\Registry::getSession()->setVariable('paymentid', $sTmpPaymentId);
                \OxidEsales\Eshop\Core\Registry::set(\OxidEsales\Eshop\Application\Model\DeliveryList::class,$oTmpDeliveryList);
            }
        }
        return $oRet;
    }

}
