<?php

use \AcceptanceTester as AT;
use Page\Acceptance as Page;

// @codingStandardsIgnoreFile

class CheckoutCest
{
    /**
     * Tests add product to cart
     *
     * @group checkout
     *
     * @param $I \AcceptanceTester
     *
     */
    public function testAddProductToCart(AT $I)
    {
        $I->am('Visitor');
        $I->wantTo('Add product to cart');

        $I->amGoingTo('open category page');
        $I->amOnPage(Page\Catalog::$CATEGORY_URL);
        $I->expectTo('see category page');

        $I->amGoingTo('open product page');
        $I->click(Page\Catalog::$categoryFirstProduct);
        $I->expectTo('see product page');
        $I->seeElement(Page\Catalog::$productBody);

        $I->amGoingTo('submit the form');
        $I->submitForm(Page\Catalog::$addToCartForm, array());

        $I->expectTo('see the cart page');
        $I->seeCurrentUrlEquals(Page\Checkout::$CART_URL);
        $I->expectTo('see a success message');
        $I->seeElement(Page\Catalog::$successMessage);
    }

    /**
     * Tests One Page Checkout
     *
     * @group checkout
     *
     * @param $I \AcceptanceTester
     *
     * @depends testAddProductToCart
     */
    public function testOnePageCheckout(AT $I)
    {
        $I->am('Guest Customer');
        $I->wantTo('use One Page Checkout');
        $I->lookForwardTo('experience flawless checkout');
        $I->amGoingTo('place an order as a guest');
        $I->amOnPage(Page\Checkout::$URL);

        $I->amGoingTo('select the checkout type');
        $I->selectOption(Page\Checkout::$radioTypeGuest, 'guest');
        $I->click(Page\Checkout::$continueButton);

        $I->amGoingTo('fill my address');
        $I->fillField(Page\Checkout::$billingFirstname, 'Acceptance');
        $I->fillField(Page\Checkout::$billingLastname, 'Tester');
        $I->fillField(Page\Checkout::$billingEmail, 'codeception@test.com');
        $I->selectOption(Page\Checkout::$billingCountryId, 'GB');
        $I->fillField(Page\Checkout::$billingStreet1, 'Baker Str. 1');
        $I->fillField(Page\Checkout::$billingPostcode, '10000');
        $I->fillField(Page\Checkout::$billingCity, 'London');
        $I->fillField(Page\Checkout::$billingTelephone, '911');
        $I->click('button', Page\Checkout::$billingAddressContainer);

        $I->amGoingTo('select shipping method');
        $I->waitForElementVisible(Page\Checkout::$shippingButtonsContainer);
        $I->selectOption(Page\Checkout::$shippingMethodInput, Page\Checkout::$shippingMethod);
        $I->click('button', Page\Checkout::$shippingButtonsContainer);

        $I->waitForElementVisible(Page\Checkout::$paymentButtonsContainer);
        // $I->amGoingTo('select payment method');
        // $I->click(Page\Checkout::$paymentMethod);
        $I->click('button', Page\Checkout::$paymentButtonsContainer);

        $I->waitForElementVisible(Page\Checkout::$checkoutReviewContainer);
        $I->amGoingTo('review and finish my order');
        $I->click('button', Page\Checkout::$checkoutReviewContainer);
        $I->wait(7);
    }

    /**
     * Tests Checkout Success page
     *
     * @group checkout
     *
     * @param $I AcceptanceTester
     *
     * @depends testOnePageCheckout
     */
    public function testOnePageCheckoutSuccess(AT $I)
    {
        $I->wantTo('Observe the order success page');
        $I->expectTo('see order success page');
        $I->seeInCurrentUrl(Page\Checkout::$SUCCESS_URL);
        $I->expectTo('be a happy customer');
    }

}