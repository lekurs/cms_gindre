<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180922124309 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cms_gindre_statut_shop (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', type VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_142DED318CDE5729 (type), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cms_gindre_departement CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE cms_gindre_shop ADD statut_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', ADD type TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE cms_gindre_shop ADD CONSTRAINT FK_76D8CA01F6203804 FOREIGN KEY (statut_id) REFERENCES cms_gindre_statut_shop (id)');
        $this->addSql('CREATE INDEX IDX_76D8CA01F6203804 ON cms_gindre_shop (statut_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cms_gindre_shop DROP FOREIGN KEY FK_76D8CA01F6203804');
        $this->addSql('DROP TABLE cms_gindre_statut_shop');
        $this->addSql('ALTER TABLE cms_gindre_departement CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('DROP INDEX IDX_76D8CA01F6203804 ON cms_gindre_shop');
        $this->addSql('ALTER TABLE cms_gindre_shop DROP statut_id, DROP type');
    }
}
