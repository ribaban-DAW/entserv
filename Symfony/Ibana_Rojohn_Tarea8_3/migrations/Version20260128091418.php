<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260128091418 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE zonas (id INT AUTO_INCREMENT NOT NULL, poblacion VARCHAR(255) NOT NULL, provincia VARCHAR(255) NOT NULL, codigopostal VARCHAR(255) NOT NULL, pais VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE piedra ADD zona_id INT NOT NULL');
        $this->addSql('ALTER TABLE piedra ADD CONSTRAINT FK_4A589729104EA8FC FOREIGN KEY (zona_id) REFERENCES zonas (id)');
        $this->addSql('CREATE INDEX IDX_4A589729104EA8FC ON piedra (zona_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE zonas');
        $this->addSql('ALTER TABLE piedra DROP FOREIGN KEY FK_4A589729104EA8FC');
        $this->addSql('DROP INDEX IDX_4A589729104EA8FC ON piedra');
        $this->addSql('ALTER TABLE piedra DROP zona_id');
    }
}
