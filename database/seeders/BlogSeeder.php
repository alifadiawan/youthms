<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $blog = [
            [
                'id_artikel' => 1,
                'foto' => 'blog (1).jpeg',
                'judul' => 'how to not to how',
                'tanggal' => carbon::parse('2023-06-03'),
                'isi' => '
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita earum mollitia deleniti nostrum tempora excepturi corrupti ducimus aut
                 quod enim commodi minus hic, ea ipsa iusto quidem, totam nihil quae? Natus quibusdam harum nulla voluptates nemo fugiat dignissimos dicta 
                 eligendi, similique vero delectus explicabo maxime amet obcaecati facilis ad! Nihil obcaecati vero fugiat qui eaque rem optio perferendis 
                 earum tempora aut! Beatae ut nostrum at aliquam, necessitatibus suscipit deleniti corrupti fugit quaerat error vero provident sed quae? Illo 
                 nisi saepe, adipisci, sequi ad laborum a sed nihil excepturi iste dolorem deserunt non velit error? Assumenda eveniet iste at quidem magni.',
                'visitor' => null,
                'users_id' => 1,
                'segmen_id' => 3,
            ],
            [
                'id_artikel' => 2,
                'foto' => 'blog (1).jpg',
                'judul' => 'how to not to be a1',
                'tanggal' => carbon::parse('2023-06-03'),
                'isi' => '
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam sit asperiores ut, voluptatem dicta quaerat quo magnam repellat iste mollitia 
                possimus a corporis. Soluta, nemo vel vitae laborum nulla explicabo reiciendis harum, obcaecati labore quos accusamus, maxime doloribus in
                 suscipit porro exercitationem aut consequatur similique alias dignissimos adipisci corrupti neque!',
                'visitor' => null,
                'users_id' => 1,
                'segmen_id' => 2,
            ],
            [
                'id_artikel' => 3,
                'foto' => 'blog (4).jpg',
                'judul' => 'how to not to make a war with girl',
                'tanggal' => carbon::parse('2023-06-03'),
                'isi' => 'dont be wrong :D',
                'visitor' => null,
                'users_id' => 1,
                'segmen_id' => 3,
            ],
        ];

        Blog::insert($blog);
    }
}
