<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191230122316 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE keyword (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE info (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, subject VARCHAR(255) NOT NULL, source VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, author VARCHAR(255) DEFAULT NULL, moreabout LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE info_category (info_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_117962AB5D8BC1F8 (info_id), INDEX IDX_117962AB12469DE2 (category_id), PRIMARY KEY(info_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE info_keyword (info_id INT NOT NULL, keyword_id INT NOT NULL, INDEX IDX_D85658A55D8BC1F8 (info_id), INDEX IDX_D85658A5115D4552 (keyword_id), PRIMARY KEY(info_id, keyword_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE info_category ADD CONSTRAINT FK_117962AB5D8BC1F8 FOREIGN KEY (info_id) REFERENCES info (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE info_category ADD CONSTRAINT FK_117962AB12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE info_keyword ADD CONSTRAINT FK_D85658A55D8BC1F8 FOREIGN KEY (info_id) REFERENCES info (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE info_keyword ADD CONSTRAINT FK_D85658A5115D4552 FOREIGN KEY (keyword_id) REFERENCES keyword (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE info_category DROP FOREIGN KEY FK_117962AB12469DE2');
        $this->addSql('ALTER TABLE info_keyword DROP FOREIGN KEY FK_D85658A5115D4552');
        $this->addSql('ALTER TABLE info_category DROP FOREIGN KEY FK_117962AB5D8BC1F8');
        $this->addSql('ALTER TABLE info_keyword DROP FOREIGN KEY FK_D85658A55D8BC1F8');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE keyword');
        $this->addSql('DROP TABLE info');
        $this->addSql('DROP TABLE info_category');
        $this->addSql('DROP TABLE info_keyword');
    }
}
