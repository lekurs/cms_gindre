<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181025092819 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cms_gindre_shop ADD departement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cms_gindre_shop ADD CONSTRAINT FK_76D8CA01CCF9E01E FOREIGN KEY (departement_id) REFERENCES cms_gindre_departement (id)');
        $this->addSql('CREATE INDEX IDX_76D8CA01CCF9E01E ON cms_gindre_shop (departement_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cms_gindre_shop DROP FOREIGN KEY FK_76D8CA01CCF9E01E');
        $this->addSql('DROP INDEX IDX_76D8CA01CCF9E01E ON cms_gindre_shop');
        $this->addSql('ALTER TABLE cms_gindre_shop DROP departement_id');
    }
}
