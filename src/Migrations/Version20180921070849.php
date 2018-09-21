<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180921070849 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cms_gindre_contact ADD contact_type_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE cms_gindre_contact ADD CONSTRAINT FK_DFEAE8B65F63AD12 FOREIGN KEY (contact_type_id) REFERENCES cms_gindre_contact_type (id)');
        $this->addSql('CREATE INDEX IDX_DFEAE8B65F63AD12 ON cms_gindre_contact (contact_type_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cms_gindre_contact DROP FOREIGN KEY FK_DFEAE8B65F63AD12');
        $this->addSql('DROP INDEX IDX_DFEAE8B65F63AD12 ON cms_gindre_contact');
        $this->addSql('ALTER TABLE cms_gindre_contact DROP contact_type_id');
    }
}
