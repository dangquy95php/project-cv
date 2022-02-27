<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PrefSeeder::class,
            PBuildingSubcategoriesTableSeeder::class,
            QuestionCategoriesTableSeeder::class,
            PBuildingBasesSeeder::class,
            PBuildingDiluentsSeeder::class,
            PBuildingJisNumbersSeeder::class,
            PBuildingLustersSeeder::class,
            PBuildingMaterialsSeeder::class,
            PBuildingPackTypesSeeder::class,
            PBuildingProcessesSeeder::class,
            PBuildingPurposesSeeder::class,
            PBuildingResinsSeeder::class,
            PBuildingPaintingMethodsSeeder::class,
            PickupSortFaqsTableSeeder::class,
            PAutomotiveBasesSeeder::class,
            PAutomotiveClassificationsSeeder::class,
            PAutomotiveCharacteristicsSeeder::class,
            PAutomotiveFireLawClassificationsSeeder::class,
            PAutomotiveHardenerRatiosSeeder::class,
            PAutomotiveLabelsSeeder::class,
            PAutomotivePackTypesSeeder::class,
            PAutomotiveSubcategoriesSeeder::class,
            PLargeSpecBridgeRegulationSeeder::class,
            PLargeSpecBridgeCoatedMatterSeeder::class,
            PLargeSpecBridgePaintPointSeeder::class,
            PLargeSpecSteelFeatureSeeder::class,
            PLargeSpecSteelSystemSeeder::class,
            PLargeSpecSteelSolventTypeSeeder::class,
            PLargeSpecSteelPointSeeder::class,
            PLargeSolventTypesSeeder::class,
            PLargeSystemsSeeder::class,
            PLargeDiluentsSeeder::class,
            PLargeStandardCategoriesSeeder::class,
            PLargeStandardTableSeeder::class,
            DocumentCategoriesSeeder::class,
            PLargeSpecPlacesSeeder::class,
            PLargeSpecPaintingMethodsSeeder::class
        ]);
    }
}
