<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BusinessSettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $businessValue = array();
        array_push($businessValue, [
            "heading" => "A Creative Architecture Agency For Your DREAM HOME",
            "description" => "Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet Stet no et lorem dolor et diam, amet duo ut dolore vero eos. No stet est diam rebum amet diam ipsum. Clita clita labore, dolor duo nonumy clita sit at, sed sit sanctus dolor eos.",
            "experience" => 2
        ]);

        return [
            "businessName" => "aboutUs",
            "businessValue" => json_encode($businessValue)
        ];
    }
}
