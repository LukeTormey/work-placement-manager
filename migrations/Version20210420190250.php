<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210420190250 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cv CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE dob dob DATE DEFAULT NULL, CHANGE address address VARCHAR(255) DEFAULT NULL, CHANGE college college VARCHAR(255) DEFAULT NULL, CHANGE degree degree VARCHAR(255) DEFAULT NULL, CHANGE workexperience workexperience VARCHAR(255) DEFAULT NULL, CHANGE referees referees VARCHAR(255) DEFAULT NULL, CHANGE image image VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE student DROP INDEX UNIQ_B723AF33A832C1C9, ADD INDEX IDX_B723AF33A832C1C9 (email_id)');
        $this->addSql('ALTER TABLE student ADD cv_id INT DEFAULT NULL, DROP student, CHANGE employed employed TINYINT(1) DEFAULT NULL, CHANGE studentno studentno VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF33CFE419E2 FOREIGN KEY (cv_id) REFERENCES cv (id)');
        $this->addSql('CREATE INDEX IDX_B723AF33CFE419E2 ON student (cv_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cv CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE dob dob VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE address address VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE college college VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE degree degree VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE workexperience workexperience VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE referees referees VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE image image VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE student DROP INDEX IDX_B723AF33A832C1C9, ADD UNIQUE INDEX UNIQ_B723AF33A832C1C9 (email_id)');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF33CFE419E2');
        $this->addSql('DROP INDEX IDX_B723AF33CFE419E2 ON student');
        $this->addSql('ALTER TABLE student ADD student TINYINT(1) NOT NULL, DROP cv_id, CHANGE employed employed TINYINT(1) NOT NULL, CHANGE studentno studentno INT NOT NULL');
    }
}
