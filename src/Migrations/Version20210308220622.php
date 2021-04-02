<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210308220622 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE department (id INT AUTO_INCREMENT NOT NULL, wording VARCHAR(100) NOT NULL, obs VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE member (id INT AUTO_INCREMENT NOT NULL, street_id INT DEFAULT NULL, streets_zone_id INT DEFAULT NULL, area_id INT DEFAULT NULL, department_id INT DEFAULT NULL, name VARCHAR(100) NOT NULL, last_name VARCHAR(100) NOT NULL, first_name VARCHAR(100) NOT NULL, civility VARCHAR(50) DEFAULT NULL, num_address VARCHAR(20) DEFAULT NULL, phone1 VARCHAR(30) DEFAULT NULL, phone2 VARCHAR(30) NOT NULL, arrived_date DATE DEFAULT NULL, captured_date DATETIME NOT NULL, gender VARCHAR(12) NOT NULL, send_other_sms TINYINT(1) NOT NULL, send_cult_sms TINYINT(1) NOT NULL, INDEX IDX_70E4FA7887CF8EB (street_id), INDEX IDX_70E4FA78C021BC8C (streets_zone_id), INDEX IDX_70E4FA78BD0F409C (area_id), INDEX IDX_70E4FA78AE80F5DF (department_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE member_status (member_id INT NOT NULL, status_id INT NOT NULL, INDEX IDX_5FD6E72F7597D3FE (member_id), INDEX IDX_5FD6E72F6BF700BD (status_id), PRIMARY KEY(member_id, status_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, wording VARCHAR(100) NOT NULL, obs VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE member ADD CONSTRAINT FK_70E4FA7887CF8EB FOREIGN KEY (street_id) REFERENCES street (id)');
        $this->addSql('ALTER TABLE member ADD CONSTRAINT FK_70E4FA78C021BC8C FOREIGN KEY (streets_zone_id) REFERENCES streets_zone (id)');
        $this->addSql('ALTER TABLE member ADD CONSTRAINT FK_70E4FA78BD0F409C FOREIGN KEY (area_id) REFERENCES area (id)');
        $this->addSql('ALTER TABLE member ADD CONSTRAINT FK_70E4FA78AE80F5DF FOREIGN KEY (department_id) REFERENCES department (id)');
        $this->addSql('ALTER TABLE member_status ADD CONSTRAINT FK_5FD6E72F7597D3FE FOREIGN KEY (member_id) REFERENCES member (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE member_status ADD CONSTRAINT FK_5FD6E72F6BF700BD FOREIGN KEY (status_id) REFERENCES status (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE member DROP FOREIGN KEY FK_70E4FA78AE80F5DF');
        $this->addSql('ALTER TABLE member_status DROP FOREIGN KEY FK_5FD6E72F7597D3FE');
        $this->addSql('ALTER TABLE member_status DROP FOREIGN KEY FK_5FD6E72F6BF700BD');
        $this->addSql('DROP TABLE department');
        $this->addSql('DROP TABLE member');
        $this->addSql('DROP TABLE member_status');
        $this->addSql('DROP TABLE status');
    }
}
