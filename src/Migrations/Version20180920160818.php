<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180920160818 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cms_gindre_shop (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', region_id INT DEFAULT NULL, name VARCHAR(200) NOT NULL, adress LONGTEXT NOT NULL, zip INT NOT NULL, city VARCHAR(100) NOT NULL, number VARCHAR(50) DEFAULT NULL, UNIQUE INDEX UNIQ_76D8CA0196901F54 (number), INDEX IDX_76D8CA0198260155 (region_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cms_gindre_shop ADD CONSTRAINT FK_76D8CA0198260155 FOREIGN KEY (region_id) REFERENCES cms_gindre_region (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE cms_gindre_shop');
    }
}
