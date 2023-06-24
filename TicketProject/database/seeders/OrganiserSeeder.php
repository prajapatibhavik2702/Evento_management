<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Organiser;
use phpDocumentor\Reflection\Types\Nullable;

class OrganiserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organiser=[
            'name'=>'jay',
            'email'=>'jay@gmail.com',
            'password'=>'Nullable()',
            'number'=>'8974563214',
            'description'=>'yes',
            'status'=>'inactive',
        ];
        Organiser::create($organiser);
    }
}
