<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220603151211 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE profil_competence DROP FOREIGN KEY fk_pc_candidat');
        $this->addSql('ALTER TABLE competence DROP FOREIGN KEY fk_cm_categorie');
        $this->addSql('ALTER TABLE detail_profil DROP FOREIGN KEY fk_dp_competence');
        $this->addSql('ALTER TABLE experience DROP FOREIGN KEY fk_ex_entreprise');
        $this->addSql('ALTER TABLE mission DROP FOREIGN KEY fk_mi_entreprise');
        $this->addSql('ALTER TABLE detail_profil DROP FOREIGN KEY fk_dp_profil_competence');
        $this->addSql('ALTER TABLE experience DROP FOREIGN KEY fk_ex_profil_competence');
        $this->addSql('ALTER TABLE mission DROP FOREIGN KEY fk_mi_collaborateur');
        $this->addSql('ALTER TABLE mission DROP FOREIGN KEY fk_mi_commercial');
        $this->addSql('ALTER TABLE profil_competence DROP FOREIGN KEY fk_pc_collaborateur');
        $this->addSql('CREATE TABLE applicant (id INT AUTO_INCREMENT NOT NULL, ap_lastname VARCHAR(50) NOT NULL, ap_firstname VARCHAR(50) NOT NULL, ap_mail VARCHAR(200) NOT NULL, ap_application_date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, co_name VARCHAR(50) NOT NULL, co_address VARCHAR(200) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profile_detail (id INT AUTO_INCREMENT NOT NULL, pd_skill_id INT DEFAULT NULL, pd_level SMALLINT NOT NULL, pd_appeal SMALLINT NOT NULL, INDEX IDX_462C18F4D0E5D799 (pd_skill_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, sk_category_id INT DEFAULT NULL, sk_name VARCHAR(50) NOT NULL, INDEX IDX_5E3DE47799A163D7 (sk_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill_category (id INT AUTO_INCREMENT NOT NULL, sc_name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill_profile (id INT AUTO_INCREMENT NOT NULL, sp_applicant_id INT DEFAULT NULL, sp_description VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_9BA23426E8A1B45D (sp_applicant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE profile_detail ADD CONSTRAINT FK_462C18F4D0E5D799 FOREIGN KEY (pd_skill_id) REFERENCES skill (id)');
        $this->addSql('ALTER TABLE skill ADD CONSTRAINT FK_5E3DE47799A163D7 FOREIGN KEY (sk_category_id) REFERENCES skill_category (id)');
        $this->addSql('ALTER TABLE skill_profile ADD CONSTRAINT FK_9BA23426E8A1B45D FOREIGN KEY (sp_applicant_id) REFERENCES applicant (id)');
        $this->addSql('DROP TABLE candidat');
        $this->addSql('DROP TABLE categorie_competence');
        $this->addSql('DROP TABLE competence');
        $this->addSql('DROP TABLE detail_profil');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('DROP TABLE mission');
        $this->addSql('DROP TABLE profil_competence');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP INDEX fk_ex_entreprise ON experience');
        $this->addSql('DROP INDEX fk_ex_profil_competence ON experience');
        $this->addSql('ALTER TABLE experience ADD id INT AUTO_INCREMENT NOT NULL, ADD ex_skill_profile_id INT DEFAULT NULL, ADD ex_company_id INT NOT NULL, ADD ex_job_title VARCHAR(50) NOT NULL, ADD ex_start_date DATE NOT NULL, ADD ex_end_date DATE DEFAULT NULL, DROP ex_id, DROP ex_profil_competence, DROP ex_entreprise, DROP ex_nom_poste, DROP ex_date_debut, DROP ex_date_fin, CHANGE ex_description ex_description LONGTEXT DEFAULT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE experience ADD CONSTRAINT FK_590C103E86AAE6E FOREIGN KEY (ex_skill_profile_id) REFERENCES skill_profile (id)');
        $this->addSql('ALTER TABLE experience ADD CONSTRAINT FK_590C103A1B98387 FOREIGN KEY (ex_company_id) REFERENCES company (id)');
        $this->addSql('CREATE INDEX IDX_590C103E86AAE6E ON experience (ex_skill_profile_id)');
        $this->addSql('CREATE INDEX IDX_590C103A1B98387 ON experience (ex_company_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE skill_profile DROP FOREIGN KEY FK_9BA23426E8A1B45D');
        $this->addSql('ALTER TABLE experience DROP FOREIGN KEY FK_590C103A1B98387');
        $this->addSql('ALTER TABLE profile_detail DROP FOREIGN KEY FK_462C18F4D0E5D799');
        $this->addSql('ALTER TABLE skill DROP FOREIGN KEY FK_5E3DE47799A163D7');
        $this->addSql('ALTER TABLE experience DROP FOREIGN KEY FK_590C103E86AAE6E');
        $this->addSql('CREATE TABLE candidat (ca_id INT UNSIGNED AUTO_INCREMENT NOT NULL, ca_nom VARCHAR(50) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, ca_prenom VARCHAR(50) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, ca_email VARCHAR(200) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, ca_date_candidature DATE DEFAULT NULL, PRIMARY KEY(ca_id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE categorie_competence (cc_id INT UNSIGNED AUTO_INCREMENT NOT NULL, cc_nom VARCHAR(50) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, PRIMARY KEY(cc_id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE competence (cm_id INT UNSIGNED AUTO_INCREMENT NOT NULL, cm_categorie INT UNSIGNED DEFAULT NULL, cm_nom VARCHAR(50) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, INDEX fk_cm_categorie (cm_categorie), PRIMARY KEY(cm_id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE detail_profil (dp_id INT UNSIGNED AUTO_INCREMENT NOT NULL, dp_profil_competence INT UNSIGNED DEFAULT NULL, dp_competence INT UNSIGNED DEFAULT NULL, dp_niveau SMALLINT DEFAULT NULL, dp_attrait SMALLINT DEFAULT NULL, INDEX fk_dp_competence (dp_competence), INDEX fk_dp_profil_competence (dp_profil_competence), PRIMARY KEY(dp_id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE entreprise (en_id INT UNSIGNED AUTO_INCREMENT NOT NULL, en_nom VARCHAR(50) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, en_adresse VARCHAR(200) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, PRIMARY KEY(en_id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE mission (mi_id INT UNSIGNED AUTO_INCREMENT NOT NULL, mi_commercial INT UNSIGNED DEFAULT NULL, mi_collaborateur INT UNSIGNED DEFAULT NULL, mi_entreprise INT UNSIGNED DEFAULT NULL, mi_date_debut DATE DEFAULT NULL, mi_date_fin DATE DEFAULT NULL, mi_lieu VARCHAR(50) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, INDEX fk_mi_collaborateur (mi_collaborateur), INDEX fk_mi_entreprise (mi_entreprise), INDEX fk_mi_commercial (mi_commercial), PRIMARY KEY(mi_id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE profil_competence (pc_id INT UNSIGNED AUTO_INCREMENT NOT NULL, pc_candidat INT UNSIGNED DEFAULT NULL, pc_collaborateur INT UNSIGNED DEFAULT NULL, pc_libelle VARCHAR(50) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, INDEX fk_pc_collaborateur (pc_collaborateur), INDEX fk_pc_candidat (pc_candidat), PRIMARY KEY(pc_id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE utilisateur (ut_id INT UNSIGNED AUTO_INCREMENT NOT NULL, ut_nom VARCHAR(50) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, ut_prenom VARCHAR(50) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, ut_email VARCHAR(200) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, ut_login VARCHAR(50) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, ut_password VARCHAR(100) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, ut_sous_contrat TINYINT(1) DEFAULT NULL, ut_en_mission TINYINT(1) DEFAULT NULL, ut_date_fin_mission DATE DEFAULT NULL, ut_role SMALLINT DEFAULT NULL, PRIMARY KEY(ut_id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE competence ADD CONSTRAINT fk_cm_categorie FOREIGN KEY (cm_categorie) REFERENCES categorie_competence (cc_id)');
        $this->addSql('ALTER TABLE detail_profil ADD CONSTRAINT fk_dp_competence FOREIGN KEY (dp_competence) REFERENCES competence (cm_id)');
        $this->addSql('ALTER TABLE detail_profil ADD CONSTRAINT fk_dp_profil_competence FOREIGN KEY (dp_profil_competence) REFERENCES profil_competence (pc_id)');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT fk_mi_collaborateur FOREIGN KEY (mi_collaborateur) REFERENCES utilisateur (ut_id)');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT fk_mi_entreprise FOREIGN KEY (mi_entreprise) REFERENCES entreprise (en_id)');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT fk_mi_commercial FOREIGN KEY (mi_commercial) REFERENCES utilisateur (ut_id)');
        $this->addSql('ALTER TABLE profil_competence ADD CONSTRAINT fk_pc_candidat FOREIGN KEY (pc_candidat) REFERENCES candidat (ca_id)');
        $this->addSql('ALTER TABLE profil_competence ADD CONSTRAINT fk_pc_collaborateur FOREIGN KEY (pc_collaborateur) REFERENCES utilisateur (ut_id)');
        $this->addSql('DROP TABLE applicant');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE profile_detail');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE skill_category');
        $this->addSql('DROP TABLE skill_profile');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('DROP INDEX IDX_590C103E86AAE6E ON experience');
        $this->addSql('DROP INDEX IDX_590C103A1B98387 ON experience');
        $this->addSql('ALTER TABLE experience ADD ex_id INT UNSIGNED AUTO_INCREMENT NOT NULL, ADD ex_profil_competence INT UNSIGNED DEFAULT NULL, ADD ex_entreprise INT UNSIGNED DEFAULT NULL, ADD ex_nom_poste VARCHAR(50) DEFAULT NULL, ADD ex_date_fin DATE DEFAULT NULL, DROP id, DROP ex_skill_profile_id, DROP ex_company_id, DROP ex_job_title, DROP ex_start_date, CHANGE ex_description ex_description TEXT DEFAULT NULL, CHANGE ex_end_date ex_date_debut DATE DEFAULT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (ex_id)');
        $this->addSql('ALTER TABLE experience ADD CONSTRAINT fk_ex_entreprise FOREIGN KEY (ex_entreprise) REFERENCES entreprise (en_id)');
        $this->addSql('ALTER TABLE experience ADD CONSTRAINT fk_ex_profil_competence FOREIGN KEY (ex_profil_competence) REFERENCES profil_competence (pc_id)');
        $this->addSql('CREATE INDEX fk_ex_entreprise ON experience (ex_entreprise)');
        $this->addSql('CREATE INDEX fk_ex_profil_competence ON experience (ex_profil_competence)');
    }
}
