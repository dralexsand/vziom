<?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;

    class ViewsSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            $sql = "CREATE OR REPLACE VIEW v_phones AS
    SELECT
        phones.*, regions.code, regions.region, genders.gender
    FROM
        phones
            JOIN
        regions ON regions.region_id = phones.region_id
            JOIN
        genders ON genders.gender_id = phones.gender_id";

            DB::statement($sql);

        }
    }
