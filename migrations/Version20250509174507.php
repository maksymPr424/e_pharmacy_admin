<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250509174507 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE supplier ADD product_id INT DEFAULT NULL, ADD shop_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE supplier ADD CONSTRAINT FK_9B2A6C7E4584665A FOREIGN KEY (product_id) REFERENCES product (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE supplier ADD CONSTRAINT FK_9B2A6C7E4D16C4DD FOREIGN KEY (shop_id) REFERENCES shop (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_9B2A6C7E4584665A ON supplier (product_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_9B2A6C7E4D16C4DD ON supplier (shop_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE supplier DROP FOREIGN KEY FK_9B2A6C7E4584665A
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE supplier DROP FOREIGN KEY FK_9B2A6C7E4D16C4DD
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_9B2A6C7E4584665A ON supplier
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_9B2A6C7E4D16C4DD ON supplier
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE supplier DROP product_id, DROP shop_id
        SQL);
    }
}
