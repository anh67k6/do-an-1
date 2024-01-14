/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
define([
    'jquery',
    'mage/utils/wrapper',
    'Magento_CheckoutAgreements/js/model/agreements-assigner',
    'Magento_Checkout/js/model/quote',
    'Magento_Customer/js/model/customer',
    'Magento_Checkout/js/model/url-builder',
    'mage/url',
    'Magento_Checkout/js/model/error-processor',
    'uiRegistry'
], function (
    $,
    wrapper,
    agreementsAssigner,
    quote,
    customer,
    urlBuilder,
    urlFormatter,
    errorProcessor
) {
    'use strict';

    return function (placeOrderAction) {

        /** Override default place order action and add agreement_ids to request */
        return wrapper.wrap(placeOrderAction, function (originalAction, paymentData, messageContainer) {
            agreementsAssigner(paymentData);
            let isCustomer = customer.isLoggedIn(),
                quoteId = quote.getQuoteId(),
                url = urlFormatter.build('internship/quote/save'),
                customVat = $('[name="custom_vat"]').val();

            if (customVat) {

                let payload = {
                    'cartId': quoteId,
                    'custom_vat': customVat,
                    'is_customer': isCustomer
                };

                if (!payload.custom_vat) {
                    return true;
                }

                $.ajax({
                    url: url,
                    data: payload,
                    dataType: 'text',
                    type: 'POST'
                }).fail(
                    function (response) {
                        errorProcessor.process(response);
                    }
                );
            }

            return originalAction(paymentData, messageContainer);
        });
    };
});
