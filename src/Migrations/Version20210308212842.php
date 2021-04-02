<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210308212842 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE area (id INT AUTO_INCREMENT NOT NULL, commune_id INT DEFAULT NULL, name VARCHAR(100) NOT NULL, obs VARCHAR(255) DEFAULT NULL, INDEX IDX_D7943D68131A4F72 (commune_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commune (id INT AUTO_INCREMENT NOT NULL, town_id INT DEFAULT NULL, name VARCHAR(80) NOT NULL, obs VARCHAR(255) DEFAULT NULL, INDEX IDX_E2E2D1EE75E23604 (town_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, nationality VARCHAR(80) DEFAULT NULL, phonecode SMALLINT DEFAULT NULL, comment VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE street (id INT AUTO_INCREMENT NOT NULL, area_id INT DEFAULT NULL, streets_zone_id INT DEFAULT NULL, name VARCHAR(100) NOT NULL, obs VARCHAR(255) DEFAULT NULL, INDEX IDX_F0EED3D8BD0F409C (area_id), INDEX IDX_F0EED3D8C021BC8C (streets_zone_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE streets_zone (id INT AUTO_INCREMENT NOT NULL, wording VARCHAR(100) NOT NULL, obs VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE town (id INT AUTO_INCREMENT NOT NULL, country_id INT DEFAULT NULL, name VARCHAR(100) NOT NULL, obs VARCHAR(255) DEFAULT NULL, INDEX IDX_4CE6C7A4F92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE area ADD CONSTRAINT FK_D7943D68131A4F72 FOREIGN KEY (commune_id) REFERENCES commune (id)');
        $this->addSql('ALTER TABLE commune ADD CONSTRAINT FK_E2E2D1EE75E23604 FOREIGN KEY (town_id) REFERENCES town (id)');
        $this->addSql('ALTER TABLE street ADD CONSTRAINT FK_F0EED3D8BD0F409C FOREIGN KEY (area_id) REFERENCES area (id)');
        $this->addSql('ALTER TABLE street ADD CONSTRAINT FK_F0EED3D8C021BC8C FOREIGN KEY (streets_zone_id) REFERENCES streets_zone (id)');
        $this->addSql('ALTER TABLE town ADD CONSTRAINT FK_4CE6C7A4F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('DROP TABLE test');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE street DROP FOREIGN KEY FK_F0EED3D8BD0F409C');
        $this->addSql('ALTER TABLE area DROP FOREIGN KEY FK_D7943D68131A4F72');
        $this->addSql('ALTER TABLE town DROP FOREIGN KEY FK_4CE6C7A4F92F3E70');
        $this->addSql('ALTER TABLE street DROP FOREIGN KEY FK_F0EED3D8C021BC8C');
        $this->addSql('ALTER TABLE commune DROP FOREIGN KEY FK_E2E2D1EE75E23604');
        $this->addSql('CREATE TABLE test (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, obs VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE area');
        $this->addSql('DROP TABLE commune');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE street');
        $this->addSql('DROP TABLE streets_zone');
        $this->addSql('DROP TABLE town');
    }
}
