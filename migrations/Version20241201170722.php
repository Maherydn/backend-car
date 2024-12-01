<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241201170722 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE administrative_document (id INT AUTO_INCREMENT NOT NULL, car_detail_id INT DEFAULT NULL, registration_certificate VARCHAR(255) NOT NULL, technical_inspection_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_71CBFD04DF32F197 (car_detail_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car (id INT AUTO_INCREMENT NOT NULL, companie_id INT DEFAULT NULL, brand VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, year INT NOT NULL, registration_number VARCHAR(255) NOT NULL, available TINYINT(1) NOT NULL, INDEX IDX_773DE69D9DC4CE1F (companie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car_detail (id INT AUTO_INCREMENT NOT NULL, mileage INT NOT NULL, last_maintenace_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car_status (id INT AUTO_INCREMENT NOT NULL, car_id INT DEFAULT NULL, status VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_636889EEC3C6F69F (car_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE companie (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, phone INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fuel_type (id INT AUTO_INCREMENT NOT NULL, car_detail_id INT DEFAULT NULL, fuel_type_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_9CA10F38DF32F197 (car_detail_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE garage (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE maintenance (id INT AUTO_INCREMENT NOT NULL, car_id INT DEFAULT NULL, garage_id INT DEFAULT NULL, maintenance_type VARCHAR(255) NOT NULL, maintenace_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', cost INT NOT NULL, comment VARCHAR(255) NOT NULL, INDEX IDX_2F84F8E9C3C6F69F (car_id), INDEX IDX_2F84F8E9C4FFF555 (garage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transmission (id INT AUTO_INCREMENT NOT NULL, car_detail_id INT DEFAULT NULL, transmission_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_7F87199FDF32F197 (car_detail_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, companie_id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_8D93D6499DC4CE1F (companie_id), UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE administrative_document ADD CONSTRAINT FK_71CBFD04DF32F197 FOREIGN KEY (car_detail_id) REFERENCES car_detail (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D9DC4CE1F FOREIGN KEY (companie_id) REFERENCES companie (id)');
        $this->addSql('ALTER TABLE car_status ADD CONSTRAINT FK_636889EEC3C6F69F FOREIGN KEY (car_id) REFERENCES car (id)');
        $this->addSql('ALTER TABLE fuel_type ADD CONSTRAINT FK_9CA10F38DF32F197 FOREIGN KEY (car_detail_id) REFERENCES car_detail (id)');
        $this->addSql('ALTER TABLE maintenance ADD CONSTRAINT FK_2F84F8E9C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id)');
        $this->addSql('ALTER TABLE maintenance ADD CONSTRAINT FK_2F84F8E9C4FFF555 FOREIGN KEY (garage_id) REFERENCES garage (id)');
        $this->addSql('ALTER TABLE transmission ADD CONSTRAINT FK_7F87199FDF32F197 FOREIGN KEY (car_detail_id) REFERENCES car_detail (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D6499DC4CE1F FOREIGN KEY (companie_id) REFERENCES companie (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE administrative_document DROP FOREIGN KEY FK_71CBFD04DF32F197');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D9DC4CE1F');
        $this->addSql('ALTER TABLE car_status DROP FOREIGN KEY FK_636889EEC3C6F69F');
        $this->addSql('ALTER TABLE fuel_type DROP FOREIGN KEY FK_9CA10F38DF32F197');
        $this->addSql('ALTER TABLE maintenance DROP FOREIGN KEY FK_2F84F8E9C3C6F69F');
        $this->addSql('ALTER TABLE maintenance DROP FOREIGN KEY FK_2F84F8E9C4FFF555');
        $this->addSql('ALTER TABLE transmission DROP FOREIGN KEY FK_7F87199FDF32F197');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D6499DC4CE1F');
        $this->addSql('DROP TABLE administrative_document');
        $this->addSql('DROP TABLE car');
        $this->addSql('DROP TABLE car_detail');
        $this->addSql('DROP TABLE car_status');
        $this->addSql('DROP TABLE companie');
        $this->addSql('DROP TABLE fuel_type');
        $this->addSql('DROP TABLE garage');
        $this->addSql('DROP TABLE maintenance');
        $this->addSql('DROP TABLE transmission');
        $this->addSql('DROP TABLE `user`');
    }
}
