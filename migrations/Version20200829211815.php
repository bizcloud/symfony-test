<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200829211815 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE image_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE image (id INT NOT NULL, advert_id INT DEFAULT NULL, path VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C53D045FD07ECCB6 ON image (advert_id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FD07ECCB6 FOREIGN KEY (advert_id) REFERENCES advert (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE advert ALTER transmission TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE advert ALTER transmission DROP DEFAULT');
        $this->addSql('ALTER TABLE advert ALTER fuel TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE advert ALTER fuel DROP DEFAULT');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE image_id_seq CASCADE');
        $this->addSql('DROP TABLE image');
        $this->addSql('ALTER TABLE advert ALTER transmission TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE advert ALTER transmission DROP DEFAULT');
        $this->addSql('ALTER TABLE advert ALTER fuel TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE advert ALTER fuel DROP DEFAULT');
    }
}
