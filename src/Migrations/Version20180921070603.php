<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180921070603 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cms_gindre_contact ADD role_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE cms_gindre_contact ADD CONSTRAINT FK_DFEAE8B6D60322AC FOREIGN KEY (role_id) REFERENCES cms_gindre_role (id)');
        $this->addSql('CREATE INDEX IDX_DFEAE8B6D60322AC ON cms_gindre_contact (role_id)');
        $this->addSql('ALTER TABLE cms_gindre_role DROP FOREIGN KEY FK_8DDB0CC9719FB48E');
        $this->addSql('DROP INDEX IDX_8DDB0CC9719FB48E ON cms_gindre_role');
        $this->addSql('ALTER TABLE cms_gindre_role DROP contacts_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cms_gindre_contact DROP FOREIGN KEY FK_DFEAE8B6D60322AC');
        $this->addSql('DROP INDEX IDX_DFEAE8B6D60322AC ON cms_gindre_contact');
        $this->addSql('ALTER TABLE cms_gindre_contact DROP role_id');
        $this->addSql('ALTER TABLE cms_gindre_role ADD contacts_id CHAR(36) DEFAULT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE cms_gindre_role ADD CONSTRAINT FK_8DDB0CC9719FB48E FOREIGN KEY (contacts_id) REFERENCES cms_gindre_contact (id)');
        $this->addSql('CREATE INDEX IDX_8DDB0CC9719FB48E ON cms_gindre_role (contacts_id)');
    }
}
