<?php

namespace MyTests\Navigation;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Navigators\BaseMenu;
use Magium\Magento\Navigators\Catalog\DefaultSimpleProduct;
use Magium\Magento\Navigators\Catalog\DefaultSimpleProductCategory;
use Magium\Magento\Navigators\Catalog\Product;

class BasicNavigationTest extends AbstractMagentoTestCase
{

    protected $categoryNavigation = 'Accessories/Jewelry';
    protected $productName = 'Blue Horizons Bracelets';

    /**
     * This test ensures that the category navigator is working when providing a specific value.  If this test fails
     * you will need to make changes to the $this->navigationBaseXPathSelector and $this->navigationChildXPathSelector
     * properties in the file {projectRoot}/configuration/Magium/Magento/Themes/{MagentoVersion}/ThemeConfiguration.php
     */

    public function testSpecificCategoryNavigationSucceeds()
    {
        $theme = $this->getTheme();
        $this->commandOpen($theme->getBaseUrl());

        $this->getNavigator(BaseMenu::NAVIGATOR)->navigateTo($this->categoryNavigation);
    }


    /**
     * This test ensures that the category navigator is working when providing a specific value.  If this test fails
     * you will need to make changes to the $this->categorySpecificProductPageXpath
     * property in the file {projectRoot}/configuration/Magium/Magento/Themes/{MagentoVersion}/ThemeConfiguration.php
     */

    public function testSpecificProductNavigationSucceeds()
    {
        $theme = $this->getTheme();
        $this->commandOpen($theme->getBaseUrl());
        $this->getNavigator(BaseMenu::NAVIGATOR)->navigateTo($this->categoryNavigation);
        $this->getNavigator(Product::NAVIGATOR)->navigateTo($this->productName);
    }


    /**
     * This test ensures that the default category navigator is working.  If this test fails
     * you will need to make changes to the $this->navigationPathToSimpleProductCategory property in the file
     * {projectRoot}/configuration/Magium/Magento/Themes/{MagentoVersion}/ThemeConfiguration.php
     */

    public function testDefaultCategoryNavigationSucceeds()
    {
        $theme = $this->getTheme();
        $this->commandOpen($theme->getBaseUrl());

        $this->getNavigator(DefaultSimpleProductCategory::NAVIGATOR)->navigateTo();
    }

    /**
     * This test ensures that the product navigator is working with the default category for simple products.  If this test fails
     * you will need to make changes to the $this->defaultSimpleProductName property in the file
     * {projectRoot}/configuration/Magium/Magento/Themes/{MagentoVersion}/ThemeConfiguration.php
     */

    public function testDefaultProductNavigationSucceeds()
    {
        $theme = $this->getTheme();
        $this->commandOpen($theme->getBaseUrl());

        // The default simple category is required because the default simple product navigator does not do category navigation
        $this->getNavigator(DefaultSimpleProductCategory::NAVIGATOR)->navigateTo();
        $this->getNavigator(DefaultSimpleProduct::NAVIGATOR)->navigateTo();
    }

}