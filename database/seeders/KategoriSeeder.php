<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $default = ['Undangan','Pengumuman','Nota Dinas','Pemberitahuan'];
        foreach($default as $d) {
            Kategori::firstOrCreate(['nama'=>$d]);
        }
    }
}
