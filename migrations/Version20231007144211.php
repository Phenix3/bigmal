<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231007144211 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE shop_product (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, sku VARCHAR(255) DEFAULT NULL, description LONGTEXT NOT NULL, barcode VARCHAR(255) DEFAULT NULL, security_stock INT DEFAULT NULL, featured TINYINT(1) DEFAULT NULL, is_visible TINYINT(1) DEFAULT NULL, old_price_amount DOUBLE PRECISION DEFAULT NULL, price_amount DOUBLE PRECISION NOT NULL, cost_amount DOUBLE PRECISION DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, published_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', weight_value INT DEFAULT NULL, weight_unit VARCHAR(10) DEFAULT NULL, height_value INT DEFAULT NULL, height_unit VARCHAR(10) DEFAULT NULL, width_value INT DEFAULT NULL, width_unit VARCHAR(10) DEFAULT NULL, depth_value INT DEFAULT NULL, depth_unit VARCHAR(10) DEFAULT NULL, volume_value INT DEFAULT NULL, volume_unit VARCHAR(10) DEFAULT NULL, meta_title VARCHAR(255) DEFAULT NULL, met_description VARCHAR(1000) DEFAULT NULL, is_enabled TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE shop_product');
    }
}
