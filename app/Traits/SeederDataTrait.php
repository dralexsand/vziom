<?php


    namespace App\Traits;

    trait SeederDataTrait
    {
        public static function listRegions()
        {
            return [
                [
                    'code' => '401',
                    'region' => 'Калининградская область',
                    'region_id' => 1
                ],
                [
                    'code' => '471',
                    'region' => 'Курская область',
                    'region_id' => 2
                ],
                [
                    'code' => '472',
                    'region' => 'Белгородская область',
                    'region_id' => 3
                ],
                [
                    'code' => '473',
                    'region' => 'Воронежская область',
                    'region_id' => 4
                ],
                [
                    'code' => '474',
                    'region' => 'Липецкая область',
                    'region_id' => 5
                ],
                [
                    'code' => '475',
                    'region' => 'Тамбовская область',
                    'region_id' => 6
                ],
                [
                    'code' => '481',
                    'region' => 'Смоленская область',
                    'region_id' => 7
                ],
                [
                    'code' => '482',
                    'region' => '	Тверская область',
                    'region_id' => 8
                ],
                [
                    'code' => '483',
                    'region' => 'Брянская область',
                    'region_id' => 9
                ],
                [
                    'code' => '484',
                    'region' => 'Калужская область',
                    'region_id' => 10
                ],
                [
                    'code' => '485',
                    'region' => 'Ярославская область',
                    'region_id' => 11
                ],
                [
                    'code' => '486',
                    'region' => 'Орловская область',
                    'region_id' => 12
                ],
                [
                    'code' => '487',
                    'region' => 'Тульская область',
                    'region_id' => 13
                ],
                [
                    'code' => '491',
                    'region' => 'Рязанская область',
                    'region_id' => 14
                ],
                [
                    'code' => '492',
                    'region' => 'Владимирская область',
                    'region_id' => 15
                ],
                [
                    'code' => '493',
                    'region' => 'Ивановская область',
                    'region_id' => 16
                ],
                [
                    'code' => '494',
                    'region' => 'Костромская область',
                    'region_id' => 17
                ],
                [
                    'code' => '495',
                    'region' => 'Москва, Московская область',
                    'region_id' => 18
                ],
                [
                    'code' => '499',
                    'region' => 'Москва, Московская область',
                    'region_id' => 19
                ],
                [
                    'code' => '496',
                    'region' => 'Москва, Московская область',
                    'region_id' => 20
                ],
                [
                    'code' => '498',
                    'region' => 'Москва, Московская область',
                    'region_id' => 21
                ],
                [
                    'code' => '997',
                    'region' => 'Москва, Московская область',
                    'region_id' => 22
                ],
            ];
        }

        public static function getRandomPhone()
        {
            $list = self::listRegions();
            $rand = rand(0, sizeof($list) - 1);
            $phone = $list[$rand];
            $phone['phone'] = '8' . $list[$rand]['code'] . self::generateRandomStringOnlyNumbers();
            return $phone;
        }

        public static function generateRandomStringOnlyNumbers($length = 7)
        {
            $characters = '1234567890';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

        public static function listGenders()
        {
            return [
                [
                    'gender_id' => 1,
                    'gender' => 'mail',
                ],
                [
                    'gender_id' => 2,
                    'gender' => 'female',
                ]
            ];
        }

        public static function getRandomGender()
        {
            $list = self::listGenders();
            $rand = rand(0, sizeof($list) - 1);
            return $list[$rand];
        }

        public static function getRandomAge($min = 17, $max = 117)
        {
            return rand($min, $max);
        }

        public static function generateRandomStringOnlyLetters($length = 10)
        {
            $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

        public static function getRandomName()
        {
            $min = 3;
            $max = 10;
            $rand = rand($min, $max);

            $name = self::generateRandomStringOnlyLetters($rand);
            $name = ucfirst(strtolower($name));
            return $name;
        }


    }
