<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220607093645 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mission (id INT AUTO_INCREMENT NOT NULL, mi_company_id INT NOT NULL, mi_employee_id INT NOT NULL, mi_commercial_id INT NOT NULL, mi_start_date DATE NOT NULL, mi_end_date DATE DEFAULT NULL, mi_address VARCHAR(200) NOT NULL, INDEX IDX_9067F23C6C07F179 (mi_company_id), INDEX IDX_9067F23CCA91D3CE (mi_employee_id), INDEX IDX_9067F23CEE43E8F2 (mi_commercial_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, us_email VARCHAR(180) NOT NULL, us_roles JSON NOT NULL, us_password VARCHAR(255) NOT NULL, us_lastname VARCHAR(50) NOT NULL, us_firstname VARCHAR(50) NOT NULL, us_available TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649807ABB60 (us_email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23C6C07F179 FOREIGN KEY (mi_company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23CCA91D3CE FOREIGN KEY (mi_employee_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23CEE43E8F2 FOREIGN KEY (mi_commercial_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE skill_profile ADD sp_employee_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE skill_profile ADD CONSTRAINT FK_9BA23426542A1610 FOREIGN KEY (sp_employee_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9BA23426542A1610 ON skill_profile (sp_employee_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mission DROP FOREIGN KEY FK_9067F23CCA91D3CE');
        $this->addSql('ALTER TABLE mission DROP FOREIGN KEY FK_9067F23CEE43E8F2');
        $this->addSql('ALTER TABLE skill_profile DROP FOREIGN KEY FK_9BA23426542A1610');
        $this->addSql('DROP TABLE mission');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP INDEX UNIQ_9BA23426542A1610 ON skill_profile');
        $this->addSql('ALTER TABLE skill_profile DROP sp_employee_id');
    }
}
