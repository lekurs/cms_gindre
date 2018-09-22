<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180922131824 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX IDX_76D8CA01F6203804 ON cms_gindre_shop');
        $this->addSql('ALTER TABLE cms_gindre_shop CHANGE statut_id status_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE cms_gindre_shop ADD CONSTRAINT FK_76D8CA016BF700BD FOREIGN KEY (status_id) REFERENCES cms_gindre_status_shop (id)');
        $this->addSql('CREATE INDEX IDX_76D8CA016BF700BD ON cms_gindre_shop (status_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cms_gindre_shop DROP FOREIGN KEY FK_76D8CA016BF700BD');
        $this->addSql('DROP INDEX IDX_76D8CA016BF700BD ON cms_gindre_shop');
        $this->addSql('ALTER TABLE cms_gindre_shop CHANGE status_id statut_id CHAR(36) DEFAULT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('CREATE INDEX IDX_76D8CA01F6203804 ON cms_gindre_shop (statut_id)');
    }
}
