<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210901093616 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_159968716DB4F89 ON artist');
        $this->addSql('ALTER TABLE artist CHANGE picture picture LONGTEXT NOT NULL');
        $this->addSql('DROP INDEX UNIQ_741D53CD16DB4F89 ON place');
        $this->addSql('ALTER TABLE place CHANGE picture picture LONGTEXT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artist CHANGE picture picture VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_159968716DB4F89 ON artist (picture)');
        $this->addSql('ALTER TABLE place CHANGE picture picture VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_741D53CD16DB4F89 ON place (picture)');
    }
}
