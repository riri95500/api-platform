<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240228112643 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE recipe_ingredient_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('ALTER TABLE ingredient DROP quantity');
        $this->addSql('ALTER TABLE recipe_ingredient DROP CONSTRAINT FK_22D1FE1359D8A214');
        $this->addSql('ALTER TABLE recipe_ingredient DROP CONSTRAINT FK_22D1FE13933FE08C');
        $this->addSql('ALTER TABLE recipe_ingredient DROP CONSTRAINT recipe_ingredient_pkey');
        $this->addSql('ALTER TABLE recipe_ingredient ADD id INT NOT NULL');
        $this->addSql('ALTER TABLE recipe_ingredient ADD type VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE recipe_ingredient ADD quantity INT NOT NULL');
        $this->addSql('ALTER TABLE recipe_ingredient ADD CONSTRAINT FK_22D1FE1359D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE recipe_ingredient ADD CONSTRAINT FK_22D1FE13933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE recipe_ingredient ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE recipe_ingredient_id_seq CASCADE');
        $this->addSql('ALTER TABLE ingredient ADD quantity INT NOT NULL');
        $this->addSql('ALTER TABLE recipe_ingredient DROP CONSTRAINT fk_22d1fe1359d8a214');
        $this->addSql('ALTER TABLE recipe_ingredient DROP CONSTRAINT fk_22d1fe13933fe08c');
        $this->addSql('DROP INDEX recipe_ingredient_pkey');
        $this->addSql('ALTER TABLE recipe_ingredient DROP id');
        $this->addSql('ALTER TABLE recipe_ingredient DROP type');
        $this->addSql('ALTER TABLE recipe_ingredient DROP quantity');
        $this->addSql('ALTER TABLE recipe_ingredient ADD CONSTRAINT fk_22d1fe1359d8a214 FOREIGN KEY (recipe_id) REFERENCES recipe (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE recipe_ingredient ADD CONSTRAINT fk_22d1fe13933fe08c FOREIGN KEY (ingredient_id) REFERENCES ingredient (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE recipe_ingredient ADD PRIMARY KEY (recipe_id, ingredient_id)');
    }
}
