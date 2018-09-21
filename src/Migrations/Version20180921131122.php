<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180921131122 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cms_gindre_contact ADD slug VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DFEAE8B6989D9B62 ON cms_gindre_contact (slug)');
        $this->addSql('ALTER TABLE cms_gindre_shop ADD slug VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_76D8CA01989D9B62 ON cms_gindre_shop (slug)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX UNIQ_DFEAE8B6989D9B62 ON cms_gindre_contact');
        $this->addSql('ALTER TABLE cms_gindre_contact DROP slug');
        $this->addSql('DROP INDEX UNIQ_76D8CA01989D9B62 ON cms_gindre_shop');
        $this->addSql('ALTER TABLE cms_gindre_shop DROP slug');
    }
}
