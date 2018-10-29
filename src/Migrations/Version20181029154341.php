<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181029154341 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cms_gindre_shop_type (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', shop_type VARCHAR(100) NOT NULL, UNIQUE INDEX UNIQ_F94BA184D2CB152 (shop_type), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cms_gindre_contact CHANGE phone_one phone_one INTEGER(10) UNSIGNED ZEROFILL, CHANGE phone_mobile phone_mobile INTEGER(10) UNSIGNED ZEROFILL');
        $this->addSql('ALTER TABLE cms_gindre_shop CHANGE zip zip INTEGER(5) ZEROFILL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE cms_gindre_shop_type');
        $this->addSql('ALTER TABLE cms_gindre_contact CHANGE phone_one phone_one INT UNSIGNED DEFAULT NULL, CHANGE phone_mobile phone_mobile INT UNSIGNED DEFAULT NULL');
        $this->addSql('ALTER TABLE cms_gindre_shop CHANGE zip zip INT UNSIGNED DEFAULT NULL');
    }
}
