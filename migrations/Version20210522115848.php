<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210522115848 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE campervans (id INT AUTO_INCREMENT NOT NULL, station_id INT DEFAULT NULL, target_plate VARCHAR(255) NOT NULL, INDEX IDX_DBDC321D21BDB235 (station_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipment_quantity (id INT AUTO_INCREMENT NOT NULL, station_id INT DEFAULT NULL, equipment_id INT DEFAULT NULL, quantity INT NOT NULL, INDEX IDX_AF30921021BDB235 (station_id), INDEX IDX_AF309210517FE9FE (equipment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipments (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `orders` (id INT AUTO_INCREMENT NOT NULL, start_station_id INT NOT NULL, end_station_id INT NOT NULL, campervan_id INT NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, INDEX IDX_E52FFDEE53721DCB (start_station_id), INDEX IDX_E52FFDEE2FF5EABB (end_station_id), INDEX IDX_E52FFDEEB9D53E94 (campervan_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stations (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE campervans ADD CONSTRAINT FK_DBDC321D21BDB235 FOREIGN KEY (station_id) REFERENCES stations (id)');
        $this->addSql('ALTER TABLE equipment_quantity ADD CONSTRAINT FK_AF30921021BDB235 FOREIGN KEY (station_id) REFERENCES stations (id)');
        $this->addSql('ALTER TABLE equipment_quantity ADD CONSTRAINT FK_AF309210517FE9FE FOREIGN KEY (equipment_id) REFERENCES equipments (id)');
        $this->addSql('ALTER TABLE `orders` ADD CONSTRAINT FK_E52FFDEE53721DCB FOREIGN KEY (start_station_id) REFERENCES stations (id)');
        $this->addSql('ALTER TABLE `orders` ADD CONSTRAINT FK_E52FFDEE2FF5EABB FOREIGN KEY (end_station_id) REFERENCES stations (id)');
        $this->addSql('ALTER TABLE `orders` ADD CONSTRAINT FK_E52FFDEEB9D53E94 FOREIGN KEY (campervan_id) REFERENCES campervans (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `orders` DROP FOREIGN KEY FK_E52FFDEEB9D53E94');
        $this->addSql('ALTER TABLE equipment_quantity DROP FOREIGN KEY FK_AF309210517FE9FE');
        $this->addSql('ALTER TABLE campervans DROP FOREIGN KEY FK_DBDC321D21BDB235');
        $this->addSql('ALTER TABLE equipment_quantity DROP FOREIGN KEY FK_AF30921021BDB235');
        $this->addSql('ALTER TABLE `orders` DROP FOREIGN KEY FK_E52FFDEE53721DCB');
        $this->addSql('ALTER TABLE `orders` DROP FOREIGN KEY FK_E52FFDEE2FF5EABB');
        $this->addSql('DROP TABLE campervans');
        $this->addSql('DROP TABLE equipment_quantity');
        $this->addSql('DROP TABLE equipments');
        $this->addSql('DROP TABLE `orders`');
        $this->addSql('DROP TABLE stations');
    }
}
