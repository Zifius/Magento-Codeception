<?php
namespace Page\Acceptance;

class Catalog
{
    public static $CATEGORY_URL = '/furniture.html';
    public static $CART_URL = '/checkout/cart/';

    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */

    public static $categoryFirstProduct = 'ul.products-grid.first li.first a';
    public static $productBody = '.catalog-product-view';
    public static $addToCartForm = '#product_addtocart_form';
    public static $successMessage = 'li.success-msg';

    /**
     * @var \AcceptanceTester;
     */
    protected $acceptanceTester;

    public function __construct(\AcceptanceTester $I)
    {
        $this->acceptanceTester = $I;
    }

}
