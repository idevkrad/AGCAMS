<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DropdownsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('dropdowns')->delete();
        
        \DB::table('dropdowns')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'n/a',
                'classification' => 'n/a',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Director',
                'classification' => 'Role',
                'type' => 'User',
                'color' => 'n/a',
                'others' => 'n/a',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Counselor',
                'classification' => 'Role',
                'type' => 'User',
                'color' => 'n/a',
                'others' => 'n/a',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Secretary',
                'classification' => 'Role',
                'type' => 'User',
                'color' => 'n/a',
                'others' => 'n/a',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Single',
                'classification' => 'Civil Status',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Married',
                'classification' => 'Civil Status',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Widowed',
                'classification' => 'Civil Status',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Separated',
                'classification' => 'Civil Status',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Living Together',
                'classification' => 'Parents',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Separated',
                'classification' => 'Parents',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Widowed',
                'classification' => 'Parents',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Family Home',
                'classification' => 'Living Condition',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Dormitory',
                'classification' => 'Living Condition',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Relative\'s House',
                'classification' => 'Living Condition',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Boarding House',
                'classification' => 'Living Condition',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => 'n/a',
            ),
            16 => 
            array (
            'id' => 17,
            'name' => 'Filipino',
            'classification' => 'Ethnicities',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            17 => 
            array (
            'id' => 18,
            'name' => 'Visayan',
            'classification' => 'Ethnicities',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            18 => 
            array (
            'id' => 19,
            'name' => 'Lumad',
            'classification' => 'Ethnicities',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            19 => 
            array (
            'id' => 20,
            'name' => 'Mangyan',
            'classification' => 'Ethnicities',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            20 => 
            array (
            'id' => 21,
            'name' => 'Bicolano',
            'classification' => 'Ethnicities',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            21 => 
            array (
            'id' => 22,
            'name' => 'Kapampangan',
            'classification' => 'Ethnicities',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            22 => 
            array (
            'id' => 23,
            'name' => 'Hiligaynon',
            'classification' => 'Ethnicities',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            23 => 
            array (
            'id' => 24,
            'name' => 'Waray',
            'classification' => 'Ethnicities',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            24 => 
            array (
            'id' => 25,
            'name' => 'Butuanon',
            'classification' => 'Ethnicities',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            25 => 
            array (
            'id' => 26,
            'name' => 'Romblomanon',
            'classification' => 'Ethnicities',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            26 => 
            array (
            'id' => 27,
            'name' => 'Subanon',
            'classification' => 'Ethnicities',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            27 => 
            array (
            'id' => 28,
            'name' => 'Ati',
            'classification' => 'Ethnicities',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            28 => 
            array (
            'id' => 29,
            'name' => 'Chinese Filipino',
            'classification' => 'Ethnicities',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            29 => 
            array (
            'id' => 30,
            'name' => 'Moro',
            'classification' => 'Ethnicities',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            30 => 
            array (
            'id' => 31,
            'name' => 'Ivatan',
            'classification' => 'Ethnicities',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            31 => 
            array (
            'id' => 32,
            'name' => 'Igorot',
            'classification' => 'Ethnicities',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            32 => 
            array (
            'id' => 33,
            'name' => 'Ilocano',
            'classification' => 'Ethnicities',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            33 => 
            array (
            'id' => 34,
            'name' => 'Cebuano',
            'classification' => 'Ethnicities',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            34 => 
            array (
            'id' => 35,
            'name' => 'Ifugao',
            'classification' => 'Ethnicities',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            35 => 
            array (
            'id' => 36,
            'name' => 'Kalagan',
            'classification' => 'Ethnicities',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            36 => 
            array (
            'id' => 37,
            'name' => 'Austronesian',
            'classification' => 'Ethnicities',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            37 => 
            array (
            'id' => 38,
            'name' => 'Ibaloi',
            'classification' => 'Ethnicities',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            38 => 
            array (
            'id' => 39,
            'name' => 'Tausug',
            'classification' => 'Ethnicities',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            39 => 
            array (
            'id' => 40,
            'name' => 'Ibanag',
            'classification' => 'Ethnicities',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            40 => 
            array (
            'id' => 41,
            'name' => 'Filipino American',
            'classification' => 'Ethnicities',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            41 => 
            array (
            'id' => 42,
            'name' => 'Tagalog',
            'classification' => 'Ethnicities',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            42 => 
            array (
            'id' => 43,
            'name' => 'Samal',
            'classification' => 'Ethnicities',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            43 => 
            array (
            'id' => 44,
            'name' => 'Yakan',
            'classification' => 'Ethnicities',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            44 => 
            array (
            'id' => 45,
            'name' => 'Aeta',
            'classification' => 'Ethnicities',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            45 => 
            array (
            'id' => 46,
            'name' => 'Negrito',
            'classification' => 'Ethnicities',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            46 => 
            array (
            'id' => 47,
            'name' => 'Sama-Bajau',
            'classification' => 'Ethnicities',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            47 => 
            array (
            'id' => 48,
            'name' => 'Itawes',
            'classification' => 'Ethnicities',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            48 => 
            array (
            'id' => 49,
            'name' => 'Pangasinan',
            'classification' => 'Ethnicities',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            49 => 
            array (
            'id' => 50,
            'name' => 'Filipino Mestizo',
            'classification' => 'Ethnicities',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            50 => 
            array (
            'id' => 51,
            'name' => 'Sambal',
            'classification' => 'Ethnicities',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            51 => 
            array (
            'id' => 52,
            'name' => 'Ratagnon',
            'classification' => 'Ethnicities',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            52 => 
            array (
            'id' => 53,
            'name' => 'Zamboangueno',
            'classification' => 'Ethnicities',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            53 => 
            array (
            'id' => 54,
            'name' => 'Sangley',
            'classification' => 'Ethnicities',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            54 => 
            array (
            'id' => 55,
            'name' => 'English',
            'classification' => 'Languages/Dialect',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            55 => 
            array (
            'id' => 56,
            'name' => 'Chinese',
            'classification' => 'Languages/Dialect',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            56 => 
            array (
            'id' => 57,
            'name' => 'Filipino',
            'classification' => 'Languages/Dialect',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            57 => 
            array (
            'id' => 58,
            'name' => 'Tausug',
            'classification' => 'Languages/Dialect',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            58 => 
            array (
            'id' => 59,
            'name' => 'Visayan',
            'classification' => 'Languages/Dialect',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            59 => 
            array (
            'id' => 60,
            'name' => 'Yakan',
            'classification' => 'Languages/Dialect',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            60 => 
            array (
            'id' => 61,
            'name' => 'Chavacano',
            'classification' => 'Languages/Dialect',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            61 => 
            array (
            'id' => 62,
            'name' => 'Sama',
            'classification' => 'Languages/Dialect',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            62 => 
            array (
            'id' => 63,
            'name' => 'Maranao',
            'classification' => 'Languages/Dialect',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            63 => 
            array (
            'id' => 64,
            'name' => 'Waray',
            'classification' => 'Languages/Dialect',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            64 => 
            array (
            'id' => 65,
            'name' => 'Cebuano',
            'classification' => 'Languages/Dialect',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            65 => 
            array (
            'id' => 66,
            'name' => 'Bicolano',
            'classification' => 'Languages/Dialect',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            66 => 
            array (
            'id' => 67,
            'name' => 'Agta',
            'classification' => 'Languages/Dialect',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            67 => 
            array (
            'id' => 68,
            'name' => 'Ayta',
            'classification' => 'Languages/Dialect',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            68 => 
            array (
            'id' => 69,
            'name' => 'Ilocano',
            'classification' => 'Languages/Dialect',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            69 => 
            array (
            'id' => 70,
            'name' => 'Pangasinan',
            'classification' => 'Languages/Dialect',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            70 => 
            array (
            'id' => 71,
            'name' => 'Surigaonon',
            'classification' => 'Languages/Dialect',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            71 => 
            array (
            'id' => 72,
            'name' => 'Maguindanao',
            'classification' => 'Languages/Dialect',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            72 => 
            array (
            'id' => 73,
            'name' => 'Hiligaynon',
            'classification' => 'Languages/Dialect',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            73 => 
            array (
                'id' => 74,
                'name' => 'Roman Catholic',
                'classification' => 'Religion',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => '',
            ),
            74 => 
            array (
                'id' => 75,
                'name' => 'Iglesia ni Cristo',
                'classification' => 'Religion',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => '',
            ),
            75 => 
            array (
                'id' => 76,
                'name' => 'Christian',
                'classification' => 'Religion',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => '',
            ),
            76 => 
            array (
                'id' => 77,
                'name' => 'Islam',
                'classification' => 'Religion',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => '',
            ),
            77 => 
            array (
                'id' => 78,
                'name' => '7th day Adventist',
                'classification' => 'Religion',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => '',
            ),
            78 => 
            array (
                'id' => 79,
                'name' => 'Jehovah\'s Witness',
                'classification' => 'Religion',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => '',
            ),
  		    79 => 
            array (
                'id' => 80,
                'name' => 'Evangelicals (PCEC)',
                'classification' => 'Religion',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => '',
            ),
		    80 => 
            array (
                'id' => 81,
                'name' => 'Non-Roman Catholic and Protestant (NCCP)',
                'classification' => 'Religion',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => '',
            ),
		    81 => 
            array (
                'id' => 82,
                'name' => 'Aglipayan',
                'classification' => 'Religion',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => '',
            ),
		    82 => 
            array (
                'id' => 83,
                'name' => 'Bible Baptist Church',
                'classification' => 'Religion',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => '',
            ),
		    83 => 
            array (
                'id' => 84,
                'name' => 'United Church of Christ in the Philippines',
                'classification' => 'Religion',
                'type' => 'n/a',
                'color' => 'n/a',
                'others' => '',
            ),
            84 => 
            array (
            'id' => 85,
            'name' => 'Two-Parent',
            'classification' => 'Family Structure',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            85 => 
            array (
            'id' => 86,
            'name' => 'Extended',
            'classification' => 'Family Structure',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
            86 => 
            array (
            'id' => 87,
            'name' => 'Other:',
            'classification' => 'Family Structure',
            'type' => 'n/a',
            'color' => 'n/a',
            'others' => 'n/a',
            ),
        ));
        
        
    }
}