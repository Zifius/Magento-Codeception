<?php

use \AcceptanceTester as AT;
use Page\Acceptance as Page;

// @codingStandardsIgnoreFile

class CheckoutCest
{
    public function _before(AT $I)
    {

    }

    public function _after(AT $I)
    {

    }

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
        $I->seeCurrentUrlEquals(Page\Catalog::$CART_URL);
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
        $I->amOnPage('/checkout/onepage/');

        $I->amGoingTo('select the checkout type');
        $I->selectOption('#login:guest', 'guest');
        $I->click('button#onepage-guest-register-button', '#checkout-step-login');

        $I->amGoingTo('fill my address');
        $I->fillField('#billing:firstname', 'Acceptance');
        $I->fillField('#billing:lastname', 'Tester');
        $I->fillField('#billing:email', 'codeception@test.com');
        $I->selectOption('#billing:country_id', 'GB');
        $I->fillField('#billing:street1', 'Baker Str. 1');
        $I->fillField('#billing:postcode', '10000');
        $I->fillField('#billing:city', 'London');
        $I->fillField('#billing:telephone', '911');
        $I->click('button', '#billing-buttons-container');

        // TODO: Implement your shipping methods selection here
        /*
        $I->amGoingTo('select shipping method');
        $I->selectOption('input[name="shipping_method"]', '?');
        */

        $I->waitForElementVisible('#shipping-method-buttons-container');
        $I->click('button', '#shipping-method-buttons-container');

        $I->waitForElementVisible('#payment-buttons-container');
        $I->amGoingTo('select payment method');
        $I->click('#p_method_checkmo');
        $I->click('button', '#payment-buttons-container');

        $I->waitForElementVisible('#checkout-review-submit');
        $I->amGoingTo('review and finish my order');
        $I->click('button', '#checkout-review-submit');
        $I->wait(7);
    }

    /**
     * Tests Checkout Success page
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
        $I->seeInCurrentUrl('/checkout/onepage/success');
        $I->expectTo('be a happy customer');
    }

}