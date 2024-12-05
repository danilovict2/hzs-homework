<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241205205324 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE rating (id SERIAL NOT NULL, school_id INT NOT NULL, academic_value INT NOT NULL, value INT NOT NULL, campus INT NOT NULL, security INT NOT NULL, location INT NOT NULL, professors INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D8892622C32A47EE ON rating (school_id)');
        $this->addSql('ALTER TABLE rating ADD CONSTRAINT FK_D8892622C32A47EE FOREIGN KEY (school_id) REFERENCES school (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE rating DROP CONSTRAINT FK_D8892622C32A47EE');
        $this->addSql('DROP TABLE rating');
    }
}
