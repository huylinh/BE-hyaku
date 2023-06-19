<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Nguyễn Huy Linh',
                'gender' => 'Male',
                'dob' => '2001-06-18',
                'role' => 'アドミン',
                'phone_num' => '1234567890',
                'email' => 'huylinh@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Nguyễn Văn A',
                'gender' => 'Male',
                'dob' => '1990-01-01',
                'role' => '客',
                'phone_num' => '0901234567',
                'email' => 'nguyenvana@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Trần Thị B',
                'gender' => 'Female',
                'dob' => '1992-03-15',
                'role' => '客',
                'phone_num' => '0912345678',
                'email' => 'tranthib@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Lê Văn C',
                'gender' => 'Male',
                'dob' => '1985-07-20',
                'role' => '客',
                'phone_num' => '0976543210',
                'email' => 'levanc@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Nguyễn Thị D',
                'gender' => 'Female',
                'dob' => '1995-05-10',
                'role' => '客',
                'phone_num' => '0987654321',
                'email' => 'nguyenthid@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Phạm Văn E',
                'gender' => 'Male',
                'dob' => '1993-11-18',
                'role' => '客',
                'phone_num' => '0909998887',
                'email' => 'phamvane@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Trần Văn F',
                'gender' => 'Male',
                'dob' => '1991-08-25',
                'role' => '客',
                'phone_num' => '0978887776',
                'email' => 'tranvanf@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Hoàng Thị G',
                'gender' => 'Female',
                'dob' => '1994-06-12',
                'role' => '客',
                'phone_num' => '0922223334',
                'email' => 'hoangthig@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Lê Thị H',
                'gender' => 'Female',
                'dob' => '1988-04-30',
                'role' => '客',
                'phone_num' => '0933334445',
                'email' => 'lethih@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Nguyễn Văn I',
                'gender' => 'Male',
                'dob' => '1996-12-05',
                'role' => '客',
                'phone_num' => '0944445556',
                'email' => 'nguyenvani@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Trần Thị K',
                'gender' => 'Female',
                'dob' => '1993-10-08',
                'role' => '客',
                'phone_num' => '0911112223',
                'email' => 'tranthik@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Vũ Văn L',
                'gender' => 'Male',
                'dob' => '1992-02-19',
                'role' => '客',
                'phone_num' => '0922223334',
                'email' => 'vuvanl@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Hồ Thị M',
                'gender' => 'Female',
                'dob' => '1997-09-21',
                'role' => '客',
                'phone_num' => '0933334445',
                'email' => 'hothim@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Phạm Văn N',
                'gender' => 'Male',
                'dob' => '1994-11-28',
                'role' => '客',
                'phone_num' => '0944445556',
                'email' => 'phamvann@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Lê Thị P',
                'gender' => 'Female',
                'dob' => '1991-03-04',
                'role' => '客',
                'phone_num' => '0912345678',
                'email' => 'lethip@example.com',
                'password' => Hash::make('password'),
            ],
        ];

        DB::table('users')->insert($users);

        $stores = [
            [
                'name' => 'Juice And Coffee',
                'address' => 'Kiốt 38 P. Chùa Bộc, Trung Liệt, Đống Đa, Hà Nội, Vietnam',
                'business_hour' => '2:10pm - 11pm',
                'air_condition' => true,
                'parking_lot' => false,
                'introduction' => 'これは紹介です。',
                'picture' => 'https://lh5.googleusercontent.com/p/AF1QipNwR3OjYVtUC_1Q-p2SnJ-pWmFxDBp-xivTfHO8=w408-h544-k-no',
                'owner_id' => 2,
                'coordinates' => '21.00661189953735,105.8259056620186',
                'max_capacity' => 30,
            ],
            [
                'name' => "Pham's Coffee",
                'address' => '26 Nguyễn Viết Xuân, Khương Mai, Thanh Xuân, Hà Nội, Vietnam',
                'business_hour' => '7:30am - 11pm',
                'air_condition' => true,
                'parking_lot' => true,
                'introduction' => 'Đây là một lời giới thiệu.',
                'picture' => 'https://lh5.googleusercontent.com/p/AF1QipNqRoz85ZfLLdBcR00AVz8qF7Mep828hQkdIETW=w408-h306-k-no',
                'owner_id' => 3,
                'coordinates' => '20.999991359946993,105.82700437846236',
                'max_capacity' => 40,
            ],
            [
                'name' => 'Miffy Coffee',
                'address' => '58 P. Đặng Văn Ngữ, Phương Liên, Đống Đa, Hà Nội, Vietnam',
                'business_hour' => '7:30pm - 10pm',
                'air_condition' => true,
                'parking_lot' => false,
                'introduction' => 'This is an introduction.',
                'picture' => 'https://lh5.googleusercontent.com/p/AF1QipNwR3OjYVtUC_1Q-p2SnJ-pWmFxDBp-xivTfHO8=w408-h544-k-no',
                'owner_id' => 4,
                'coordinates' => '21.013511867592182,105.83404615176448',
                'max_capacity' => 25,
            ],
            [
                'name' => 'Stereo Coffee',
                'address' => '77 P. Tuệ Tĩnh, Lê Đại Hành, Hai Bà Trưng, Hà Nội, Vietnam',
                'business_hour' => '8am - 10:30pm',
                'air_condition' => false,
                'parking_lot' => true,
                'introduction' => '',
                'picture' => 'https://lh5.googleusercontent.com/p/AF1QipO9-4jlz9G1f3TbSY-mJdA_hdJtLEfEdM42UZdk=w408-h544-k-no',
                'owner_id' => 6,
                'coordinates' => '21.015412409719083,105.848385203013',
                'max_capacity' => 50,
            ],
            [
                'name' => 'Highlands Coffee',
                'address' => '91 P. Trần Đại Nghĩa, Bách Khoa, Hai Bà Trưng, Hà Nội, Vietnam',
                'business_hour' => '7am - 10pm',
                'air_condition' => true,
                'parking_lot' => true,
                'introduction' => '',
                'picture' => 'https://lh5.googleusercontent.com/p/AF1QipOdXvToyzQlOjS9uz6ZRLk6RNKwki3VpuHfH7Vq=w426-h240-k-no',
                'owner_id' => 7,
                'coordinates' => '21.012449105068187,105.84987594975153',
                'max_capacity' => 35,
            ],
            [
                'name' => 'Highland Coffee',
                'address' => '191 P. Bà Triệu, Lê Đại Hành, Hai Bà Trưng, Hà Nội, Vietnam',
                'business_hour' => '7am - 10pm',
                'air_condition' => true,
                'parking_lot' => false,
                'introduction' => '',
                'picture' => 'https://lh5.googleusercontent.com/p/AF1QipMCIaYpFgQmmg5YkfB992J3ufo-xNvt7rPqfxq2=w408-h544-k-no',
                'owner_id' => 7,
                'coordinates' => '21.011429535663336,105.84987594982961',
                'max_capacity' => 40,
            ],
            [
                'name' => 'Brobusta Coffee Stand.',
                'address' => '51 P. Bùi Thị Xuân, Bùi Thị Xuân, Hai Bà Trưng, Hà Nội 11613, Vietnam',
                'business_hour' => '7:30pm - 11pm',
                'air_condition' => false,
                'parking_lot' => false,
                'introduction' => '',
                'picture' => 'https://lh5.googleusercontent.com/p/AF1QipMfjPWxZa98-0MSnXKBaaduyg1hFjFiHnRPyitI=w408-h510-k-no',
                'owner_id' => 10,
                'coordinates' => '21.017019925247627,105.84987594964564',
                'max_capacity' => 30,
            ],
            [
                'name' => 'The Coffee House',
                'address' => '122 P. Bùi Thị Xuân, Bùi Thị Xuân, Hai Bà Trưng, Hà Nội 100000, Vietnam',
                'business_hour' => '7am - 7pm',
                'air_condition' => false,
                'parking_lot' => true,
                'introduction' => '',
                'picture' => 'https://lh5.googleusercontent.com/p/AF1QipO4vRPr1_as9i8vbEx2aOjcqpr0IGQYABGWOvAc=w408-h306-k-no',
                'owner_id' => 9,
                'coordinates' => '21.013708904343876,105.84979884205961',
                'max_capacity' => 35,
            ],
            [
                'name' => 'Sunrise Coffee & Dessert',
                'address' => 'Kiốt 38 P. Chùa Bộc, Trung Liệt, Đống Đa, Hà Nội, Vietnam',
                'business_hour' => '7am - 11pm',
                'air_condition' => true,
                'parking_lot' => true,
                'introduction' => '',
                'picture' => 'https://lh5.googleusercontent.com/p/AF1QipNs0Pas78YIb74Du-wdyJdeC_9lbTbAtqghF-Bo=w408-h509-k-no',
                'owner_id' => 12,
                'coordinates' => '20.998782961071015,105.8528788492097',
                'max_capacity' => 25,
            ],
            [
                'name' => 'Coffee and Tea 294',
                'address' => '294 P. Lê Trọng Tấn, Khương Mai, Thanh Xuân, Hà Nội, Vietnam',
                'business_hour' => 'Open 24 hours',
                'air_condition' => true,
                'parking_lot' => true,
                'introduction' => '',
                'picture' => 'https://lh5.googleusercontent.com/p/AF1QipPc1NyXR0tCcJJ_kAlThweFR5NCQGeibfSEntEX=w408-h544-k-no',
                'owner_id' => 14,
                'coordinates' => '20.989928332393955,105.8340388964667',
                'max_capacity' => 30,
            ],
        ];

        DB::table('stores')->insert($stores);

        $aWorkingDaysData = [
            [
                'store_id' => 1,
                'guests' => 10,
                'updated_time' => Carbon::now(),
            ],
            [
                'store_id' => 2,
                'guests' => 30,
                'updated_time' => Carbon::now(),
            ],
            [
                'store_id' => 3,
                'guests' => 18,
                'updated_time' => Carbon::now(),
            ],
            [
                'store_id' => 4,
                'guests' => 30,
                'updated_time' => Carbon::now(),
            ],
            [
                'store_id' => 5,
                'guests' => 31,
                'updated_time' => Carbon::now(),
            ],
            [
                'store_id' => 6,
                'guests' => 35,
                'updated_time' => Carbon::now(),
            ],
            [
                'store_id' => 7,
                'guests' => 25,
                'updated_time' => Carbon::now(),
            ],
            [
                'store_id' => 8,
                'guests' => 21,
                'updated_time' => Carbon::now(),
            ],
            [
                'store_id' => 9,
                'guests' => 22,
                'updated_time' => Carbon::now(),
            ],
            [
                'store_id' => 10,
                'guests' => 17,
                'updated_time' => Carbon::now(),
            ],
        ];

        DB::table('a_working_days')->insert($aWorkingDaysData);

        $histories = [
            [
                'store_id' => 1,
                'user_id' => 3,
                'visited_time' => Carbon::now(),
            ],
            [
                'store_id' => 1,
                'user_id' => 8,
                'visited_time' => Carbon::now(),
            ],
            [
                'store_id' => 1,
                'user_id' => 9,
                'visited_time' => Carbon::now(),
            ],
            [
                'store_id' => 1,
                'user_id' => 11,
                'visited_time' => Carbon::now(),
            ],
            [
                'store_id' => 2,
                'user_id' => 4,
                'visited_time' => Carbon::now(),
            ],
            [
                'store_id' => 3,
                'user_id' => 5,
                'visited_time' => Carbon::now(),
            ],
            [
                'store_id' => 4,
                'user_id' => 6,
                'visited_time' => Carbon::now(),
            ],
            [
                'store_id' => 5,
                'user_id' => 7,
                'visited_time' => Carbon::now(),
            ],
            [
                'store_id' => 6,
                'user_id' => 8,
                'visited_time' => Carbon::now(),
            ],
            [
                'store_id' => 7,
                'user_id' => 9,
                'visited_time' => Carbon::now(),
            ],
            [
                'store_id' => 8,
                'user_id' => 10,
                'visited_time' => Carbon::now(),
            ],
            [
                'store_id' => 9,
                'user_id' => 11,
                'visited_time' => Carbon::now(),
            ],
            [
                'store_id' => 10,
                'user_id' => 12,
                'visited_time' => Carbon::now(),
            ],
        ];

        DB::table('histories')->insert($histories);

        $reviews = [
            [
                'stars' => 5,
                'comment' => 'コーヒーがとても美味しいです。おすすめです！',
                'picture' => 'https://picsum.photos/200/300',
                'history_id' => 1,
            ],
            [
                'stars' => 4,
                'comment' => '落ち着いた雰囲気でゆったりとくつろげるカフェです。',
                'picture' => 'https://picsum.photos/200/300',
                'history_id' => 2,
            ],
            [
                'stars' => 3,
                'comment' => '朝に利用するのがおすすめです。静かな雰囲気が好きです。',
                'picture' => 'https://picsum.photos/200/300',
                'history_id' => 3,
            ],
            [
                'stars' => 3,
                'comment' => 'ベーカリーと一緒に利用できるのが嬉しいです。',
                'picture' => 'https://picsum.photos/200/300',
                'history_id' => 4,
            ],
            [
                'stars' => 4,
                'comment' => '落ち着いた雰囲気でゆったりとくつろげるカフェです。',
                'picture' => 'https://picsum.photos/200/300',
                'history_id' => 5,
            ],
            [
                'stars' => 3,
                'comment' => '店内のインテリアが素敵で、居心地が良いです。',
                'picture' => 'https://picsum.photos/200/300',
                'history_id' => 6,
            ],
            [
                'stars' => 5,
                'comment' => 'スタッフの接客が素晴らしく、いつも気持ちよく利用しています。',
                'picture' => 'https://picsum.photos/200/300',
                'history_id' => 7,
            ],
            [
                'stars' => 4,
                'comment' => 'ここのアイスコーヒーは絶品です。一度飲んでみてください！',
                'picture' => 'https://picsum.photos/200/300',
                'history_id' => 8,
            ],
            [
                'stars' => 3,
                'comment' => '朝に利用するのがおすすめです。静かな雰囲気が好きです。',
                'picture' => 'https://picsum.photos/200/300',
                'history_id' => 9,
            ],
            [
                'stars' => 5,
                'comment' => '店内の音楽がとてもいいです。くつろげる空間です。',
                'picture' => 'https://picsum.photos/200/300',
                'history_id' => 10,
            ],
            [
                'stars' => 4,
                'comment' => 'おしゃれなカフェで、写真を撮るのにも最適です。',
                'picture' => 'https://picsum.photos/200/300',
                'history_id' => 11,
            ],
            [
                'stars' => 3,
                'comment' => 'ベーカリーと一緒に利用できるのが嬉しいです。',
                'picture' => 'https://picsum.photos/200/300',
                'history_id' => 12,
            ],
            [
                'stars' => 5,
                'comment' => '家族連れにもおすすめのカフェです。子供が楽しめます。',
                'picture' => 'https://picsum.photos/200/300',
                'history_id' => 13,
            ],
        ];

        DB::table('reviews')->insert($reviews);
    }
}
