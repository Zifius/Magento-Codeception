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

    const BILLING_PREFIX = '#billing:';
    public static $billingFirstname = self::BILLING_PREFIX . 'firstname';
    public static $billingLastname = self::BILLING_PREFIX . 'lastname';
    public static $billingEmail = self::BILLING_PREFIX . 'email';
    public static $billingCountryId = self::BILLING_PREFIX . 'country_id';
    public static $billingStreet1 = self::BILLING_PREFIX . 'street1';
    public static $billingPostcode = self::BILLING_PREFIX . 'postcode';
    public static $billingCity = self::BILLING_PREFIX . 'city';
    public static $billingTelephone = self::BILLING_PREFIX . 'telephone';
    public static $billingAddressContainer = '#billing-buttons-container';

    public static $shippingButtonsContainer = '#shipping-method-buttons-container';
    public static $paymentButtonsContainer = '#payment-buttons-container';
    public static $checkoutReviewContainer = '#checkout-review-submit';

    public static $shippingMethodInput = '#s_method_flatrate_flatrate';
    public static $shippingMethod = 'flatrate_flatrate';
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
