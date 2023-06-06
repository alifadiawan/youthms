<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Member;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $users = [
            [
                'username' => 'stevenalden',
                'password' => bcrypt('12345678'),
                'email' => 'stevenalden1304@youthms.id',
                'role_id' => '1',
            ],
            [
                'username' => 'alifadiawan',
                'password' => bcrypt('12345678'),
                'email' => 'alifadiawan2005@youthms.id',
                'role_id' => '1',
            ],
            [
                'username' => 'ilhambintang',
                'password' => bcrypt('12345678'),
                'email' => 'ilhambintanghuh30332@youthms.id',
                'role_id' => '1',
            ],
            [
                'username' => 'raflidwiferdiansyah',
                'password' => bcrypt('12345678'), 
                'email' => 'rafli.dwiferdiansyah@youthms.id',
                'role_id' => '1',
            ],
            [
                'username' => 'hafiyyanfazasantoso', 
                'password' => bcrypt('12345678'), 
                'email' => 'hafiyyan@youthms.id',
                'role_id' => '3',
            ],
            [
                'username' => 'anandanajahudinahmad', 
                'password' => bcrypt('12345678'), 
                'email' => 'ahmadananda@youthms.id',
                'role_id' => '4',
            ],
            [
                'username' => 'helsasalsabila',
                'password' => bcrypt('12345678'), 
                'email' => 'helsalsabila@youthms.id',
                'role_id' => '6',
            ],
            [
                'username' => 'abdufattahyurianta', 
                'password' => bcrypt('12345678'), 
                'email' => 'abdufayi@youthms.id',
                'role_id' => '8',
            ],
            [
                'username' => 'hidayahnurkhomariyah', 
                'password' => bcrypt('12345678'), 
                'email' => 'hidayahnk@youthms.id',
                'role_id' => '8',
            ],
            [
                'username' => 'fatimahazzahra',                
                'password' => bcrypt('12345678'), 
                'email' => 'fatimah22@youthms.id',
                'role_id' => '8',
            ],
            [
                'username' => 'riyanfirmansyah',                
                'password' => bcrypt('12345678'), 
                'email' => 'riyanf@youthms.id',
                'role_id' => '8',
            ],
            [
                'username' => 'nabilainezferoza',                
                'password' => bcrypt('12345678'), 
                'email' => 'inezferozah@youthms.id',
                'role_id' => '8',
            ],
            [
                'username' => 'anissadharma',                
                'password' => bcrypt('12345678'), 
                'email' => 'anissadharma@youthms.id',
                'role_id' => '8',
            ],
            [
                'username' => 'muhammadfarchanjuliansyah',                
                'password' => bcrypt('12345678'), 
                'email' => 'mfarchanj@youthms.id',
                'role_id' => '8',
            ],
            [
                'username' => 'naufaldzakidaffaalhaqi',                
                'password' => bcrypt('12345678'), 
                'email' => 'daffalhaqi@youthms.id',
                'role_id' => '8',
            ],
            [
                'username' => 'syaifathuljannah',                
                'password' => bcrypt('12345678'), 
                'email' => 'syaifathuljannah@youthms.id',
                'role_id' => '8',
            ],
            [
                'username' => 'mahdiyaaqila',                
                'password' => bcrypt('12345678'), 
                'email' => 'maqila@youthms.id',
                'role_id' => '8',
            ],
            [
                'username' => 'divakurniaachmadi',                
                'password' => bcrypt('12345678'), 
                'email' => 'kurniaachmadi@youthms.id',
                'role_id' => '5',
            ],
            [
                'username' => 'endahsulaiman',                
                'password' => bcrypt('12345678'), 
                'email' => 'endahsulaiman@youthms.id',
                'role_id' => '5',
            ],
            [
                'username' => 'zevanaasyamzahram',                
                'password' => bcrypt('12345678'), 
                'email' => 'zevanaevan@youthms.id',
                'role_id' => '9',
            ],
            [
                'username' => 'innafiljannatiaprilina',                
                'password' => bcrypt('12345678'), 
                'email' => 'innaaprilina@youthms.id',
                'role_id' => '5',
            ],
            [
                'username' => 'jayaraharja',                
                'password' => bcrypt('12345678'), 
                'email' => 'jaya10rpl2@youthms.id',
                'role_id' => '5',
            ],
            [
                'username' => 'egaaishaibahoktavia',                
                'password' => bcrypt('12345678'), 
                'email' => 'egaaxakl2@youthms.id',
                'role_id' => '6',
            ],
            [
                'username' => 'client2',                
                'password' => bcrypt('12345678'), 
                'email' => 'client2@youthms.id',
                'role_id' => '2',
            ],
        ];

        
        User::insert($users);
        
        $member = [
            ['id_member'=>"0023",'name'=>'si paling bukan klien','nik'=>36783213213,'no_hp'=>"0857232312",'alamat'=>"maag",'user_id'=>"24",]
        ];
        member::insert($member);
    }
}
