<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);
        $this->call(DisciplinaSeeder::class);
        $this->call(PrecioSeeder::class);
        //$this->call(SerieSeeder::class);
        $this->call(TransportistaSeeder::class);
        $this->call(Category_productSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(PlatformSeeder::class);
        $this->call(FilmmakerSeeder::class);
        //$this->call(VideoSeeder::class);
        $this->call(Vehiculo_typeSeeder::class);
        //$this->call(VehiculoSeeder::class);
        $this->call(InvitadoSeeder::class);
        $this->call(SocioSeeder::class);
        $this->call(MarcaSeeder::class);
        
           
        $this->call(PedidoSeeder::class);        
     
        
        
        



    }
}
