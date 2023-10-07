<?php

declare(strict_types=1);

namespace App\Menu;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Monofony\Component\Admin\Menu\AdminMenuBuilderInterface;

final class AdminMenuBuilder implements AdminMenuBuilderInterface
{
    public function __construct(private FactoryInterface $factory)
    {
    }

    public function createMenu(array $options): ItemInterface
    {
        $menu = $this->factory->createItem('root');

        $this->addCustomerSubMenu($menu);
        $this->addConfigurationSubMenu($menu);
        $this->addShopCategorySubMenu($menu);

        return $menu;
    }

    private function addCustomerSubMenu(ItemInterface $menu): void
    {
        $customer = $menu
            ->addChild('customer')
            ->setLabel('sylius.ui.customer')
        ;

        $customer->addChild('backend_customer', ['route' => 'sylius_backend_customer_index'])
            ->setLabel('sylius.ui.customers')
            ->setLabelAttribute('icon', 'users');
    }

    private function addConfigurationSubMenu(ItemInterface $menu): void
    {
        $configuration = $menu
            ->addChild('configuration')
            ->setLabel('sylius.ui.configuration')
        ;

        $configuration->addChild('backend_admin_user', ['route' => 'sylius_backend_admin_user_index'])
            ->setLabel('sylius.ui.admin_users')
            ->setLabelAttribute('icon', 'lock');
    }

    private function addShopCategorySubMenu(ItemInterface $menu): ItemInterface
    {
        $content = $menu->addChild('shop')
            ->setLabel('sylius.ui.shop');

        $content->addChild('backend_product_category', ['route' => 'app_backend_product.category_index'])
            ->setLabel('sylius.ui.category')
            ->setLabelAttribute('icon', 'newspaper');

        
        // Attribute
        $content->addChild('backend_product_attribute', ['route' => 'app_backend_product.attribute_index'])
            ->setLabel('sylius.ui.attribute')
            ->setLabelAttribute('icon', 'newspaper');

        // AttributeValue
        $content->addChild('backend_product_attribute_value', ['route' => 'app_backend_product.attribute_value_index'])
            ->setLabel('sylius.ui.attribute_value')
            ->setLabelAttribute('icon', 'newspaper');

        // Brand
        $content->addChild('backend_product_brand', ['route' => 'app_backend_product.brand_index'])
            ->setLabel('sylius.ui.brand')
            ->setLabelAttribute('icon', 'newspaper');

        // Product
        $content->addChild('backend_product_product', ['route' => 'app_backend_product.product_index'])
            ->setLabel('sylius.ui.product')
            ->setLabelAttribute('icon', 'newspaper');


        return $content;
    }
}
