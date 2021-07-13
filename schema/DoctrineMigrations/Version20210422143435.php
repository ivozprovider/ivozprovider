<?php

declare(strict_types=1);

namespace Application\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Ivoz\Core\Infrastructure\Persistence\Doctrine\LoggableMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210422143435 extends LoggableMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Brands DROP FOREIGN KEY Brands_ibfk_2');
        $this->addSql('ALTER TABLE Brands CHANGE languageId languageId INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE Brands ADD CONSTRAINT FK_790E4102940D8C7E FOREIGN KEY (languageId) REFERENCES Languages (id) ON DELETE RESTRICT');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Brands DROP FOREIGN KEY FK_790E4102940D8C7E');
        $this->addSql('ALTER TABLE Brands CHANGE languageId languageId INT UNSIGNED DEFAULT NULL');
        $this->addSql('ALTER TABLE Brands ADD CONSTRAINT Brands_ibfk_2 FOREIGN KEY (languageId) REFERENCES Languages (id) ON DELETE SET NULL');
    }
}
