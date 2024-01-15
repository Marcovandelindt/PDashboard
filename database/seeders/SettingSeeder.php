<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Setting::where('name', 'spotify_access_token')->first()) {
            $setting = new Setting();
            $setting->name = 'spotify_access_token';
            $setting->value = '';

            $setting->save();
        }

        if (!Setting::where('name', 'spotify_refresh_token')->first()) {
            $setting = new Setting();
            $setting->name = 'spotify_refresh_token';
            $setting->value = '';

            $setting->save();
        }
    }
}
