<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180921090441 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cms_gindre_product_type ADD orders_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE cms_gindre_product_type ADD CONSTRAINT FK_5A759FA9CFFE9AD6 FOREIGN KEY (orders_id) REFERENCES cms_gindre_order (id)');
        $this->addSql('CREATE INDEX IDX_5A759FA9CFFE9AD6 ON cms_gindre_product_type (orders_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cms_gindre_product_type DROP FOREIGN KEY FK_5A759FA9CFFE9AD6');
        $this->addSql('DROP INDEX IDX_5A759FA9CFFE9AD6 ON cms_gindre_product_type');
        $this->addSql('ALTER TABLE cms_gindre_product_type DROP orders_id');
    }
}
