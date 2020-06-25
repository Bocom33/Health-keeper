<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200625155423 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annoyance (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE annoyance_zone (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medical_record (id INT AUTO_INCREMENT NOT NULL, annoyance_zone_id INT NOT NULL, pain_intensity_id INT NOT NULL, annoyance_id INT NOT NULL, user_id INT NOT NULL, created_at DATETIME NOT NULL, details VARCHAR(255) DEFAULT NULL, INDEX IDX_F06A283E7F3DE187 (annoyance_zone_id), INDEX IDX_F06A283E8DF2D081 (pain_intensity_id), INDEX IDX_F06A283E613E94CE (annoyance_id), INDEX IDX_F06A283EA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pain_intensity (id INT AUTO_INCREMENT NOT NULL, level INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(80) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(60) NOT NULL, forname VARCHAR(30) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE medical_record ADD CONSTRAINT FK_F06A283E7F3DE187 FOREIGN KEY (annoyance_zone_id) REFERENCES annoyance_zone (id)');
        $this->addSql('ALTER TABLE medical_record ADD CONSTRAINT FK_F06A283E8DF2D081 FOREIGN KEY (pain_intensity_id) REFERENCES pain_intensity (id)');
        $this->addSql('ALTER TABLE medical_record ADD CONSTRAINT FK_F06A283E613E94CE FOREIGN KEY (annoyance_id) REFERENCES annoyance (id)');
        $this->addSql('ALTER TABLE medical_record ADD CONSTRAINT FK_F06A283EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medical_record DROP FOREIGN KEY FK_F06A283E613E94CE');
        $this->addSql('ALTER TABLE medical_record DROP FOREIGN KEY FK_F06A283E7F3DE187');
        $this->addSql('ALTER TABLE medical_record DROP FOREIGN KEY FK_F06A283E8DF2D081');
        $this->addSql('ALTER TABLE medical_record DROP FOREIGN KEY FK_F06A283EA76ED395');
        $this->addSql('DROP TABLE annoyance');
        $this->addSql('DROP TABLE annoyance_zone');
        $this->addSql('DROP TABLE medical_record');
        $this->addSql('DROP TABLE pain_intensity');
        $this->addSql('DROP TABLE user');
    }
}
