<?php

namespace App\Grid;

use App\Entity\Shop\Product\Product;
use Sylius\Bundle\GridBundle\Builder\Action\CreateAction;
use Sylius\Bundle\GridBundle\Builder\Action\DeleteAction;
use Sylius\Bundle\GridBundle\Builder\Action\ShowAction;
use Sylius\Bundle\GridBundle\Builder\Action\UpdateAction;
use Sylius\Bundle\GridBundle\Builder\ActionGroup\BulkActionGroup;
use Sylius\Bundle\GridBundle\Builder\ActionGroup\ItemActionGroup;
use Sylius\Bundle\GridBundle\Builder\ActionGroup\MainActionGroup;
use Sylius\Bundle\GridBundle\Builder\Field\DateTimeField;
use Sylius\Bundle\GridBundle\Builder\Field\StringField;
use Sylius\Bundle\GridBundle\Builder\Field\TwigField;
use Sylius\Bundle\GridBundle\Builder\Filter\StringFilter;
use Sylius\Bundle\GridBundle\Builder\GridBuilderInterface;
use Sylius\Bundle\GridBundle\Grid\AbstractGrid;
use Sylius\Bundle\GridBundle\Grid\ResourceAwareGridInterface;

final class ProductGrid extends AbstractGrid implements ResourceAwareGridInterface
{
    public function __construct()
    {
        // TODO inject services if required
    }

    public static function getName(): string
    {
        return 'app_backend_product_product';
    }

    public function buildGrid(GridBuilderInterface $gridBuilder): void
    {
        $gridBuilder
            ->addField(
                StringField::create('name')
                    ->setLabel('Name')
                    ->setSortable(true)
            )
            ->addField(
                StringField::create('sku')
                    ->setLabel('Sku')
                    ->setSortable(true)
            )
            ->addField(
                StringField::create('priceAmount')
                    ->setLabel('Price Amount')
                    ->setSortable(true)
            )
            ->addFilter(StringFilter::create('search', ['name', 'priceAmount']))
            // ->addField(
            //    TwigField::create('featured', 'path/to/field/template.html.twig')
            //        ->setLabel('Featured')
            // )
            // ->addField(
            //    TwigField::create('isVisible', 'path/to/field/template.html.twig')
            //        ->setLabel('IsVisible')
            // )
            // ->addField(
            //    TwigField::create('requireShipping', 'path/to/field/template.html.twig')
            //        ->setLabel('RequireShipping')
            // )
            // ->addField(
            //    TwigField::create('isEnabled', 'path/to/field/template.html.twig')
            //        ->setLabel('IsEnabled')
            // )
            ->addActionGroup(
                MainActionGroup::create(
                    CreateAction::create(),
                )
            )
            ->addActionGroup(
                ItemActionGroup::create(
                    // ShowAction::create(),
                    UpdateAction::create(),
                    DeleteAction::create()
                )
            )
            ->addActionGroup(
                BulkActionGroup::create(
                    DeleteAction::create()
                )
            )
        ;
    }

    public function getResourceClass(): string
    {
        return Product::class;
    }
}
