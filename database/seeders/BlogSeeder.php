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
                'foto' => 'bmw.jpg',
                'judul' => 'how to not to how',
                'isi' => '
                 <p style="text-indent: 2cm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita earum mollitia deleniti nostrum tempora excepturi corrupti ducimus aut
                 quod enim commodi minus hic, ea ipsa iusto quidem, totam nihil quae? Natus quibusdam harum nulla voluptates nemo fugiat dignissimos dicta 
                 eligendi, similique vero delectus explicabo maxime amet obcaecati facilis ad! Nihil obcaecati vero fugiat qui eaque rem optio perferendis 
                 earum tempora aut! Beatae ut nostrum at aliquam, necessitatibus suscipit deleniti corrupti fugit quaerat error vero provident sed quae? Illo 
                 nisi saepe, adipisci, sequi ad laborum a sed nihil excepturi iste dolorem deserunt non velit error? Assumenda eveniet iste at quidem magni.</p>',
                'visitor' => 569,
                'users_id' => 1,
                'segmen_id' => 1,
                'created_at' =>carbon::parse('2023-06-01'),
                'updated_at' =>null,
            ],
            [
                'id_artikel' => 2,
                'foto' => 'bmw - Copy (1).jpg',
                'judul' => 'how to not to be a1',
                'isi' => '<p style="text-indent: 2cm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita earum mollitia deleniti nostrum tempora excepturi corrupti ducimus aut
                 quod enim commodi minus hic, ea ipsa iusto quidem, totam nihil quae? Natus quibusdam harum nulla voluptates nemo fugiat dignissimos dicta 
                 eligendi, similique vero delectus explicabo maxime amet obcaecati facilis ad! Nihil obcaecati vero fugiat qui eaque rem optio perferendis 
                 earum tempora aut! Beatae ut nostrum at aliquam, necessitatibus suscipit deleniti corrupti fugit quaerat error vero provident sed quae? Illo 
                 nisi saepe, adipisci, sequi ad laborum a sed nihil excepturi iste dolorem deserunt non velit error? Assumenda eveniet iste at quidem magni.</p>',
                'visitor' => 245,
                'users_id' => 1,
                'segmen_id' => 2,
                'created_at' =>carbon::parse('2023-06-02'),
                'updated_at' =>null,
            ],
            [
                'id_artikel' => 3,
                'foto' => 'bmw - Copy (2).jpg',
                'judul' => 'how to not to make a war with girl',
                'isi' => '<p style="text-indent: 2cm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita earum mollitia deleniti nostrum tempora excepturi corrupti ducimus aut
                 quod enim commodi minus hic, ea ipsa iusto quidem, totam nihil quae? Natus quibusdam harum nulla voluptates nemo fugiat dignissimos dicta 
                 eligendi, similique vero delectus explicabo maxime amet obcaecati facilis ad! Nihil obcaecati vero fugiat qui eaque rem optio perferendis 
                 earum tempora aut! Beatae ut nostrum at aliquam, necessitatibus suscipit deleniti corrupti fugit quaerat error vero provident sed quae? Illo 
                 nisi saepe, adipisci, sequi ad laborum a sed nihil excepturi iste dolorem deserunt non velit error? Assumenda eveniet iste at quidem magni.</p>',
                'visitor' => 764,
                'users_id' => 1,
                'segmen_id' => 3,
                'created_at' =>carbon::parse('2023-06-03'),
                'updated_at' =>null,
            ],
            [
                'id_artikel' => 3,
                'foto' => 'bmw - Copy (1).jpg',
                'judul' => 'how to not to make a war with girl',
                'isi' => '<p style="text-indent: 2cm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita earum mollitia deleniti nostrum tempora excepturi corrupti ducimus aut
                 quod enim commodi minus hic, ea ipsa iusto quidem, totam nihil quae? Natus quibusdam harum nulla voluptates nemo fugiat dignissimos dicta 
                 eligendi, similique vero delectus explicabo maxime amet obcaecati facilis ad! Nihil obcaecati vero fugiat qui eaque rem optio perferendis 
                 earum tempora aut! Beatae ut nostrum at aliquam, necessitatibus suscipit deleniti corrupti fugit quaerat error vero provident sed quae? Illo 
                 nisi saepe, adipisci, sequi ad laborum a sed nihil excepturi iste dolorem deserunt non velit error? Assumenda eveniet iste at quidem magni.</p>',
                'visitor' => 353,
                'users_id' => 1,
                'segmen_id' => 1,
                'created_at' =>carbon::parse('2023-06-04'),
                'updated_at' =>null,
            ],
            [
                'id_artikel' => 3,
                'foto' => 'bmw - Copy (1).jpg',
                'judul' => 'how to not to make a war with girl',
                'isi' => '<p style="text-indent: 2cm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita earum mollitia deleniti nostrum tempora excepturi corrupti ducimus aut
                 quod enim commodi minus hic, ea ipsa iusto quidem, totam nihil quae? Natus quibusdam harum nulla voluptates nemo fugiat dignissimos dicta 
                 eligendi, similique vero delectus explicabo maxime amet obcaecati facilis ad! Nihil obcaecati vero fugiat qui eaque rem optio perferendis 
                 earum tempora aut! Beatae ut nostrum at aliquam, necessitatibus suscipit deleniti corrupti fugit quaerat error vero provident sed quae? Illo 
                 nisi saepe, adipisci, sequi ad laborum a sed nihil excepturi iste dolorem deserunt non velit error? Assumenda eveniet iste at quidem magni.</p>',
                'visitor' => 556,
                'users_id' => 1,
                'segmen_id' => 2,
                  'created_at' =>carbon::parse('2023-06-05'),
                'updated_at' =>null,
            ],
            [
                'id_artikel' => 3,
                'foto' => 'bmw - Copy (1).jpg',
                'judul' => 'how to not to make a war with girl',
                'isi' => '<p style="text-indent: 2cm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita earum mollitia deleniti nostrum tempora excepturi corrupti ducimus aut
                 quod enim commodi minus hic, ea ipsa iusto quidem, totam nihil quae? Natus quibusdam harum nulla voluptates nemo fugiat dignissimos dicta 
                 eligendi, similique vero delectus explicabo maxime amet obcaecati facilis ad! Nihil obcaecati vero fugiat qui eaque rem optio perferendis 
                 earum tempora aut! Beatae ut nostrum at aliquam, necessitatibus suscipit deleniti corrupti fugit quaerat error vero provident sed quae? Illo 
                 nisi saepe, adipisci, sequi ad laborum a sed nihil excepturi iste dolorem deserunt non velit error? Assumenda eveniet iste at quidem magni.</p>',
                'visitor' => 345,
                'users_id' => 1,
                'segmen_id' => 3,
                  'created_at' =>carbon::parse('2023-06-06'),
                'updated_at' =>null,
            ],
            [
                'id_artikel' => 3,
                'foto' => 'bmw - Copy (1).jpg',
                'judul' => 'how to not to make a war with girl',
                'isi' => '<p style="text-indent: 2cm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita earum mollitia deleniti nostrum tempora excepturi corrupti ducimus aut
                 quod enim commodi minus hic, ea ipsa iusto quidem, totam nihil quae? Natus quibusdam harum nulla voluptates nemo fugiat dignissimos dicta 
                 eligendi, similique vero delectus explicabo maxime amet obcaecati facilis ad! Nihil obcaecati vero fugiat qui eaque rem optio perferendis 
                 earum tempora aut! Beatae ut nostrum at aliquam, necessitatibus suscipit deleniti corrupti fugit quaerat error vero provident sed quae? Illo 
                 nisi saepe, adipisci, sequi ad laborum a sed nihil excepturi iste dolorem deserunt non velit error? Assumenda eveniet iste at quidem magni.</p>',
                'visitor' => 635,
                'users_id' => 1,
                'segmen_id' => 1,
                  'created_at' =>carbon::parse('2023-06-07'),
                'updated_at' =>null,
            ],
            [
                'id_artikel' => 3,
                'foto' => 'bmw - Copy (1).jpg',
                'judul' => 'how to not to make a war with girl',
                'isi' => '<p style="text-indent: 2cm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita earum mollitia deleniti nostrum tempora excepturi corrupti ducimus aut
                 quod enim commodi minus hic, ea ipsa iusto quidem, totam nihil quae? Natus quibusdam harum nulla voluptates nemo fugiat dignissimos dicta 
                 eligendi, similique vero delectus explicabo maxime amet obcaecati facilis ad! Nihil obcaecati vero fugiat qui eaque rem optio perferendis 
                 earum tempora aut! Beatae ut nostrum at aliquam, necessitatibus suscipit deleniti corrupti fugit quaerat error vero provident sed quae? Illo 
                 nisi saepe, adipisci, sequi ad laborum a sed nihil excepturi iste dolorem deserunt non velit error? Assumenda eveniet iste at quidem magni.</p>',
                'visitor' => 933,
                'users_id' => 1,
                'segmen_id' => 2,
                  'created_at' =>carbon::parse('2023-06-08'),
                'updated_at' =>null,
            ],
            [
                'id_artikel' => 3,
                'foto' => 'bmw - Copy (1).jpg',
                'judul' => 'how to not to make a war with girl',
                'isi' => '<p style="text-indent: 2cm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita earum mollitia deleniti nostrum tempora excepturi corrupti ducimus aut
                 quod enim commodi minus hic, ea ipsa iusto quidem, totam nihil quae? Natus quibusdam harum nulla voluptates nemo fugiat dignissimos dicta 
                 eligendi, similique vero delectus explicabo maxime amet obcaecati facilis ad! Nihil obcaecati vero fugiat qui eaque rem optio perferendis 
                 earum tempora aut! Beatae ut nostrum at aliquam, necessitatibus suscipit deleniti corrupti fugit quaerat error vero provident sed quae? Illo 
                 nisi saepe, adipisci, sequi ad laborum a sed nihil excepturi iste dolorem deserunt non velit error? Assumenda eveniet iste at quidem magni.</p>',
                'visitor' => 3213,
                'users_id' => 1,
                'segmen_id' => 3,
                  'created_at' =>carbon::parse('2023-06-09'),
                'updated_at' =>null,
            ],
            [
                'id_artikel' => 3,
                'foto' => 'bmw - Copy (1).jpg',
                'judul' => 'how to not to make a war with girl',
                'isi' => '<p style="text-indent: 2cm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita earum mollitia deleniti nostrum tempora excepturi corrupti ducimus aut
                 quod enim commodi minus hic, ea ipsa iusto quidem, totam nihil quae? Natus quibusdam harum nulla voluptates nemo fugiat dignissimos dicta 
                 eligendi, similique vero delectus explicabo maxime amet obcaecati facilis ad! Nihil obcaecati vero fugiat qui eaque rem optio perferendis 
                 earum tempora aut! Beatae ut nostrum at aliquam, necessitatibus suscipit deleniti corrupti fugit quaerat error vero provident sed quae? Illo 
                 nisi saepe, adipisci, sequi ad laborum a sed nihil excepturi iste dolorem deserunt non velit error? Assumenda eveniet iste at quidem magni.</p>',
                'visitor' => 32,
                'users_id' => 1,
                'segmen_id' => 1,
                  'created_at' =>carbon::parse('2023-06-10'),
                'updated_at' =>null,
            ],
            [
                'id_artikel' => 3,
                'foto' => 'bmw - Copy (1).jpg',
                'judul' => 'how to not to make a war with girl',
                'isi' => '<p style="text-indent: 2cm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita earum mollitia deleniti nostrum tempora excepturi corrupti ducimus aut
                 quod enim commodi minus hic, ea ipsa iusto quidem, totam nihil quae? Natus quibusdam harum nulla voluptates nemo fugiat dignissimos dicta 
                 eligendi, similique vero delectus explicabo maxime amet obcaecati facilis ad! Nihil obcaecati vero fugiat qui eaque rem optio perferendis 
                 earum tempora aut! Beatae ut nostrum at aliquam, necessitatibus suscipit deleniti corrupti fugit quaerat error vero provident sed quae? Illo 
                 nisi saepe, adipisci, sequi ad laborum a sed nihil excepturi iste dolorem deserunt non velit error? Assumenda eveniet iste at quidem magni.</p>',
                'visitor' => 200,
                'users_id' => 1,
                'segmen_id' => 2,
                  'created_at' =>carbon::parse('2023-06-11'),
                'updated_at' =>null,
            ],
            [
                'id_artikel' => 3,
                'foto' => 'bmw - Copy (1).jpg',
                'judul' => 'how to not to make a war with girl',
                'isi' => '<p style="text-indent: 2cm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita earum mollitia deleniti nostrum tempora excepturi corrupti ducimus aut
                 quod enim commodi minus hic, ea ipsa iusto quidem, totam nihil quae? Natus quibusdam harum nulla voluptates nemo fugiat dignissimos dicta 
                 eligendi, similique vero delectus explicabo maxime amet obcaecati facilis ad! Nihil obcaecati vero fugiat qui eaque rem optio perferendis 
                 earum tempora aut! Beatae ut nostrum at aliquam, necessitatibus suscipit deleniti corrupti fugit quaerat error vero provident sed quae? Illo 
                 nisi saepe, adipisci, sequi ad laborum a sed nihil excepturi iste dolorem deserunt non velit error? Assumenda eveniet iste at quidem magni.</p>',
                'visitor' => 500,
                'users_id' => 1,
                'segmen_id' => 3,
                  'created_at' =>carbon::parse('2023-06-12'),
                'updated_at' =>null,
            ],
            [
                'id_artikel' => 3,
                'foto' => 'bmw - Copy (1).jpg',
                'judul' => 'how to not to make a war with girl',
                'isi' => '<p style="text-indent: 2cm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita earum mollitia deleniti nostrum tempora excepturi corrupti ducimus aut
                 quod enim commodi minus hic, ea ipsa iusto quidem, totam nihil quae? Natus quibusdam harum nulla voluptates nemo fugiat dignissimos dicta 
                 eligendi, similique vero delectus explicabo maxime amet obcaecati facilis ad! Nihil obcaecati vero fugiat qui eaque rem optio perferendis 
                 earum tempora aut! Beatae ut nostrum at aliquam, necessitatibus suscipit deleniti corrupti fugit quaerat error vero provident sed quae? Illo 
                 nisi saepe, adipisci, sequi ad laborum a sed nihil excepturi iste dolorem deserunt non velit error? Assumenda eveniet iste at quidem magni.</p>',
                'visitor' => 236,
                'users_id' => 1,
                'segmen_id' => 1,
                  'created_at' =>carbon::parse('2023-06-13'),
                'updated_at' =>null,
            ],
            [
                'id_artikel' => 3,
                'foto' => 'bmw - Copy (1).jpg',
                'judul' => 'how to not to make a war with girl',
                'isi' => '<p style="text-indent: 2cm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita earum mollitia deleniti nostrum tempora excepturi corrupti ducimus aut
                 quod enim commodi minus hic, ea ipsa iusto quidem, totam nihil quae? Natus quibusdam harum nulla voluptates nemo fugiat dignissimos dicta 
                 eligendi, similique vero delectus explicabo maxime amet obcaecati facilis ad! Nihil obcaecati vero fugiat qui eaque rem optio perferendis 
                 earum tempora aut! Beatae ut nostrum at aliquam, necessitatibus suscipit deleniti corrupti fugit quaerat error vero provident sed quae? Illo 
                 nisi saepe, adipisci, sequi ad laborum a sed nihil excepturi iste dolorem deserunt non velit error? Assumenda eveniet iste at quidem magni.</p>',
                'visitor' => 653,
                'users_id' => 1,
                'segmen_id' => 2,
                  'created_at' =>carbon::parse('2023-06-13'),
                'updated_at' =>null,
            ],
            [
                'id_artikel' => 3,
                'foto' => 'bmw - Copy (1).jpg',
                'judul' => 'how to not to make a war with girl',
                'isi' => '<p style="text-indent: 2cm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita earum mollitia deleniti nostrum tempora excepturi corrupti ducimus aut
                 quod enim commodi minus hic, ea ipsa iusto quidem, totam nihil quae? Natus quibusdam harum nulla voluptates nemo fugiat dignissimos dicta 
                 eligendi, similique vero delectus explicabo maxime amet obcaecati facilis ad! Nihil obcaecati vero fugiat qui eaque rem optio perferendis 
                 earum tempora aut! Beatae ut nostrum at aliquam, necessitatibus suscipit deleniti corrupti fugit quaerat error vero provident sed quae? Illo 
                 nisi saepe, adipisci, sequi ad laborum a sed nihil excepturi iste dolorem deserunt non velit error? Assumenda eveniet iste at quidem magni.</p>',
                'visitor' => 997,
                'users_id' => 1,
                'segmen_id' => 3,
                  'created_at' =>carbon::parse('2023-06-14'),
                'updated_at' =>null,
            ],
            [
                'id_artikel' => 3,
                'foto' => 'bmw - Copy (1).jpg',
                'judul' => 'how to not to make a war with girl',
                'isi' => '<p style="text-indent: 2cm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita earum mollitia deleniti nostrum tempora excepturi corrupti ducimus aut
                 quod enim commodi minus hic, ea ipsa iusto quidem, totam nihil quae? Natus quibusdam harum nulla voluptates nemo fugiat dignissimos dicta 
                 eligendi, similique vero delectus explicabo maxime amet obcaecati facilis ad! Nihil obcaecati vero fugiat qui eaque rem optio perferendis 
                 earum tempora aut! Beatae ut nostrum at aliquam, necessitatibus suscipit deleniti corrupti fugit quaerat error vero provident sed quae? Illo 
                 nisi saepe, adipisci, sequi ad laborum a sed nihil excepturi iste dolorem deserunt non velit error? Assumenda eveniet iste at quidem magni.</p>',
                'visitor' => 242,
                'users_id' => 1,
                'segmen_id' => 1,
                  'created_at' =>carbon::parse('2023-06-15'),
                'updated_at' =>null,
            ],
            [
                'id_artikel' => 3,
                'foto' => 'bmw - Copy (1).jpg',
                'judul' => 'how to not to make a war with girl',
                'isi' => '<p style="text-indent: 2cm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita earum mollitia deleniti nostrum tempora excepturi corrupti ducimus aut
                 quod enim commodi minus hic, ea ipsa iusto quidem, totam nihil quae? Natus quibusdam harum nulla voluptates nemo fugiat dignissimos dicta 
                 eligendi, similique vero delectus explicabo maxime amet obcaecati facilis ad! Nihil obcaecati vero fugiat qui eaque rem optio perferendis 
                 earum tempora aut! Beatae ut nostrum at aliquam, necessitatibus suscipit deleniti corrupti fugit quaerat error vero provident sed quae? Illo 
                 nisi saepe, adipisci, sequi ad laborum a sed nihil excepturi iste dolorem deserunt non velit error? Assumenda eveniet iste at quidem magni.</p>',
                'visitor' => 242,
                'users_id' => 1,
                'segmen_id' => 2,
                  'created_at' =>carbon::parse('2023-05-20'),
                'updated_at' =>null,
            ],
            [
                'id_artikel' => 3,
                'foto' => 'bmw - Copy (1).jpg',
                'judul' => 'how to not to make a war with girl',
                'isi' => '<p style="text-indent: 2cm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita earum mollitia deleniti nostrum tempora excepturi corrupti ducimus aut
                 quod enim commodi minus hic, ea ipsa iusto quidem, totam nihil quae? Natus quibusdam harum nulla voluptates nemo fugiat dignissimos dicta 
                 eligendi, similique vero delectus explicabo maxime amet obcaecati facilis ad! Nihil obcaecati vero fugiat qui eaque rem optio perferendis 
                 earum tempora aut! Beatae ut nostrum at aliquam, necessitatibus suscipit deleniti corrupti fugit quaerat error vero provident sed quae? Illo 
                 nisi saepe, adipisci, sequi ad laborum a sed nihil excepturi iste dolorem deserunt non velit error? Assumenda eveniet iste at quidem magni.</p>',
                'visitor' => 242,
                'users_id' => 1,
                'segmen_id' => 3,
                  'created_at' =>carbon::parse('2023-04-21'),
                'updated_at' =>null,
            ],
            [
                'id_artikel' => 3,
                'foto' => 'bmw - Copy (1).jpg',
                'judul' => 'how to not to make a war with girl',
                'isi' => '<p style="text-indent: 2cm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita earum mollitia deleniti nostrum tempora excepturi corrupti ducimus aut
                 quod enim commodi minus hic, ea ipsa iusto quidem, totam nihil quae? Natus quibusdam harum nulla voluptates nemo fugiat dignissimos dicta 
                 eligendi, similique vero delectus explicabo maxime amet obcaecati facilis ad! Nihil obcaecati vero fugiat qui eaque rem optio perferendis 
                 earum tempora aut! Beatae ut nostrum at aliquam, necessitatibus suscipit deleniti corrupti fugit quaerat error vero provident sed quae? Illo 
                 nisi saepe, adipisci, sequi ad laborum a sed nihil excepturi iste dolorem deserunt non velit error? Assumenda eveniet iste at quidem magni.</p>',
                'visitor' => 242,
                'users_id' => 1,
                'segmen_id' => 1,
                  'created_at' =>carbon::parse('2023-04-22'),
                'updated_at' =>null,
            ],
            [
                'id_artikel' => 3,
                'foto' => 'bmw - Copy (1).jpg',
                'judul' => 'how to not to make a war with girl',
                'isi' => '<p style="text-indent: 2cm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita earum mollitia deleniti nostrum tempora excepturi corrupti ducimus aut
                 quod enim commodi minus hic, ea ipsa iusto quidem, totam nihil quae? Natus quibusdam harum nulla voluptates nemo fugiat dignissimos dicta 
                 eligendi, similique vero delectus explicabo maxime amet obcaecati facilis ad! Nihil obcaecati vero fugiat qui eaque rem optio perferendis 
                 earum tempora aut! Beatae ut nostrum at aliquam, necessitatibus suscipit deleniti corrupti fugit quaerat error vero provident sed quae? Illo 
                 nisi saepe, adipisci, sequi ad laborum a sed nihil excepturi iste dolorem deserunt non velit error? Assumenda eveniet iste at quidem magni.</p>',
                'visitor' => 242,
                'users_id' => 1,
                'segmen_id' => 2,
                  'created_at' =>carbon::parse('2023-04-23'),
                'updated_at' =>null,
            ],
            [
                'id_artikel' => 3,
                'foto' => 'bmw - Copy (1).jpg',
                'judul' => 'how to not to make a war with girl',
                'isi' => '<p style="text-indent: 2cm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita earum mollitia deleniti nostrum tempora excepturi corrupti ducimus aut
                 quod enim commodi minus hic, ea ipsa iusto quidem, totam nihil quae? Natus quibusdam harum nulla voluptates nemo fugiat dignissimos dicta 
                 eligendi, similique vero delectus explicabo maxime amet obcaecati facilis ad! Nihil obcaecati vero fugiat qui eaque rem optio perferendis 
                 earum tempora aut! Beatae ut nostrum at aliquam, necessitatibus suscipit deleniti corrupti fugit quaerat error vero provident sed quae? Illo 
                 nisi saepe, adipisci, sequi ad laborum a sed nihil excepturi iste dolorem deserunt non velit error? Assumenda eveniet iste at quidem magni.</p>',
                'visitor' => 242,
                'users_id' => 1,
                'segmen_id' => 3,
                  'created_at' =>carbon::parse('2023-04-24'),
                'updated_at' =>null,
            ],
            [
                'id_artikel' => 3,
                'foto' => 'bmw - Copy (1).jpg',
                'judul' => 'how to not to make a war with girl',
                'isi' => '<p style="text-indent: 2cm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita earum mollitia deleniti nostrum tempora excepturi corrupti ducimus aut
                 quod enim commodi minus hic, ea ipsa iusto quidem, totam nihil quae? Natus quibusdam harum nulla voluptates nemo fugiat dignissimos dicta 
                 eligendi, similique vero delectus explicabo maxime amet obcaecati facilis ad! Nihil obcaecati vero fugiat qui eaque rem optio perferendis 
                 earum tempora aut! Beatae ut nostrum at aliquam, necessitatibus suscipit deleniti corrupti fugit quaerat error vero provident sed quae? Illo 
                 nisi saepe, adipisci, sequi ad laborum a sed nihil excepturi iste dolorem deserunt non velit error? Assumenda eveniet iste at quidem magni.</p>',
                'visitor' => 242,
                'users_id' => 1,
                'segmen_id' => 1,
                  'created_at' =>carbon::parse('2023-04-25'),
                'updated_at' =>null,
            ],
            [
                'id_artikel' => 3,
                'foto' => 'bmw - Copy (1).jpg',
                'judul' => 'how to not to make a war with girl',
                'isi' => '<p style="text-indent: 2cm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita earum mollitia deleniti nostrum tempora excepturi corrupti ducimus aut
                 quod enim commodi minus hic, ea ipsa iusto quidem, totam nihil quae? Natus quibusdam harum nulla voluptates nemo fugiat dignissimos dicta 
                 eligendi, similique vero delectus explicabo maxime amet obcaecati facilis ad! Nihil obcaecati vero fugiat qui eaque rem optio perferendis 
                 earum tempora aut! Beatae ut nostrum at aliquam, necessitatibus suscipit deleniti corrupti fugit quaerat error vero provident sed quae? Illo 
                 nisi saepe, adipisci, sequi ad laborum a sed nihil excepturi iste dolorem deserunt non velit error? Assumenda eveniet iste at quidem magni.</p>',
                'visitor' => 242,
                'users_id' => 1,
                'segmen_id' => 2,
                  'created_at' =>carbon::parse('2023-04-26'),
                'updated_at' =>null,
            ],
            [
                'id_artikel' => 3,
                'foto' => 'bmw - Copy (1).jpg',
                'judul' => 'how to not to make a war with girl',
                'isi' => '<p style="text-indent: 2cm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita earum mollitia deleniti nostrum tempora excepturi corrupti ducimus aut
                 quod enim commodi minus hic, ea ipsa iusto quidem, totam nihil quae? Natus quibusdam harum nulla voluptates nemo fugiat dignissimos dicta 
                 eligendi, similique vero delectus explicabo maxime amet obcaecati facilis ad! Nihil obcaecati vero fugiat qui eaque rem optio perferendis 
                 earum tempora aut! Beatae ut nostrum at aliquam, necessitatibus suscipit deleniti corrupti fugit quaerat error vero provident sed quae? Illo 
                 nisi saepe, adipisci, sequi ad laborum a sed nihil excepturi iste dolorem deserunt non velit error? Assumenda eveniet iste at quidem magni.</p>',
                'visitor' => 242,
                'users_id' => 1,
                'segmen_id' => 3,
                  'created_at' =>carbon::parse('2023-04-27'),
                'updated_at' =>null,
            ],
            [
                'id_artikel' => 3,
                'foto' => 'bmw - Copy (1).jpg',
                'judul' => 'how to not to make a war with girl',
                'isi' => '<p style="text-indent: 2cm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita earum mollitia deleniti nostrum tempora excepturi corrupti ducimus aut
                 quod enim commodi minus hic, ea ipsa iusto quidem, totam nihil quae? Natus quibusdam harum nulla voluptates nemo fugiat dignissimos dicta 
                 eligendi, similique vero delectus explicabo maxime amet obcaecati facilis ad! Nihil obcaecati vero fugiat qui eaque rem optio perferendis 
                 earum tempora aut! Beatae ut nostrum at aliquam, necessitatibus suscipit deleniti corrupti fugit quaerat error vero provident sed quae? Illo 
                 nisi saepe, adipisci, sequi ad laborum a sed nihil excepturi iste dolorem deserunt non velit error? Assumenda eveniet iste at quidem magni.</p>',
                'visitor' => 242,
                'users_id' => 1,
                'segmen_id' => 1,
                  'created_at' =>carbon::parse('2023-04-28'),
                'updated_at' =>null,
            ],
            [
                'id_artikel' => 3,
                'foto' => 'bmw - Copy (1).jpg',
                'judul' => 'how to not to make a war with girl',
                'isi' => '<p style="text-indent: 2cm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita earum mollitia deleniti nostrum tempora excepturi corrupti ducimus aut
                 quod enim commodi minus hic, ea ipsa iusto quidem, totam nihil quae? Natus quibusdam harum nulla voluptates nemo fugiat dignissimos dicta 
                 eligendi, similique vero delectus explicabo maxime amet obcaecati facilis ad! Nihil obcaecati vero fugiat qui eaque rem optio perferendis 
                 earum tempora aut! Beatae ut nostrum at aliquam, necessitatibus suscipit deleniti corrupti fugit quaerat error vero provident sed quae? Illo 
                 nisi saepe, adipisci, sequi ad laborum a sed nihil excepturi iste dolorem deserunt non velit error? Assumenda eveniet iste at quidem magni.</p>',
                'visitor' => 242,
                'users_id' => 1,
                'segmen_id' => 2,
                  'created_at' =>carbon::parse('2023-04-29'),
                'updated_at' =>null,
            ],
            [
                'id_artikel' => 3,
                'foto' => 'bmw - Copy (1).jpg',
                'judul' => 'how to not to make a war with girl',
                'isi' => '<p style="text-indent: 2cm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita earum mollitia deleniti nostrum tempora excepturi corrupti ducimus aut
                 quod enim commodi minus hic, ea ipsa iusto quidem, totam nihil quae? Natus quibusdam harum nulla voluptates nemo fugiat dignissimos dicta 
                 eligendi, similique vero delectus explicabo maxime amet obcaecati facilis ad! Nihil obcaecati vero fugiat qui eaque rem optio perferendis 
                 earum tempora aut! Beatae ut nostrum at aliquam, necessitatibus suscipit deleniti corrupti fugit quaerat error vero provident sed quae? Illo 
                 nisi saepe, adipisci, sequi ad laborum a sed nihil excepturi iste dolorem deserunt non velit error? Assumenda eveniet iste at quidem magni.</p>',
                'visitor' => 242,
                'users_id' => 1,
                'segmen_id' => 3,
                  'created_at' =>carbon::parse('2023-04-30'),
                'updated_at' =>null,
            ],
            [
                'id_artikel' => 3,
                'foto' => 'bmw - Copy (1).jpg',
                'judul' => 'how to not to make a war with girl',
                'isi' => '<p style="text-indent: 2cm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita earum mollitia deleniti nostrum tempora excepturi corrupti ducimus aut
                 quod enim commodi minus hic, ea ipsa iusto quidem, totam nihil quae? Natus quibusdam harum nulla voluptates nemo fugiat dignissimos dicta 
                 eligendi, similique vero delectus explicabo maxime amet obcaecati facilis ad! Nihil obcaecati vero fugiat qui eaque rem optio perferendis 
                 earum tempora aut! Beatae ut nostrum at aliquam, necessitatibus suscipit deleniti corrupti fugit quaerat error vero provident sed quae? Illo 
                 nisi saepe, adipisci, sequi ad laborum a sed nihil excepturi iste dolorem deserunt non velit error? Assumenda eveniet iste at quidem magni.</p>',
                'visitor' => 242,
                'users_id' => 1,
                'segmen_id' => 1,
                  'created_at' =>carbon::parse('2023-04-31'),
                'updated_at' =>null,
            ],
        ];

        Blog::insert($blog);
    }
}
