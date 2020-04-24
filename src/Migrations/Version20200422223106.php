<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200422223106 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE zone (id INT AUTO_INCREMENT NOT NULL, intituler_zone VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ville ADD zone_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ville ADD CONSTRAINT FK_43C3D9C39F2C3FAB FOREIGN KEY (zone_id) REFERENCES zone (id)');
        $this->addSql('CREATE INDEX IDX_43C3D9C39F2C3FAB ON ville (zone_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ville DROP FOREIGN KEY FK_43C3D9C39F2C3FAB');
        $this->addSql('DROP TABLE zone');
        $this->addSql('DROP INDEX IDX_43C3D9C39F2C3FAB ON ville');
        $this->addSql('ALTER TABLE ville DROP zone_id');
    }
}
