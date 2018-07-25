<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180725072925 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_F65593E57E3C61F9');
        $this->addSql('CREATE TEMPORARY TABLE __temp__annonce AS SELECT id, owner_id, title, description, create_at, picture FROM annonce');
        $this->addSql('DROP TABLE annonce');
        $this->addSql('CREATE TABLE annonce (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, owner_id INTEGER NOT NULL, title VARCHAR(255) NOT NULL COLLATE BINARY, description VARCHAR(255) NOT NULL COLLATE BINARY, create_at DATETIME NOT NULL, picture VARCHAR(255) NOT NULL COLLATE BINARY, region VARCHAR(255) NOT NULL, categorie VARCHAR(255) NOT NULL, detail VARCHAR(255) NOT NULL, CONSTRAINT FK_F65593E57E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO annonce (id, owner_id, title, description, create_at, picture) SELECT id, owner_id, title, description, create_at, picture FROM __temp__annonce');
        $this->addSql('DROP TABLE __temp__annonce');
        $this->addSql('CREATE INDEX IDX_F65593E57E3C61F9 ON annonce (owner_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_F65593E57E3C61F9');
        $this->addSql('CREATE TEMPORARY TABLE __temp__annonce AS SELECT id, owner_id, title, description, create_at, picture FROM annonce');
        $this->addSql('DROP TABLE annonce');
        $this->addSql('CREATE TABLE annonce (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, owner_id INTEGER NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, create_at DATETIME NOT NULL, picture VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO annonce (id, owner_id, title, description, create_at, picture) SELECT id, owner_id, title, description, create_at, picture FROM __temp__annonce');
        $this->addSql('DROP TABLE __temp__annonce');
        $this->addSql('CREATE INDEX IDX_F65593E57E3C61F9 ON annonce (owner_id)');
    }
}
