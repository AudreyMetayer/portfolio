<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210203105958 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE language (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, identifier VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE language_projet (language_id INT NOT NULL, projet_id INT NOT NULL, INDEX IDX_4C06A5CF82F1BAF4 (language_id), INDEX IDX_4C06A5CFC18272 (projet_id), PRIMARY KEY(language_id, projet_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE picture (id INT AUTO_INCREMENT NOT NULL, projet_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, INDEX IDX_16DB4F89C18272 (projet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projet (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, duration VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, client VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, job VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE language_projet ADD CONSTRAINT FK_4C06A5CF82F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE language_projet ADD CONSTRAINT FK_4C06A5CFC18272 FOREIGN KEY (projet_id) REFERENCES projet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F89C18272 FOREIGN KEY (projet_id) REFERENCES projet (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE language_projet DROP FOREIGN KEY FK_4C06A5CF82F1BAF4');
        $this->addSql('ALTER TABLE language_projet DROP FOREIGN KEY FK_4C06A5CFC18272');
        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F89C18272');
        $this->addSql('DROP TABLE language');
        $this->addSql('DROP TABLE language_projet');
        $this->addSql('DROP TABLE picture');
        $this->addSql('DROP TABLE projet');
        $this->addSql('DROP TABLE user');
    }
}
