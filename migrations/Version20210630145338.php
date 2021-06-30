<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210630145338 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fondo_autor (fondo_id INT NOT NULL, autor_id INT NOT NULL, INDEX IDX_44096994AA510E89 (fondo_id), INDEX IDX_4409699414D45BBE (autor_id), PRIMARY KEY(fondo_id, autor_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fondo_autor ADD CONSTRAINT FK_44096994AA510E89 FOREIGN KEY (fondo_id) REFERENCES fondo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fondo_autor ADD CONSTRAINT FK_4409699414D45BBE FOREIGN KEY (autor_id) REFERENCES autor (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fondo ADD editorial_id INT NOT NULL');
        $this->addSql('ALTER TABLE fondo ADD CONSTRAINT FK_2DC0A6E5BAF1A24D FOREIGN KEY (editorial_id) REFERENCES editorial (id)');
        $this->addSql('CREATE INDEX IDX_2DC0A6E5BAF1A24D ON fondo (editorial_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE fondo_autor');
        $this->addSql('ALTER TABLE fondo DROP FOREIGN KEY FK_2DC0A6E5BAF1A24D');
        $this->addSql('DROP INDEX IDX_2DC0A6E5BAF1A24D ON fondo');
        $this->addSql('ALTER TABLE fondo DROP editorial_id');
    }
}
