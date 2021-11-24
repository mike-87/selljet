<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Category::truncate();

        $categories = [
            [
                'name' => 'Kompjuteri',
                'parent_id' => null
            ],
            [
                'name' => 'Mobilni telefoni',
                'parent_id' => null
            ],
            [
                'name' => 'Odeća',
                'parent_id' => null
            ],
            [
                'name' => 'Komponente',
                'parent_id' => 1
            ],
            [
                'name' => 'Android',
                'parent_id' => 2
            ],
            [
                'name' => 'Muška odeća',
                'parent_id' => 3
            ],
            [
                'name' => 'Periferije',
                'parent_id' => 1
            ],
            [
                'name' => 'Apple',
                'parent_id' => 2
            ],
            [
                'name' => 'Ženska odeća',
                'parent_id' => 3
            ],
            [
                'name' => 'Dodatna oprema',
                'parent_id' => 1
            ],
            [
                'name' => 'Dečja odeća',
                'parent_id' => 3
            ],
            [
                'name' => 'Grafičke kartice',
                'parent_id' => 4
            ],
            [
                'name' => 'Hard diskovi',
                'parent_id' => 4
            ],
            [
                'name' => 'RAM memorije',
                'parent_id' => 4
            ],
            [
                'name' => 'Miševi',
                'parent_id' => 7
            ],
            [
                'name' => 'Tastature',
                'parent_id' => 7
            ],
            [
                'name' => 'Web kamere',
                'parent_id' => 7
            ],
            [
                'name' => 'Podloge za miša',
                'parent_id' => 10
            ],
            [
                'name' => 'Zaštitne naočare',
                'parent_id' => 10
            ],
            [
                'name' => 'Sredstva za čišćenje monitora',
                'parent_id' => 10
            ],
            [
                'name' => 'Samsung',
                'parent_id' => 5
            ],
            [
                'name' => 'Huawei',
                'parent_id' => 5
            ],
            [
                'name' => 'Nokia',
                'parent_id' => 5
            ],
            [
                'name' => 'iPhone',
                'parent_id' => 8
            ],
            [
                'name' => 'Majice',
                'parent_id' => 6
            ],
            [
                'name' => 'Duksevi',
                'parent_id' => 6
            ],
            [
                'name' => 'Pantalone',
                'parent_id' => 6
            ],
            [
                'name' => 'Majice',
                'parent_id' => 9
            ],
            [
                'name' => 'Bluze',
                'parent_id' => 9
            ],
            [
                'name' => 'Haljine',
                'parent_id' => 9
            ],
            [
                'name' => 'Majice',
                'parent_id' => 11
            ],
            [
                'name' => 'Džemperi',
                'parent_id' => 11
            ],
            [
                'name' => 'Trenerke',
                'parent_id' => 11
            ]
        ];
        
        Category::insert($categories);
    }
}
