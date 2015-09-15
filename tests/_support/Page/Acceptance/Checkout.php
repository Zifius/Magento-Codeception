<?php
namespace Page\Acceptance;

class Checkout
{
    public static $URL = '/checkout/onepage/';
    public static $CART_URL = '/checkout/cart/';
    public static $SUCCESS_URL = '/checkout/onepage/success';

    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */

    public static $radioTypeGuest = '#login:guest';
    public static $continueButton = 'button#onepage-guest-register-button';

    public static $billingFirstname = '#billing:firstname';
    public static $billingLastname = '#billing:lastname';
    public static $billingEmail = '#billing:email';
    public static $billingCountryId = '#billing:country_id';
    public static $billingStreet1 = '#billing:street1';
    public static $billingPostcode = '#billing:postcode';
    public static $billingCity = '#billing:city';
    public static $billingTelephone = '#billing:telephone';
    public static $billingAddressContainer = '#billing-buttons-container';

    public static $shippingButtonsContainer = '#shipping-method-buttons-container';
    public static $paymentButtonsContainer = '#payment-buttons-container';
    public static $checkoutReviewContainer = '#checkout-review-submit';

    public static $shippingMethodInput = 'form input[name=shipping_method]';
    public static $shippingMethod = '';
    public static $paymentMethod = '#p_method_checkmo';

    /**
     * @var \AcceptanceTester;
     */
    protected $acceptanceTester;

    public function __construct(\AcceptanceTester $I)
    {
        $this->acceptanceTester = $I;
    }

}
