<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181022172814 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cms_gindre_commande (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', shop_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', product_type_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', date_commande DATE NOT NULL, amout INT NOT NULL, INDEX IDX_647980544D16C4DD (shop_id), INDEX IDX_6479805414959723 (product_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cms_gindre_commande ADD CONSTRAINT FK_647980544D16C4DD FOREIGN KEY (shop_id) REFERENCES cms_gindre_shop (id)');
        $this->addSql('ALTER TABLE cms_gindre_commande ADD CONSTRAINT FK_6479805414959723 FOREIGN KEY (product_type_id) REFERENCES cms_gindre_product_type (id)');
        $this->addSql('DROP TABLE cms_gindre_order');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cms_gindre_order (id CHAR(36) NOT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:uuid)\', shop_id CHAR(36) DEFAULT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:uuid)\', product_type_id CHAR(36) DEFAULT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:uuid)\', date_order DATE NOT NULL, amout INT NOT NULL, INDEX IDX_BA2CD34C4D16C4DD (shop_id), INDEX IDX_BA2CD34C14959723 (product_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cms_gindre_order ADD CONSTRAINT FK_BA2CD34C14959723 FOREIGN KEY (product_type_id) REFERENCES cms_gindre_product_type (id)');
        $this->addSql('ALTER TABLE cms_gindre_order ADD CONSTRAINT FK_BA2CD34C4D16C4DD FOREIGN KEY (shop_id) REFERENCES cms_gindre_shop (id)');
        $this->addSql('DROP TABLE cms_gindre_commande');
    }
}
