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

            $phones_quantity = 135791;
            $part_size = 100;

            $phones_list_unique = [];


            $i = 1;
            while ($i < $phones_quantity) {

                $i_part = $i;

                $phones_list = [];

                $part_limit = $i_part + $part_size;
                while ($i_part < $part_limit) {


                    // Формируем массив для пакетной записи в БД
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

                        $i_part++;
                    }
                }

                DB::table('phones')->insert($phones_list);

                $i = $i_part;
            }


        }


    }
