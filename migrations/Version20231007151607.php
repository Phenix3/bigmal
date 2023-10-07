<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231007151607 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE shop_attribute_value (id INT AUTO_INCREMENT NOT NULL, attribute_id INT DEFAULT NULL, value VARCHAR(255) NOT NULL, key_name VARCHAR(255) NOT NULL, position INT DEFAULT NULL, INDEX IDX_17BCBFB6B6E62EFA (attribute_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE shop_attribute_value ADD CONSTRAINT FK_17BCBFB6B6E62EFA FOREIGN KEY (attribute_id) REFERENCES shop_attribute (id)');
        $this->addSql('ALTER TABLE shop_attribute ADD is_enabled TINYINT(1) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE shop_attribute_value DROP FOREIGN KEY FK_17BCBFB6B6E62EFA');
        $this->addSql('DROP TABLE shop_attribute_value');
        $this->addSql('ALTER TABLE shop_attribute DROP is_enabled');
    }
}
