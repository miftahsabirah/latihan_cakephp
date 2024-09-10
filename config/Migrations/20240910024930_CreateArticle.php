<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateArticle extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        // Membuat tabel 'article' dengan beberapa kolom dasar
        $table = $this->table('article');
        
        // Menambahkan kolom id sebagai primary key
        $table->addColumn('title', 'string', ['limit' => 255])    // Kolom untuk judul artikel
              ->addColumn('body', 'text')                        // Kolom untuk isi artikel
              ->addColumn('created', 'datetime', ['default' => 'CURRENT_TIMESTAMP']) // Kolom untuk timestamp created
              ->addColumn('modified', 'datetime', ['null' => true, 'default' => null]) // Kolom untuk timestamp modified
              ->addColumn('slug', 'string', ['limit' => 255, 'null' => true]);
        
        // Menyimpan perubahan dan membuat tabel
        $table->create();
        
    }
}
