<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250426161155 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE `order` ADD shop_id INT NOT NULL, ADD payment_id INT NOT NULL, ADD status VARCHAR(255) NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE `order` ADD CONSTRAINT FK_F52993984D16C4DD FOREIGN KEY (shop_id) REFERENCES shop (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE `order` ADD CONSTRAINT FK_F52993984C3A3BB FOREIGN KEY (payment_id) REFERENCES payment (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_F52993984D16C4DD ON `order` (shop_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_F52993984C3A3BB ON `order` (payment_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE product ADD shop_id INT NOT NULL, ADD category_id INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE product ADD CONSTRAINT FK_D34A04AD4D16C4DD FOREIGN KEY (shop_id) REFERENCES shop (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE product ADD CONSTRAINT FK_D34A04AD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_D34A04AD4D16C4DD ON product (shop_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_D34A04AD12469DE2 ON product (category_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE shop ADD user_id INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE shop ADD CONSTRAINT FK_AC6A4CA2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_AC6A4CA2A76ED395 ON shop (user_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD4D16C4DD
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD12469DE2
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_D34A04AD4D16C4DD ON product
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_D34A04AD12469DE2 ON product
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE product DROP shop_id, DROP category_id
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE shop DROP FOREIGN KEY FK_AC6A4CA2A76ED395
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_AC6A4CA2A76ED395 ON shop
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE shop DROP user_id
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE `order` DROP FOREIGN KEY FK_F52993984D16C4DD
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE `order` DROP FOREIGN KEY FK_F52993984C3A3BB
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_F52993984D16C4DD ON `order`
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_F52993984C3A3BB ON `order`
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE `order` DROP shop_id, DROP payment_id, DROP status
        SQL);
    }
}
