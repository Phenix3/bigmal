<?php

namespace App\Grid;

use App\Entity\Shop\Product\Brand;
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
use Sylius\Bundle\GridBundle\Builder\GridBuilderInterface;
use Sylius\Bundle\GridBundle\Grid\AbstractGrid;
use Sylius\Bundle\GridBundle\Grid\ResourceAwareGridInterface;

final class BrandGrid extends AbstractGrid implements ResourceAwareGridInterface
{
    public function __construct()
    {
        // TODO inject services if required
    }

    public static function getName(): string
    {
        return 'app_backend_product_brand';
    }

    public function buildGrid(GridBuilderInterface $gridBuilder): void
    {
        $gridBuilder
            // see https://github.com/Sylius/SyliusGridBundle/blob/master/docs/field_types.md
            ->addField(
                StringField::create('name')
                    ->setLabel('Name')
                    ->setSortable(true)
            )
            ->addField(
                StringField::create('slug')
                    ->setLabel('Slug')
                    ->setSortable(true)
            )
            ->addField(
                StringField::create('website')
                    ->setLabel('Website')
                    ->setSortable(true)
            )
            ->addField(
                StringField::create('description')
                    ->setLabel('Description')
                    ->setSortable(true)
            )
            // ->addField(
            //    TwigField::create('isEnabled', 'path/to/field/template.html.twig')
            //        ->setLabel('IsEnabled')
            // )
            ->addField(
                StringField::create('metaTitle')
                    ->setLabel('MetaTitle')
                    ->setSortable(true)
            )
            ->addField(
                StringField::create('metDescription')
                    ->setLabel('MetDescription')
                    ->setSortable(true)
            )
            ->addField(
                DateTimeField::create('createdAt')
                    ->setLabel('CreatedAt')
            )
            ->addField(
                DateTimeField::create('updatedAt')
                    ->setLabel('UpdatedAt')
            )
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
        return Brand::class;
    }
}
