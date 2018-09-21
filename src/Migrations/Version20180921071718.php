<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180921071718 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cms_gindre_message (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', contact_type_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', message LONGTEXT NOT NULL, date_contact DATE NOT NULL, INDEX IDX_25353EF15F63AD12 (contact_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cms_gindre_message ADD CONSTRAINT FK_25353EF15F63AD12 FOREIGN KEY (contact_type_id) REFERENCES cms_gindre_contact_type (id)');
        $this->addSql('ALTER TABLE cms_gindre_contact DROP FOREIGN KEY FK_DFEAE8B65F63AD12');
        $this->addSql('DROP INDEX IDX_DFEAE8B65F63AD12 ON cms_gindre_contact');
        $this->addSql('ALTER TABLE cms_gindre_contact DROP contact_type_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE cms_gindre_message');
        $this->addSql('ALTER TABLE cms_gindre_contact ADD contact_type_id CHAR(36) DEFAULT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE cms_gindre_contact ADD CONSTRAINT FK_DFEAE8B65F63AD12 FOREIGN KEY (contact_type_id) REFERENCES cms_gindre_contact_type (id)');
        $this->addSql('CREATE INDEX IDX_DFEAE8B65F63AD12 ON cms_gindre_contact (contact_type_id)');
    }
}
