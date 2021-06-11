<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\UserValoration;
use Illuminate\Database\Eloquent\Factories\Factory;

class ValorationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $valoration = UserValoration::create([
            'comments' => $this->faker->text(),
            'preliminaryChecks' => $this->faker->randomDigit(1,10),
            'installationVehicle' => $this->faker->randomDigit(1,10),
            'incorporationCirculation' => $this->faker->randomDigit(1,10),
            'normalProgression' => $this->faker->randomDigit(1,10),
            'sideShift' => $this->faker->randomDigit(1,10),
            'overTaking' => $this->faker->randomDigit(1,10),
            'intersections' => $this->faker->randomDigit(1,10),
            'changeDirection' => $this->faker->randomDigit(1,10),
            'stops' => $this->faker->randomDigit(1,10),
            'parking' => $this->faker->randomDigit(1,10),
            'obedienceSigns' => $this->faker->randomDigit(1,10),
            'lights' => $this->faker->randomDigit(1,10),
            'controlsOperation' => $this->faker->randomDigit(1,10),
            'otherControls' => $this->faker->randomDigit(1,10),
            'safeDriving' => $this->faker->randomDigit(1,10),
            'studentId' => UserValoration::all()->random()->studentId ,
            'teacherId' =>UserValoration::all()->random()->teacherId
        ]);
    

      
        return [
            $valoration
        ];
    }
}
