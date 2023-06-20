<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //bagian ini daftarkan data anda
        $user = [
                [
                    'name'=> 'Ketua Pusat', //level 1
                    'username'=>'pusat',
                    'password'=>bcrypt('12345'),
                    'level'=>'1',
                    'email'=>'ketuapusat@gmail.com',
                ],
                [
                    'name'=> 'Ketua Wilayah', //level 12
                    'username'=>'wilayah',
                    'password'=>bcrypt('12345'),
                    'level'=>'2',
                    'email'=>'ketuawilayah@gmail.com',
                ],
                [
                    'name'=> 'Ketua Klasis', //level 3
                    'username'=>'klasis',
                    'password'=>bcrypt('12345'),
                    'level'=>'3',
                    'email'=>'ketuaklasis@gmail.com',
               ],
               [
                'name'=> 'Ketua Pemuda', //level 4
                'username'=>'pemuda',
                'password'=>bcrypt('12345'),
                'level'=>'4',
                'email'=>'ketuapemuda@gmail.com',
           ],
           [
            'name'=> 'Anggota Pemuda', //level 5
            'username'=>'anggotapemuda',
            'password'=>bcrypt('12345'),
            'level'=>'5',
            'email'=>'anggotapemuda@gmail.com',
       ],
                [
                    'name'=> 'Sekertaris', //level 6
                    'username'=>'sekertaris',
                    'password'=>bcrypt('12345'),
                    'level'=>'6',
                    'email'=>'sekertaris@gmail.com',
               ],
               [
                'name'=> 'Bendahara', //level 7
                'username'=>'bendahara',
                'password'=>bcrypt('12345'),
                'level'=>'7',
                'email'=>'bendahara@gmail.com',
           ],

        ];
             foreach ($user as $key=>$value){
                    User::create($value);
             }

    }
}
