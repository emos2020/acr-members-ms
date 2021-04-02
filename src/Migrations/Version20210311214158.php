<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210311214158 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, wording VARCHAR(50) NOT NULL, obs VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statuspec (id INT AUTO_INCREMENT NOT NULL, wording VARCHAR(50) NOT NULL, obs VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE member ADD status_id INT DEFAULT NULL, ADD statuspec_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE member ADD CONSTRAINT FK_70E4FA786BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE member ADD CONSTRAINT FK_70E4FA7826C3ADFC FOREIGN KEY (statuspec_id) REFERENCES statuspec (id)');
        $this->addSql('CREATE INDEX IDX_70E4FA786BF700BD ON member (status_id)');
        $this->addSql('CREATE INDEX IDX_70E4FA7826C3ADFC ON member (statuspec_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE member DROP FOREIGN KEY FK_70E4FA786BF700BD');
        $this->addSql('ALTER TABLE member DROP FOREIGN KEY FK_70E4FA7826C3ADFC');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE statuspec');
        $this->addSql('DROP INDEX IDX_70E4FA786BF700BD ON member');
        $this->addSql('DROP INDEX IDX_70E4FA7826C3ADFC ON member');
        $this->addSql('ALTER TABLE member DROP status_id, DROP statuspec_id');
    }
}
