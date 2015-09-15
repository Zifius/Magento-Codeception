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
    public static $billingFirstname;
    public static $billingLastname;
    public static $billingEmail;
    public static $billingCountryId;
    public static $billingStreet1;
    public static $billingPostcode;
    public static $billingCity;
    public static $billingTelephone;
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
        $this->billingFirstname = self::BILLING_PREFIX . 'firstname';
        $this->billingLastname = self::BILLING_PREFIX . 'lastname';
        $this->billingEmail = self::BILLING_PREFIX . 'email';
        $this->billingCountryId = self::BILLING_PREFIX . 'country_id';
        $this->billingStreet1 = self::BILLING_PREFIX . 'street1';
        $this->billingPostcode = self::BILLING_PREFIX . 'postcode';
        $this->billingCity = self::BILLING_PREFIX . 'city';
        $this->billingTelephone = self::BILLING_PREFIX . 'telephone';
    }

}
