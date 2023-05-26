<?php

namespace Database\Factories;

use App\Models\AgeRestriction;
use App\Models\Author;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class GameFactory extends Factory
{
    public function definition()
    {
        $categoryIds = Categorie::pluck('id')->toArray(); // Получаем массив всех существующих ID категорий
        $authorIds = Author::pluck('id')->toArray(); // Получаем массив всех существующих ID авторов
        $ageRestrictionIds = AgeRestriction::pluck('id')->toArray(); // Получаем массив всех существующих ID авторов

        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'price' => $this->faker->numberBetween(5000, 20100),
            'stock_quantity' => $this->faker->numberBetween(2000, 10000),
            'category_id' => $this->faker->randomElement($categoryIds), // Выбираем случайный ID категории из массива
            'author_id' => $this->faker->randomElement($authorIds), // Выбираем случайный ID авторов из массива
            'age_restriction_id' => $this->faker->randomElement($ageRestrictionIds), // Выбираем случайный ID возрастных ограничений из массива
        ];
    }
}
