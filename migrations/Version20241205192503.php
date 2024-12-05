<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241205192503 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE location (id SERIAL NOT NULL, name VARCHAR(50) NOT NULL, lat DOUBLE PRECISION NOT NULL, lng DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE school ADD location_id INT NOT NULL');
        $this->addSql('ALTER TABLE school ADD CONSTRAINT FK_F99EDABB64D218E FOREIGN KEY (location_id) REFERENCES location (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_F99EDABB64D218E ON school (location_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE school DROP CONSTRAINT FK_F99EDABB64D218E');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP INDEX IDX_F99EDABB64D218E');
        $this->addSql('ALTER TABLE school DROP location_id');
    }
}
