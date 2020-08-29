<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200829191626 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE advert_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE color_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE advert (id INT NOT NULL, generation_id INT NOT NULL, color_id INT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, price INT DEFAULT NULL, vin VARCHAR(25) NOT NULL, engine_volume INT DEFAULT NULL, hp INT DEFAULT NULL, year INT DEFAULT NULL, odometer INT DEFAULT NULL, info TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_54F1F40B553A6EC4 ON advert (generation_id)');
        $this->addSql('CREATE INDEX IDX_54F1F40B7ADA1FB5 ON advert (color_id)');
        $this->addSql('CREATE TABLE color (id INT NOT NULL, name VARCHAR(45) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE advert ADD CONSTRAINT FK_54F1F40B553A6EC4 FOREIGN KEY (generation_id) REFERENCES generation (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE advert ADD CONSTRAINT FK_54F1F40B7ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE advert DROP CONSTRAINT FK_54F1F40B7ADA1FB5');
        $this->addSql('DROP SEQUENCE advert_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE color_id_seq CASCADE');
        $this->addSql('DROP TABLE advert');
        $this->addSql('DROP TABLE color');
    }
}
