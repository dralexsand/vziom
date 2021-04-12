<?php

    namespace Database\Seeders;

    use App\Traits\SeederDataTrait;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;

    class PhoneSeeder extends Seeder
    {

        use SeederDataTrait;

        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {

            $i = 1;
            $phones_quantity = 135791;

            $phones_list_unique = [];
            $phones_list = [];

            // Формируем массив для пакетной записи в БД
            while ($i < $phones_quantity) {

                $phone = self::getRandomPhone();

                // Только уникальные номера телефонов
                if (!in_array($phone['phone'], $phones_list_unique)) {

                    $phones_list_unique[] = $phone['phone'];

                    $date = date('Y-m-d H:i:s');

                    $phones_list[] = [
                        'last_name' => self::getRandomName(),
                        'first_name' => self::getRandomName(),
                        'age' => self::getRandomAge(),
                        'region_id' => (int)$phone['region_id'],
                        'gender_id' => rand(1, 2),
                        'phone' => (int)$phone['phone'],
                        'created_at' => $date,
                        'updated_at' => $date,
                    ];

                    $i++;
                }
            }

            DB::table('phones')->insert($phones_list);
        }
    }
