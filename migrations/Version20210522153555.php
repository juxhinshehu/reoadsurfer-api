<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210522153555 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_equipments DROP FOREIGN KEY FK_DCB6D8111252C1E9');
        $this->addSql('DROP INDEX IDX_DCB6D8111252C1E9 ON order_equipments');
        $this->addSql('ALTER TABLE order_equipments ADD order_id INT DEFAULT NULL, DROP parent_order_id');
        $this->addSql('ALTER TABLE order_equipments ADD CONSTRAINT FK_DCB6D8118D9F6D38 FOREIGN KEY (order_id) REFERENCES `orders` (id)');
        $this->addSql('CREATE INDEX IDX_DCB6D8118D9F6D38 ON order_equipments (order_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order_equipments` DROP FOREIGN KEY FK_DCB6D8118D9F6D38');
        $this->addSql('DROP INDEX IDX_DCB6D8118D9F6D38 ON `order_equipments`');
        $this->addSql('ALTER TABLE `order_equipments` ADD parent_order_id INT NOT NULL, DROP order_id');
        $this->addSql('ALTER TABLE `order_equipments` ADD CONSTRAINT FK_DCB6D8111252C1E9 FOREIGN KEY (parent_order_id) REFERENCES orders (id)');
        $this->addSql('CREATE INDEX IDX_DCB6D8111252C1E9 ON `order_equipments` (parent_order_id)');
    }
}
