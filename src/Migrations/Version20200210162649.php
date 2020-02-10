<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200210162649 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE publicación (id INT AUTO_INCREMENT NOT NULL, categoria_id INT NOT NULL, user_id INT NOT NULL, fecha DATETIME NOT NULL, titulo VARCHAR(255) NOT NULL, imagen VARCHAR(255) DEFAULT NULL, contenido LONGTEXT NOT NULL, INDEX IDX_674A02E93397707A (categoria_id), INDEX IDX_674A02E9A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nombrecompleto VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comentarios (id INT AUTO_INCREMENT NOT NULL, publicacion_id_id INT NOT NULL, user_id INT NOT NULL, fecha_hora DATETIME NOT NULL, contenido LONGTEXT NOT NULL, INDEX IDX_F54B3FC05FE8424A (publicacion_id_id), INDEX IDX_F54B3FC0A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categoria (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE publicación ADD CONSTRAINT FK_674A02E93397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id)');
        $this->addSql('ALTER TABLE publicación ADD CONSTRAINT FK_674A02E9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comentarios ADD CONSTRAINT FK_F54B3FC05FE8424A FOREIGN KEY (publicacion_id_id) REFERENCES publicación (id)');
        $this->addSql('ALTER TABLE comentarios ADD CONSTRAINT FK_F54B3FC0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comentarios DROP FOREIGN KEY FK_F54B3FC05FE8424A');
        $this->addSql('ALTER TABLE publicación DROP FOREIGN KEY FK_674A02E9A76ED395');
        $this->addSql('ALTER TABLE comentarios DROP FOREIGN KEY FK_F54B3FC0A76ED395');
        $this->addSql('ALTER TABLE publicación DROP FOREIGN KEY FK_674A02E93397707A');
        $this->addSql('DROP TABLE publicación');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE comentarios');
        $this->addSql('DROP TABLE categoria');
    }
}
