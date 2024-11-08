<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tags = [
            'Technology',
            'Programming',
            'Web Development',
            'Artificial Intelligence',
            'Machine Learning',
            'Data Science',
            'Cybersecurity',
            'Cloud Computing',
            'DevOps',
            'Frontend Development',
            'Backend Development',
            'Full Stack Development',
            'Mobile Development',
            'Game Development',
            'Design',
            'UX/UI Design',
            'Digital Marketing',
            'SEO',
            'Social Media Marketing',
            'Content Marketing',
            'E-commerce',
            'Business',
            'Finance',
            'Marketing',
            'Health',
            'Fitness',
            'Lifestyle',
            'Travel',
            'Food',
            'Music',
            'Movies',
            'Books',
            'Gaming',
            'Sports',
            'News',
            'Politics',
            'Environment',
            'Science',
            'History',
            'Philosophy',
            'Religion',
            'Art',
            'Literature',
            'Language',
        ];

        return [
            'title' => $this->faker->randomElement($tags),
        ];
    }
}
