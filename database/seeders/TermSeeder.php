<?php

namespace Database\Seeders;

use App\Models\Term;
use Illuminate\Database\Seeder;

class TermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Term::where('title', 'One')->first()) {
            $term = new Term();
            $term->id = 1;
            $term->title = 'One';
            $term->status = 'active';
            $term->save();
        }

        if (!Term::where('title', 'Two')->first()) {
            $term = new Term();
            $term->id = 2;
            $term->title = 'Two';
            $term->status = 'active';
            $term->save();
        }

        if (!Term::where('title', 'Three')->first()) {
            $term = new Term();
            $term->id = 3;
            $term->title = 'Three';
            $term->status = 'active';
            $term->save();
        }
    }
}
