<?php

    namespace Database\Seeders;

    use App\Traits\SeederDataTrait;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;

    class RegionSeeder extends Seeder
    {

        use SeederDataTrait;

        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            $list = self::listRegions();
            $date = date('Y-m-d H:i:s');

            foreach ($list as $item) {
                DB::table('regions')->insert([
                    'region_id' => $item['region_id'],
                    'region' => $item['region'],
                    'code' => $item['code'],
                    'created_at' => $date,
                    'updated_at' => $date,
                ]);
            }
        }
    }
