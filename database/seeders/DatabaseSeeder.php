<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Banner;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Database\Seeder;

// require_once __DIR__ . '/LocationsSeeder.php';

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LocationsSeeder::class);

        User::create([
            'name'      => 'Duanda Yusuf',
            'email'     => 'admin@gmail.com',
            'role'      => 'admin',
            'contact'   => '08123456789',
            'password'  => bcrypt('password'),
        ]);
        Kategori::create([
            'name'      => 'Sparepart Original',
            'image'     => 'lorem',
            'slug'      => 'sparepart-original',
        ]);
        Kategori::create([
            'name'      => 'Sparepart Variasi',
            'image'     => 'lorem',
            'slug'      => 'sparepart-variasi',
        ]);
        Kategori::create([
            'name'      => 'Aksesoris Motor',
            'image'     => 'lorem',
            'slug'      => 'aksesoris-motor',
        ]);

        Produk::create([
            'name'          => 'As Shock Depan GL Pro Neotech MHM',
            'id_kategori'   => 1,
            'slug'          => 'as-shock-depan-gl-pro-neotech-mhm',
            'image'         => 'lorem',
            'harga'         => 450000,
            'stok'          => 100,
            'berat'         => 250,
            'desc'          => '<p>lorem</p>',
        ]);

        Produk::create([
            'name'          => 'Busi Kharisma MHM',
            'id_kategori'   => 1,
            'slug'          => 'busi-kharisma-mhm',
            'image'         => 'lorem',
            'harga'         => 20000,
            'stok'          => 100,
            'berat'         => 250,
            'desc'          => '<p>lorem</p>',
        ]);

        Produk::create([
            'name'          => 'Caliper Big Radial 4 Piston Frando',
            'id_kategori'   => 2,
            'slug'          => 'caliper-big-radial-4-piston-frando',
            'image'         => 'lorem',
            'harga'         => 1200000,
            'stok'          => 100,
            'berat'         => 250,
            'desc'          => '<p>lorem</p>',
        ]);
        Produk::create([
            'name'          => 'CVT Assy Beat TDR',
            'id_kategori'   => 2,
            'slug'          => 'cvt-assy-beat-tdr',
            'image'         => 'lorem',
            'harga'         => 1000000,
            'stok'          => 100,
            'berat'         => 250,
            'desc'          => '<p>lorem</p>',
        ]);
        // Banner::create([
        //     'keterangan'    => 'tes',
        //     'image'         => 'image'
        // ]);
    }
}
