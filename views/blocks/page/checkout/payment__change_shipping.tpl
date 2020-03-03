[{if $oView->getAllSets()}]
    [{assign var="aErrors" value=$oView->getFieldValidationErrors()}]
    <form action="[{$oViewConf->getSslSelfLink()}]" name="shipping" id="shipping" method="post">
        <div class="hidden">
            [{$oViewConf->getHiddenSid()}]
            [{$oViewConf->getNavFormParams()}]
            <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
            <input type="hidden" name="fnc" value="changeshipping">
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">[{if $oView->getAllSetsCnt() > 1}][{oxmultilang ident="SELECT_SHIPPING_METHOD"}][{else}][{oxmultilang ident="SELECTED_SHIPPING_CARRIER"}][{/if}]</h3>
            </div>
            <div class="card-body">
                [{block name="act_shipping"}]
                <div class="well well-sm">

                    [{foreach key=sShipID from=$oView->getAllSets() item=oShippingSet name=ShipSetSelect}]
                    <dl>
                        <dt>
                            <input type="radio" name="sShipSet" id="shipping_[{$sShipID}]" onchange="this.form.submit();" value="[{$sShipID}]" [{if $oShippingSet->blSelected}]checked[{/if}]>
                            <label for="shipping_[{$sShipID}]" style="font-weight:normal; ">
                                <b>[{$oShippingSet->oxdeliveryset__oxtitle->value}]</b>
                                [{assign var="oDeliveryCostPrice" value=$oShippingSet->rs_deliverysetlist_calculatePrice()}]
                                [{if $oDeliveryCostPrice && $oDeliveryCostPrice->getPrice() > 0}]
                                    [{if $oViewConf->isFunctionalityEnabled('blShowVATForDelivery') }]
                                        [{oxmultilang ident="CHARGES" suffix="COLON"}] [{oxprice price=$oDeliveryCostPrice->getNettoPrice() currency=$currency}]
                                        ([{oxmultilang ident="PLUS_VAT"}] [{oxprice price=$oDeliveryCostPrice->getVatValue() currency=$currency}])
                                    [{else}]
                                        ([{oxmultilang ident="CHARGES" suffix="COLON"}] [{oxprice price=$oDeliveryCostPrice->getBruttoPrice() currency=$currency}])
                                    [{/if}]
                                [{/if}]
                            </label>
                        </dt>
                    </dl>
                    [{/foreach}]
                </div>
                <noscript>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success submitButton largeButton">[{oxmultilang ident="UPDATE_SHIPPING_CARRIER"}]</button>
                    </div>
                </noscript>
                [{/block}]
            </div>
        </div>
    </form>
[{/if}]