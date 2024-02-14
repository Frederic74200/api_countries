<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240214112747 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pays CHANGE country_code country_code CHAR(2) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_349F3CAEF026BB7C ON pays (country_code)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_349F3CAEF026BB7C ON pays');
        $this->addSql('ALTER TABLE pays CHANGE country_code country_code VARCHAR(2) NOT NULL');
    }
}
