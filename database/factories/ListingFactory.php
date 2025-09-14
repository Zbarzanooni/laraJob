<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle(), // عنوان شغلی
            'description' => $this->faker->paragraph(), // توضیحات
            'salary' => $this->faker->numberBetween(3000000, 15000000), // حقوق
            'rolse' => $this->faker->randomElement(['Developer', 'Designer', 'Manager']), // نقش
            'address' => $this->faker->address(), // آدرس
            'deadline' => $this->faker->dateTimeBetween('now', '+2 months'), // مهلت
            'image' => 'jobs/default.png', // می‌تونی مسیر پیش‌فرض بذاری
            'job_type' => $this->faker->randomElement(['fullTime', 'partTime', 'telecommuting']), // نوع شغل
        ];
    }
}


