<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260127151459 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE doctor (id INT AUTO_INCREMENT NOT NULL, especialidad VARCHAR(45) NOT NULL, nombre VARCHAR(45) NOT NULL, historial_id INT NOT NULL, INDEX IDX_1FC0F36ADF46FF85 (historial_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE historial (id INT AUTO_INCREMENT NOT NULL, fecha DATETIME NOT NULL, paciente VARCHAR(45) NOT NULL, codigo_historial INT NOT NULL, especialista VARCHAR(45) NOT NULL, alergias VARCHAR(45) NOT NULL, antecedentes VARCHAR(45) NOT NULL, sintomas VARCHAR(45) NOT NULL, diagnostico VARCHAR(45) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE paciente (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(45) NOT NULL, apellidos VARCHAR(45) NOT NULL, sexo VARCHAR(45) NOT NULL, edad INT NOT NULL, doctor_id INT NOT NULL, INDEX IDX_C6CBA95E87F4FB17 (doctor_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE doctor ADD CONSTRAINT FK_1FC0F36ADF46FF85 FOREIGN KEY (historial_id) REFERENCES historial (id)');
        $this->addSql('ALTER TABLE paciente ADD CONSTRAINT FK_C6CBA95E87F4FB17 FOREIGN KEY (doctor_id) REFERENCES doctor (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE doctor DROP FOREIGN KEY FK_1FC0F36ADF46FF85');
        $this->addSql('ALTER TABLE paciente DROP FOREIGN KEY FK_C6CBA95E87F4FB17');
        $this->addSql('DROP TABLE doctor');
        $this->addSql('DROP TABLE historial');
        $this->addSql('DROP TABLE paciente');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
