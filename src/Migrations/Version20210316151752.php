<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210316151752 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE streets_zone ADD commune_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE streets_zone ADD CONSTRAINT FK_B4C447DD131A4F72 FOREIGN KEY (commune_id) REFERENCES commune (id)');
        $this->addSql('CREATE INDEX IDX_B4C447DD131A4F72 ON streets_zone (commune_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE streets_zone DROP FOREIGN KEY FK_B4C447DD131A4F72');
        $this->addSql('DROP INDEX IDX_B4C447DD131A4F72 ON streets_zone');
        $this->addSql('ALTER TABLE streets_zone DROP commune_id');
    }
}
