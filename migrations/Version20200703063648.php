<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200703063648 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE department (id INT AUTO_INCREMENT NOT NULL, dep_number INT NOT NULL, dep_name VARCHAR(30) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE department_product (department_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_6EE3EC4EAE80F5DF (department_id), INDEX IDX_6EE3EC4E4584665A (product_id), PRIMARY KEY(department_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employee (id INT AUTO_INCREMENT NOT NULL, department_id INT DEFAULT NULL, login VARCHAR(20) NOT NULL, fio VARCHAR(60) DEFAULT NULL, password VARCHAR(20) NOT NULL, INDEX IDX_5D9F75A1AE80F5DF (department_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, prod_code VARCHAR(10) NOT NULL, name VARCHAR(30) DEFAULT NULL, price INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sale (id INT AUTO_INCREMENT NOT NULL, sale_date DATE NOT NULL, dep_number INT NOT NULL, prod_code VARCHAR(10) NOT NULL, amount DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sale_product (sale_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_A654C63F4A7E4868 (sale_id), INDEX IDX_A654C63F4584665A (product_id), PRIMARY KEY(sale_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE department_product ADD CONSTRAINT FK_6EE3EC4EAE80F5DF FOREIGN KEY (department_id) REFERENCES department (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE department_product ADD CONSTRAINT FK_6EE3EC4E4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employee ADD CONSTRAINT FK_5D9F75A1AE80F5DF FOREIGN KEY (department_id) REFERENCES department (id)');
        $this->addSql('ALTER TABLE sale_product ADD CONSTRAINT FK_A654C63F4A7E4868 FOREIGN KEY (sale_id) REFERENCES sale (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sale_product ADD CONSTRAINT FK_A654C63F4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE department_product DROP FOREIGN KEY FK_6EE3EC4EAE80F5DF');
        $this->addSql('ALTER TABLE employee DROP FOREIGN KEY FK_5D9F75A1AE80F5DF');
        $this->addSql('ALTER TABLE department_product DROP FOREIGN KEY FK_6EE3EC4E4584665A');
        $this->addSql('ALTER TABLE sale_product DROP FOREIGN KEY FK_A654C63F4584665A');
        $this->addSql('ALTER TABLE sale_product DROP FOREIGN KEY FK_A654C63F4A7E4868');
        $this->addSql('DROP TABLE department');
        $this->addSql('DROP TABLE department_product');
        $this->addSql('DROP TABLE employee');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE sale');
        $this->addSql('DROP TABLE sale_product');
    }
}
