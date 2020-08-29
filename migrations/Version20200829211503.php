<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200829211503 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE advert ADD fuel VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE advert ALTER transmission TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE advert ALTER transmission DROP DEFAULT');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE advert DROP fuel');
        $this->addSql('ALTER TABLE advert ALTER transmission TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE advert ALTER transmission DROP DEFAULT');
    }
}
