<?php

namespace Database\Factories;
// use App\Models\Task as Task;


use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $category = $this->faker->randomElement([
            'wait', 'running', 'pendency', 'done', 'other'

        ]);

        $maxOrder =  DB::table('tasks')
                        ->where('category',$category)
                        ->max('order');
        
        $order = ($maxOrder + 1);

        return [
            "category" => $category,
            "time" => $this->faker->randomElement([
                '1h', '2h', '3h', '4h', '5h', '6h', '7h', '8h', '9h'
            ]),
            "notifications" => $this->faker->numberBetween(1, 9),
            "tag" => $this->faker->randomElement([
                'DESENVOLVIMENTO', 'UI|UX', 'FINANCEIRO'
            ]),
            "code" => '#' . $this->faker->numberBetween(9000, 9999),

            "title" => $this->faker->realText($maxNbChars = 20, $indexSize = 2),
            "project" => $this->faker->realText($maxNbChars = 20, $indexSize = 2),
            "expected_date" => $this->faker->dateTimeBetween('now', '+30 days'),
            "description" => $this->faker->realText($maxNbChars = 100, $indexSize = 2),
            'expected' => "00:30",
            'balance' => "+00:10",
            'status' => $this->faker->randomElement([
                'in-time','alert','late'
            ]),
            'team' => $this->faker->randomElement([
                '["AS"]','["PH"]','["WO"]', '["AS", "PH"]', '["PH", "WO"]', '["AS","WO"]'
            ]),
            'order' => $order
        ];
    }
}
