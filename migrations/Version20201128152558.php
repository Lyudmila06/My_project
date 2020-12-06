<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201128152558 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE department_product DROP FOREIGN KEY FK_6EE3EC4E4584665A');
        $this->addSql('ALTER TABLE department_product DROP FOREIGN KEY FK_6EE3EC4EAE80F5DF');
        $this->addSql('ALTER TABLE department_product ADD CONSTRAINT FK_6EE3EC4E4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE department_product ADD CONSTRAINT FK_6EE3EC4EAE80F5DF FOREIGN KEY (department_id) REFERENCES department (id)');
        $this->addSql('ALTER TABLE sale_product DROP FOREIGN KEY FK_A654C63F4584665A');
        $this->addSql('ALTER TABLE sale_product DROP FOREIGN KEY FK_A654C63F4A7E4868');
        $this->addSql('ALTER TABLE sale_product ADD CONSTRAINT FK_A654C63F4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE sale_product ADD CONSTRAINT FK_A654C63F4A7E4868 FOREIGN KEY (sale_id) REFERENCES sale (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE department_product DROP FOREIGN KEY FK_6EE3EC4EAE80F5DF');
        $this->addSql('ALTER TABLE department_product DROP FOREIGN KEY FK_6EE3EC4E4584665A');
        $this->addSql('ALTER TABLE department_product ADD CONSTRAINT FK_6EE3EC4EAE80F5DF FOREIGN KEY (department_id) REFERENCES department (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE department_product ADD CONSTRAINT FK_6EE3EC4E4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sale_product DROP FOREIGN KEY FK_A654C63F4A7E4868');
        $this->addSql('ALTER TABLE sale_product DROP FOREIGN KEY FK_A654C63F4584665A');
        $this->addSql('ALTER TABLE sale_product ADD CONSTRAINT FK_A654C63F4A7E4868 FOREIGN KEY (sale_id) REFERENCES sale (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sale_product ADD CONSTRAINT FK_A654C63F4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
    }
}
