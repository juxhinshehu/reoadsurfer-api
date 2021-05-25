<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210523074826 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE equipment_quantities_per_day (id INT AUTO_INCREMENT NOT NULL, equipment_quantity_id INT DEFAULT NULL, bookings_counter INT NOT NULL, INDEX IDX_76B574421FC9BEDB (equipment_quantity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE equipment_quantities_per_day ADD CONSTRAINT FK_76B574421FC9BEDB FOREIGN KEY (equipment_quantity_id) REFERENCES `equipment_quantities` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE equipment_quantities_per_day');
    }
}
