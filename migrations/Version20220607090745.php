<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220607090745 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE applicant (id INT AUTO_INCREMENT NOT NULL, ap_lastname VARCHAR(50) NOT NULL, ap_firstname VARCHAR(50) NOT NULL, ap_mail VARCHAR(200) NOT NULL, ap_application_date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, co_name VARCHAR(50) NOT NULL, co_address VARCHAR(200) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experience (id INT AUTO_INCREMENT NOT NULL, ex_skill_profile_id INT DEFAULT NULL, ex_company_id INT NOT NULL, ex_job_title VARCHAR(50) NOT NULL, ex_start_date DATE NOT NULL, ex_end_date DATE DEFAULT NULL, ex_description LONGTEXT DEFAULT NULL, INDEX IDX_590C103E86AAE6E (ex_skill_profile_id), INDEX IDX_590C103A1B98387 (ex_company_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profile_detail (id INT AUTO_INCREMENT NOT NULL, pd_skill_id INT DEFAULT NULL, pd_level SMALLINT NOT NULL, pd_appeal SMALLINT NOT NULL, INDEX IDX_462C18F4D0E5D799 (pd_skill_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, sk_category_id INT DEFAULT NULL, sk_name VARCHAR(50) NOT NULL, INDEX IDX_5E3DE47799A163D7 (sk_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill_category (id INT AUTO_INCREMENT NOT NULL, sc_name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill_profile (id INT AUTO_INCREMENT NOT NULL, sp_applicant_id INT DEFAULT NULL, sp_description VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_9BA23426E8A1B45D (sp_applicant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, us_email VARCHAR(180) NOT NULL, us_roles JSON NOT NULL, us_password VARCHAR(255) NOT NULL, us_lastname VARCHAR(50) NOT NULL, us_firstname VARCHAR(50) NOT NULL, us_available TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649807ABB60 (us_email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE experience ADD CONSTRAINT FK_590C103E86AAE6E FOREIGN KEY (ex_skill_profile_id) REFERENCES skill_profile (id)');
        $this->addSql('ALTER TABLE experience ADD CONSTRAINT FK_590C103A1B98387 FOREIGN KEY (ex_company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE profile_detail ADD CONSTRAINT FK_462C18F4D0E5D799 FOREIGN KEY (pd_skill_id) REFERENCES skill (id)');
        $this->addSql('ALTER TABLE skill ADD CONSTRAINT FK_5E3DE47799A163D7 FOREIGN KEY (sk_category_id) REFERENCES skill_category (id)');
        $this->addSql('ALTER TABLE skill_profile ADD CONSTRAINT FK_9BA23426E8A1B45D FOREIGN KEY (sp_applicant_id) REFERENCES applicant (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE skill_profile DROP FOREIGN KEY FK_9BA23426E8A1B45D');
        $this->addSql('ALTER TABLE experience DROP FOREIGN KEY FK_590C103A1B98387');
        $this->addSql('ALTER TABLE profile_detail DROP FOREIGN KEY FK_462C18F4D0E5D799');
        $this->addSql('ALTER TABLE skill DROP FOREIGN KEY FK_5E3DE47799A163D7');
        $this->addSql('ALTER TABLE experience DROP FOREIGN KEY FK_590C103E86AAE6E');
        $this->addSql('DROP TABLE applicant');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP TABLE profile_detail');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE skill_category');
        $this->addSql('DROP TABLE skill_profile');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
