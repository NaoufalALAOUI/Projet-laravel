<?php

use Illuminate\Database\Seeder;
use App\Categorie;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorie1 = Categorie::Create(['name' => 'cat1', 'slug' => 'slug1']);
        $categorie2 = Categorie::Create(['name' => 'cat2', 'slug' => 'slug2']);
        $categorie3 = Categorie::Create(['name' => 'cat3', 'slug' => 'slug3']);
        $categorie4 = Categorie::Create(['name' => 'cat4', 'slug' => 'slug4']);
        $categorie5 = Categorie::Create(['name' => 'cat5', 'slug' => 'slug5']);
        $categorie6 = Categorie::Create(['name' => 'cat6', 'slug' => 'slug6']);
        $categorie7 = Categorie::Create(['name' => 'cat7', 'slug' => 'slug7']);
        $categorie8 = Categorie::Create(['name' => 'cat8', 'slug' => 'slug8']);
        $categorie9 = Categorie::Create(['name' => 'cat9', 'slug' => 'slug9']);
        $categorie10 = Categorie::Create(['name' => 'cat10', 'slug' => 'slug10']);
        $categorie11 = Categorie::Create(['name' => 'cat11', 'slug' => 'slug11']);
        $categorie12 = Categorie::Create(['name' => 'cat12', 'slug' => 'slug12']);
        $categorie13 = Categorie::Create(['name' => 'cat13', 'slug' => 'slug13']);
        $categorie14 = Categorie::Create(['name' => 'cat14', 'slug' => 'slug14']);
        $categorie15 = Categorie::Create(['name' => 'cat15', 'slug' => 'slug15']);
    }
}
