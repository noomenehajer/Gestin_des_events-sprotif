<?php

namespace Database\Seeders;

use App\Models\Athlete;
use App\Models\Categorie;
use App\Models\Equipe;
use App\Models\EvennementSportif;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(2)
            ->has(
                EvennementSportif::factory()
                    ->count(3)
                    ->has(
                        Categorie::factory()
                            ->count(3)
                            ->state(new Sequence(
                                ['nom' => 'Minim'],
                                ['nom' => 'Cadet'],
                                ['nom' => 'Senior'],
                            ))
                            ->state(new Sequence(
                                ['sexe' => 'HOMME'],
                                ['sexe' => 'FEMME'],
                            ))
                            ->state(new Sequence(
                                ['poids' => '-40 KG'],
                                ['poids' => '-50 KG'],
                                ['poids' => '+50 KG'],
                            ))
                            ->has(
                                Athlete::factory()
                                    ->count(2)
                                    ->state(function (array $attributes, Categorie $categorie) {
                                        return ['sexe' => $categorie->sexe];
                                    })
                                    ->for(
                                        Equipe::factory()
                                    )
                                    ->hasCommentaires(2)

                            )

                    )
                    ->hasCommentaires(2)

            )
            ->create();
    }
}
