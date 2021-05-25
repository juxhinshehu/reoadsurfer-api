<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210522141220 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `equipment_quantities` (id INT AUTO_INCREMENT NOT NULL, station_id INT DEFAULT NULL, equipment_id INT DEFAULT NULL, quantity INT NOT NULL, INDEX IDX_D8BA41E221BDB235 (station_id), INDEX IDX_D8BA41E2517FE9FE (equipment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order_equipments` (id INT AUTO_INCREMENT NOT NULL, equipment_id INT NOT NULL, parent_order_id INT NOT NULL, quantity INT NOT NULL, INDEX IDX_DCB6D811517FE9FE (equipment_id), INDEX IDX_DCB6D8111252C1E9 (parent_order_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `equipment_quantities` ADD CONSTRAINT FK_D8BA41E221BDB235 FOREIGN KEY (station_id) REFERENCES stations (id)');
        $this->addSql('ALTER TABLE `equipment_quantities` ADD CONSTRAINT FK_D8BA41E2517FE9FE FOREIGN KEY (equipment_id) REFERENCES equipments (id)');
        $this->addSql('ALTER TABLE `order_equipments` ADD CONSTRAINT FK_DCB6D811517FE9FE FOREIGN KEY (equipment_id) REFERENCES equipments (id)');
        $this->addSql('ALTER TABLE `order_equipments` ADD CONSTRAINT FK_DCB6D8111252C1E9 FOREIGN KEY (parent_order_id) REFERENCES `orders` (id)');
        $this->addSql('DROP TABLE equipment_quantity');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE equipment_quantity (id INT AUTO_INCREMENT NOT NULL, station_id INT DEFAULT NULL, equipment_id INT DEFAULT NULL, quantity INT NOT NULL, INDEX IDX_AF30921021BDB235 (station_id), INDEX IDX_AF309210517FE9FE (equipment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE equipment_quantity ADD CONSTRAINT FK_AF30921021BDB235 FOREIGN KEY (station_id) REFERENCES stations (id)');
        $this->addSql('ALTER TABLE equipment_quantity ADD CONSTRAINT FK_AF309210517FE9FE FOREIGN KEY (equipment_id) REFERENCES equipments (id)');
        $this->addSql('DROP TABLE `equipment_quantities`');
        $this->addSql('DROP TABLE `order_equipments`');
    }
}
