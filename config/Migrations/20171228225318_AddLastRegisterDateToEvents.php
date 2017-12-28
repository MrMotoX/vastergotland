<?php
use Migrations\AbstractMigration;

class AddLastRegisterDateToEvents extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('events');
        $table->addColumn('last_register_date', 'date', [
            'default' => null,
            'null' => false,
        ]);
        $table->update();
    }
}
