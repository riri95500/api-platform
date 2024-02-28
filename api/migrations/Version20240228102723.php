<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240228102723 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT fk_9474526c69574a48');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT fk_9474526c9d86650f');
        $this->addSql('DROP INDEX idx_9474526c9d86650f');
        $this->addSql('DROP INDEX idx_9474526c69574a48');
        $this->addSql('ALTER TABLE comment RENAME COLUMN recipe_id_id TO recipe_id');
        $this->addSql('ALTER TABLE comment RENAME COLUMN user_id_id TO user_id');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C59D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CA76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_9474526C59D8A214 ON comment (recipe_id)');
        $this->addSql('CREATE INDEX IDX_9474526CA76ED395 ON comment (user_id)');
        $this->addSql('ALTER TABLE ingredient RENAME COLUMN quantit�y TO quantity');
        $this->addSql('ALTER TABLE notation DROP CONSTRAINT fk_268bc9569574a48');
        $this->addSql('ALTER TABLE notation DROP CONSTRAINT fk_268bc959d86650f');
        $this->addSql('DROP INDEX idx_268bc959d86650f');
        $this->addSql('DROP INDEX idx_268bc9569574a48');
        $this->addSql('ALTER TABLE notation ADD recipe_id INT NOT NULL');
        $this->addSql('ALTER TABLE notation ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE notation DROP recipe_id_id');
        $this->addSql('ALTER TABLE notation DROP user_id_id');
        $this->addSql('ALTER TABLE notation ADD CONSTRAINT FK_268BC9559D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE notation ADD CONSTRAINT FK_268BC95A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_268BC9559D8A214 ON notation (recipe_id)');
        $this->addSql('CREATE INDEX IDX_268BC95A76ED395 ON notation (user_id)');
        $this->addSql('ALTER TABLE recipe DROP CONSTRAINT fk_da88b1379777d11e');
        $this->addSql('DROP INDEX idx_da88b1379777d11e');
        $this->addSql('ALTER TABLE recipe RENAME COLUMN category_id_id TO category_id');
        $this->addSql('ALTER TABLE recipe ADD CONSTRAINT FK_DA88B13712469DE2 FOREIGN KEY (category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_DA88B13712469DE2 ON recipe (category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE recipe DROP CONSTRAINT FK_DA88B13712469DE2');
        $this->addSql('DROP INDEX IDX_DA88B13712469DE2');
        $this->addSql('ALTER TABLE recipe RENAME COLUMN category_id TO category_id_id');
        $this->addSql('ALTER TABLE recipe ADD CONSTRAINT fk_da88b1379777d11e FOREIGN KEY (category_id_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_da88b1379777d11e ON recipe (category_id_id)');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT FK_9474526C59D8A214');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT FK_9474526CA76ED395');
        $this->addSql('DROP INDEX IDX_9474526C59D8A214');
        $this->addSql('DROP INDEX IDX_9474526CA76ED395');
        $this->addSql('ALTER TABLE comment RENAME COLUMN recipe_id TO recipe_id_id');
        $this->addSql('ALTER TABLE comment RENAME COLUMN user_id TO user_id_id');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT fk_9474526c69574a48 FOREIGN KEY (recipe_id_id) REFERENCES recipe (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT fk_9474526c9d86650f FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_9474526c9d86650f ON comment (user_id_id)');
        $this->addSql('CREATE INDEX idx_9474526c69574a48 ON comment (recipe_id_id)');
        $this->addSql('ALTER TABLE notation DROP CONSTRAINT FK_268BC9559D8A214');
        $this->addSql('ALTER TABLE notation DROP CONSTRAINT FK_268BC95A76ED395');
        $this->addSql('DROP INDEX IDX_268BC9559D8A214');
        $this->addSql('DROP INDEX IDX_268BC95A76ED395');
        $this->addSql('ALTER TABLE notation ADD recipe_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE notation ADD user_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE notation DROP recipe_id');
        $this->addSql('ALTER TABLE notation DROP user_id');
        $this->addSql('ALTER TABLE notation ADD CONSTRAINT fk_268bc9569574a48 FOREIGN KEY (recipe_id_id) REFERENCES recipe (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE notation ADD CONSTRAINT fk_268bc959d86650f FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_268bc959d86650f ON notation (user_id_id)');
        $this->addSql('CREATE INDEX idx_268bc9569574a48 ON notation (recipe_id_id)');
        $this->addSql('ALTER TABLE ingredient RENAME COLUMN quantity TO "quantit�y"');
    }
}
