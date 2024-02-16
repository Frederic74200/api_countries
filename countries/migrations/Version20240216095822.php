<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240216095822 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ville (id INT AUTO_INCREMENT NOT NULL, pays_id INT NOT NULL, code_postal_ville VARCHAR(8) NOT NULL, nom_ville VARCHAR(255) NOT NULL, INDEX IDX_43C3D9C3A6E44244 (pays_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ville ADD CONSTRAINT FK_43C3D9C3A6E44244 FOREIGN KEY (pays_id) REFERENCES pays (id)');
        $this->addSql('ALTER TABLE pays CHANGE code_pays code_pays CHAR(2) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_349F3CAE274566F ON pays (code_pays)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ville DROP FOREIGN KEY FK_43C3D9C3A6E44244');
        $this->addSql('DROP TABLE ville');
        $this->addSql('DROP INDEX UNIQ_349F3CAE274566F ON pays');
        $this->addSql('ALTER TABLE pays CHANGE code_pays code_pays VARCHAR(2) NOT NULL');
    }
}
