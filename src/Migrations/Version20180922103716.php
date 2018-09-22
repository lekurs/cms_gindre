<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180922103716 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cms_gindre_departement ADD region_id INT DEFAULT NULL, ADD zip VARCHAR(2) NOT NULL');
        $this->addSql('ALTER TABLE cms_gindre_departement ADD CONSTRAINT FK_5C3267DC98260155 FOREIGN KEY (region_id) REFERENCES cms_gindre_region (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5C3267DC421D9546 ON cms_gindre_departement (zip)');
        $this->addSql('CREATE INDEX IDX_5C3267DC98260155 ON cms_gindre_departement (region_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cms_gindre_departement DROP FOREIGN KEY FK_5C3267DC98260155');
        $this->addSql('DROP INDEX UNIQ_5C3267DC421D9546 ON cms_gindre_departement');
        $this->addSql('DROP INDEX IDX_5C3267DC98260155 ON cms_gindre_departement');
        $this->addSql('ALTER TABLE cms_gindre_departement DROP region_id, DROP zip');
    }
}
