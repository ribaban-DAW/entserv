<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260128094501 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pintura (id INT AUTO_INCREMENT NOT NULL, codigo VARCHAR(255) NOT NULL, color VARCHAR(255) NOT NULL, cantidad INT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE producto (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, piedra_id INT NOT NULL, pintura_id INT NOT NULL, INDEX IDX_A7BB0615A6D7D0E (piedra_id), INDEX IDX_A7BB0615FA223F39 (pintura_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE producto ADD CONSTRAINT FK_A7BB0615A6D7D0E FOREIGN KEY (piedra_id) REFERENCES piedra (id)');
        $this->addSql('ALTER TABLE producto ADD CONSTRAINT FK_A7BB0615FA223F39 FOREIGN KEY (pintura_id) REFERENCES pintura (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE producto DROP FOREIGN KEY FK_A7BB0615A6D7D0E');
        $this->addSql('ALTER TABLE producto DROP FOREIGN KEY FK_A7BB0615FA223F39');
        $this->addSql('DROP TABLE pintura');
        $this->addSql('DROP TABLE producto');
    }
}
