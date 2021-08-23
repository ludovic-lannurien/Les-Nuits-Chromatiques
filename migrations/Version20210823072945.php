<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210823072945 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artist_genre (artist_id INT NOT NULL, genre_id INT NOT NULL, INDEX IDX_E35C03ABB7970CF8 (artist_id), INDEX IDX_E35C03AB4296D31F (genre_id), PRIMARY KEY(artist_id, genre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artist_genre ADD CONSTRAINT FK_E35C03ABB7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artist_genre ADD CONSTRAINT FK_E35C03AB4296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE genre_artist');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE genre_artist (genre_id INT NOT NULL, artist_id INT NOT NULL, INDEX IDX_EAEAA6A74296D31F (genre_id), INDEX IDX_EAEAA6A7B7970CF8 (artist_id), PRIMARY KEY(genre_id, artist_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE genre_artist ADD CONSTRAINT FK_EAEAA6A74296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE genre_artist ADD CONSTRAINT FK_EAEAA6A7B7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE artist_genre');
    }
}
