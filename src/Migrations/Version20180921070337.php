<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180921070337 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cms_gindre_contact (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, phone_one INT DEFAULT NULL, phone_mobile INT DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, main TINYINT(1) DEFAULT NULL, UNIQUE INDEX UNIQ_DFEAE8B61D358679 (phone_one), UNIQUE INDEX UNIQ_DFEAE8B6C1E280EF (phone_mobile), UNIQUE INDEX UNIQ_DFEAE8B6E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cms_gindre_role (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', contacts_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', role VARCHAR(150) NOT NULL, INDEX IDX_8DDB0CC9719FB48E (contacts_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cms_gindre_role ADD CONSTRAINT FK_8DDB0CC9719FB48E FOREIGN KEY (contacts_id) REFERENCES cms_gindre_contact (id)');
        $this->addSql('ALTER TABLE cms_gindre_shop ADD contacts_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE cms_gindre_shop ADD CONSTRAINT FK_76D8CA01719FB48E FOREIGN KEY (contacts_id) REFERENCES cms_gindre_contact (id)');
        $this->addSql('CREATE INDEX IDX_76D8CA01719FB48E ON cms_gindre_shop (contacts_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cms_gindre_role DROP FOREIGN KEY FK_8DDB0CC9719FB48E');
        $this->addSql('ALTER TABLE cms_gindre_shop DROP FOREIGN KEY FK_76D8CA01719FB48E');
        $this->addSql('DROP TABLE cms_gindre_contact');
        $this->addSql('DROP TABLE cms_gindre_role');
        $this->addSql('DROP INDEX IDX_76D8CA01719FB48E ON cms_gindre_shop');
        $this->addSql('ALTER TABLE cms_gindre_shop DROP contacts_id');
    }
}
