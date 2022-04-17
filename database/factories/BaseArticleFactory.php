<?php

namespace Database\Factories;

use App\Http\Tools\FileManager;
use App\Http\Tools\Formatter;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BaseArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $formater = new Formatter();
        $fileManager = new FileManager();

        $fileManager->imagesDirectory = 'public/images/base_articles';
        return [
            'article_id' => $this->faker->uuid(),
            'article_blob' => $this->faker->image($fileManager->imagesDirectory,640,480,[]),
            //'article_blob' => $fileManager->storeImage($request->file('article_blob')),
            'specs_json' => (isset($request->specs_json) && $request->specs_json != null) ? $request->specs_json : '{}',
            'sizes_json' => (isset($request->sizes_json) && $request->sizes_json != null) ? $request->sizes_json : '{}',
            'price' => DB::raw('CAST(' . $request->price . ' as decimal(16,2))'),
            'updated_at' => $formater->getTime('0 days', 'America/Bogota', 'Y-m-d H:i:s'),

            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }
}
