<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180921134026 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cms_gindre_contact ADD shop_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE cms_gindre_contact ADD CONSTRAINT FK_DFEAE8B64D16C4DD FOREIGN KEY (shop_id) REFERENCES cms_gindre_shop (id)');
        $this->addSql('CREATE INDEX IDX_DFEAE8B64D16C4DD ON cms_gindre_contact (shop_id)');
        $this->addSql('ALTER TABLE cms_gindre_shop DROP FOREIGN KEY FK_76D8CA01719FB48E');
        $this->addSql('DROP INDEX IDX_76D8CA01719FB48E ON cms_gindre_shop');
        $this->addSql('ALTER TABLE cms_gindre_shop DROP contacts_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cms_gindre_contact DROP FOREIGN KEY FK_DFEAE8B64D16C4DD');
        $this->addSql('DROP INDEX IDX_DFEAE8B64D16C4DD ON cms_gindre_contact');
        $this->addSql('ALTER TABLE cms_gindre_contact DROP shop_id');
        $this->addSql('ALTER TABLE cms_gindre_shop ADD contacts_id CHAR(36) DEFAULT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE cms_gindre_shop ADD CONSTRAINT FK_76D8CA01719FB48E FOREIGN KEY (contacts_id) REFERENCES cms_gindre_contact (id)');
        $this->addSql('CREATE INDEX IDX_76D8CA01719FB48E ON cms_gindre_shop (contacts_id)');
    }
}
