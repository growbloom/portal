<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190708193251 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Create the Temperature and TemperatureUnit tables.';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE temperature_unit (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(10) NOT NULL, notation VARCHAR(2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE temperature (id INT AUTO_INCREMENT NOT NULL, unit_id INT NOT NULL, value DOUBLE PRECISION NOT NULL, measured_at DATETIME NOT NULL, INDEX IDX_BE4E2A6CF8BD700D (unit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE temperature ADD CONSTRAINT FK_BE4E2A6CF8BD700D FOREIGN KEY (unit_id) REFERENCES temperature_unit (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE temperature DROP FOREIGN KEY FK_BE4E2A6CF8BD700D');
        $this->addSql('DROP TABLE temperature_unit');
        $this->addSql('DROP TABLE temperature');
    }
}
