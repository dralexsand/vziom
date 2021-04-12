<?php

    namespace Database\Seeders;

    use App\Traits\SeederDataTrait;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;

    class GenderSeeder extends Seeder
    {

        use SeederDataTrait;

        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            $list = self::listGenders();
            $date = date('Y-m-d H:i:s');

            foreach ($list as $item) {
                DB::table('genders')->insert([
                    'gender_id' => $item['gender_id'],
                    'gender' => $item['gender'],
                    'created_at' => $date,
                    'updated_at' => $date,
                ]);
            }
        }
    }
