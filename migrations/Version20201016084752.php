<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201016084752 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE season (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE season_price (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, season_id INTEGER NOT NULL, ticket_type_id INTEGER NOT NULL, price DOUBLE PRECISION NOT NULL)');
        $this->addSql('CREATE INDEX IDX_DDF9D5064EC001D1 ON season_price (season_id)');
        $this->addSql('CREATE INDEX IDX_DDF9D506C980D5C1 ON season_price (ticket_type_id)');
        $this->addSql('CREATE TABLE ticket_type (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE season');
        $this->addSql('DROP TABLE season_price');
        $this->addSql('DROP TABLE ticket_type');
    }
}
