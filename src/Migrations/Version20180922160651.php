<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180922160651 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cms_gindre_departement (id INT NOT NULL, region_id INT DEFAULT NULL, zip VARCHAR(2) NOT NULL, departement VARCHAR(100) NOT NULL, UNIQUE INDEX UNIQ_5C3267DC421D9546 (zip), UNIQUE INDEX UNIQ_5C3267DCC1765B63 (departement), INDEX IDX_5C3267DC98260155 (region_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cms_gindre_status_shop (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', status VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_928DD897B00651C (status), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cms_gindre_departement ADD CONSTRAINT FK_5C3267DC98260155 FOREIGN KEY (region_id) REFERENCES cms_gindre_region (id)');
        $this->addSql('ALTER TABLE cms_gindre_region DROP dept, DROP zip');
        $this->addSql('ALTER TABLE cms_gindre_shop ADD status_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', ADD prospect TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE cms_gindre_shop ADD CONSTRAINT FK_76D8CA016BF700BD FOREIGN KEY (status_id) REFERENCES cms_gindre_status_shop (id)');
        $this->addSql('CREATE INDEX IDX_76D8CA016BF700BD ON cms_gindre_shop (status_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cms_gindre_shop DROP FOREIGN KEY FK_76D8CA016BF700BD');
        $this->addSql('DROP TABLE cms_gindre_departement');
        $this->addSql('DROP TABLE cms_gindre_status_shop');
        $this->addSql('ALTER TABLE cms_gindre_region ADD dept VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD zip INT NOT NULL');
        $this->addSql('DROP INDEX IDX_76D8CA016BF700BD ON cms_gindre_shop');
        $this->addSql('ALTER TABLE cms_gindre_shop DROP status_id, DROP prospect');
    }
}
