<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191126160506 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE language (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE framework (id INT AUTO_INCREMENT NOT NULL, language_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_9D766E1982F1BAF4 (language_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE framework_type (framework_id INT NOT NULL, type_id INT NOT NULL, INDEX IDX_F361B24437AECF72 (framework_id), INDEX IDX_F361B244C54C8C93 (type_id), PRIMARY KEY(framework_id, type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE framework ADD CONSTRAINT FK_9D766E1982F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id)');
        $this->addSql('ALTER TABLE framework_type ADD CONSTRAINT FK_F361B24437AECF72 FOREIGN KEY (framework_id) REFERENCES framework (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE framework_type ADD CONSTRAINT FK_F361B244C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE framework DROP FOREIGN KEY FK_9D766E1982F1BAF4');
        $this->addSql('ALTER TABLE framework_type DROP FOREIGN KEY FK_F361B244C54C8C93');
        $this->addSql('ALTER TABLE framework_type DROP FOREIGN KEY FK_F361B24437AECF72');
        $this->addSql('DROP TABLE language');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE framework');
        $this->addSql('DROP TABLE framework_type');
    }
}
