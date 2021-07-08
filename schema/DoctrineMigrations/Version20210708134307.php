<?php

namespace Application\Migrations;

use Ivoz\Core\Infrastructure\Persistence\Doctrine\LoggableMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20210708134307 extends LoggableMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE CallForwardSettings CHANGE targetType targetType VARCHAR(25) DEFAULT NULL COMMENT \'[enum:number|extension|voicemail|retail]\'');

        $this->addSql('ALTER TABLE CallForwardSettings ADD cfwToRetailAccountId INT UNSIGNED DEFAULT NULL');
        $this->addSql('ALTER TABLE CallForwardSettings ADD CONSTRAINT FK_E71B58A4DE65F396 FOREIGN KEY (cfwToRetailAccountId) REFERENCES RetailAccounts (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_E71B58A4DE65F396 ON CallForwardSettings (cfwToRetailAccountId)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE CallForwardSettings CHANGE targetType targetType VARCHAR(25) DEFAULT NULL COLLATE utf8_general_ci COMMENT \'[enum:number|extension|voicemail]\'');

        $this->addSql('ALTER TABLE CallForwardSettings DROP FOREIGN KEY FK_E71B58A4DE65F396');
        $this->addSql('DROP INDEX IDX_E71B58A4DE65F396 ON CallForwardSettings');
        $this->addSql('ALTER TABLE CallForwardSettings DROP cfwToRetailAccountId');
    }
}
