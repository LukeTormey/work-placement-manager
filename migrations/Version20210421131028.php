<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210421131028 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cv (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, dateofbirth DATE DEFAULT NULL, address VARCHAR(255) NOT NULL, college VARCHAR(255) DEFAULT NULL, degree VARCHAR(255) DEFAULT NULL, work_experience VARCHAR(255) DEFAULT NULL, referees VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, email_id INT DEFAULT NULL, cv_id INT DEFAULT NULL, employed TINYINT(1) NOT NULL, student_number VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_B723AF33A832C1C9 (email_id), UNIQUE INDEX UNIQ_B723AF33CFE419E2 (cv_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF33A832C1C9 FOREIGN KEY (email_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF33CFE419E2 FOREIGN KEY (cv_id) REFERENCES cv (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF33CFE419E2');
        $this->addSql('DROP TABLE cv');
        $this->addSql('DROP TABLE student');
    }
}
