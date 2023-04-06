<?php

namespace Database\Seeders;

use App\Models\HomeSection;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HomeSectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = [
            [
                'title' => 'Section 1',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a tellus massa. Duis vitae pharetra sapien. Aliquam erat volutpat. Nunc euismod, nisi ut consequat.',
                'button' => 'Learn More',
                'section_name' => 'section_1',
            ],
            [
                'title' => 'Section 2',
                'text' => 'Suspendisse potenti. Pellentesque ac malesuada est. Quisque interdum purus eget facilisis aliquam. Ut finibus dolor id ante vestibulum, at laoreet nisl.',
                'button' => 'Get Started',
                'section_name' => 'section_2',
            ],
            [
                'title' => 'Section 3',
                'text' => 'Nullam tincidunt, ipsum ut congue dapibus, augue tellus consequat ex, sit amet vehicula lorem nunc et ante. Nullam sodales luctus convallis. ',
                'button' => 'View More',
                'section_name' => 'section_3',
            ]
        ];

        foreach ($sections as $section) {
            HomeSection::create($section);
        }
    }
    }

