<?php

use Illuminate\Database\Seeder;
use App\Language;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lang = new Language();
        $lang->name = 'PHP';
        $lang->save();
        $lang = new Language();
        $lang->name = 'CSS';
        $lang->save();
        $lang = new Language();
        $lang->name = 'HTML';
        $lang->save();
        $lang = new Language();
        $lang->name = 'JavaScript';
        $lang->save();
        $lang = new Language();
        $lang->name = 'Java';
        $lang->save();
    }
}
