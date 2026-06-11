<?php

namespace Database\Seeders;

use App\Models\Certificate;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ── Admin User ─────────────────────────────────────────────────────────
        User::firstOrCreate(
            ['email' => 'admin@breganza.dev'],
            [
                'name'     => 'Ian Marcus Breganza',
                'password' => Hash::make('changeme123'),
            ]
        );

        // ── Projects ───────────────────────────────────────────────────────────
        $projects = [
            [
                'title'          => 'Dipterocarp Species Classifier',
                'description'    => 'A deep-learning system for automated identification of Philippine Dipterocarp tree species from leaf imagery. Built as an undergraduate thesis, it uses a CNN trained on a custom dataset sourced from Mount Makiling\'s forest reserve, achieving high classification accuracy and leveraging Grad-CAM for explainable AI visualizations — turning field photography into a non-invasive alternative to manual tree inventory.',
                'tech_stack'     => ['Python', 'TensorFlow', 'Keras', 'CNN', 'OpenCV', 'Grad-CAM'],
                'priority_score' => 9,
                'external_link'  => null,
                'visible'        => true,
            ],
            [
                'title'          => 'ArcLight — Edge-AI Face Recognition',
                'description'    => 'A real-time face recognition system designed for resource-constrained environments. Combines YOLOv5 for fast face detection with ArcFace embeddings for high-accuracy identity verification, deployed on a Raspberry Pi. Built as a freelance engagement to bring biometric access control to settings without cloud connectivity.',
                'tech_stack'     => ['Python', 'YOLOv5', 'ArcFace', 'Raspberry Pi', 'Edge AI'],
                'priority_score' => 7,
                'external_link'  => null,
                'visible'        => true,
            ],
            [
                'title'          => 'QS ImpACT',
                'description'    => 'An award-winning educational game built in Unity where players experience the ecological and economic consequences of invasive species in Philippine forests. Designed to make environmental science tangible and emotionally resonant for a general audience.',
                'tech_stack'     => ['Unity', 'C#', 'Game Dev'],
                'priority_score' => 5,
                'external_link'  => null,
                'visible'        => true,
            ],
        ];

        foreach ($projects as $data) {
            Project::firstOrCreate(['title' => $data['title']], $data);
        }

        // ── Experience ─────────────────────────────────────────────────────────
        $experiences = [
            [
                'role'             => 'Freelance ML Engineer',
                'company'          => 'ArcLight (Independent)',
                'location'         => 'Los Baños, Laguna',
                'date_range'       => '2025',
                'responsibilities' => [
                    'Designed and implemented an edge-AI face recognition pipeline using YOLOv5 and ArcFace.',
                    'Optimized inference for deployment on Raspberry Pi hardware with limited compute.',
                    'Delivered a working biometric access control demo for a client use case.',
                ],
                'display_order' => 1,
            ],
            [
                'role'             => 'IT & Systems Development Intern',
                'company'          => 'DOST-FPRDI',
                'location'         => 'UPLB, Los Baños, Laguna',
                'date_range'       => 'Dec 2025 – Feb 2026',
                'responsibilities' => [
                    'Assisted in the development and maintenance of internal IT systems.',
                    'Contributed to digitization initiatives for forestry research data.',
                    'Collaborated with senior researchers on systems documentation and workflow improvement.',
                ],
                'display_order' => 2,
            ],
        ];

        foreach ($experiences as $data) {
            Experience::firstOrCreate(['role' => $data['role'], 'company' => $data['company']], $data);
        }

        // ── Skills ─────────────────────────────────────────────────────────────
        $skills = [
            // Languages
            ['name' => 'Python',      'category' => 'Languages',          'display_order' => 1],
            ['name' => 'PHP',         'category' => 'Languages',          'display_order' => 2],
            ['name' => 'JavaScript',  'category' => 'Languages',          'display_order' => 3],
            ['name' => 'SQL',         'category' => 'Languages',          'display_order' => 4],
            ['name' => 'C#',          'category' => 'Languages',          'display_order' => 5],
            ['name' => 'HTML/CSS',    'category' => 'Languages',          'display_order' => 6],
            // ML & AI
            ['name' => 'TensorFlow',  'category' => 'ML & AI',            'display_order' => 1],
            ['name' => 'Keras',       'category' => 'ML & AI',            'display_order' => 2],
            ['name' => 'PyTorch',     'category' => 'ML & AI',            'display_order' => 3],
            ['name' => 'scikit-learn','category' => 'ML & AI',            'display_order' => 4],
            ['name' => 'OpenCV',      'category' => 'ML & AI',            'display_order' => 5],
            ['name' => 'YOLOv5',      'category' => 'ML & AI',            'display_order' => 6],
            ['name' => 'ArcFace',     'category' => 'ML & AI',            'display_order' => 7],
            // Web & Backend
            ['name' => 'Laravel',     'category' => 'Web & Backend',      'display_order' => 1],
            ['name' => 'FastAPI',     'category' => 'Web & Backend',      'display_order' => 2],
            ['name' => 'REST APIs',   'category' => 'Web & Backend',      'display_order' => 3],
            ['name' => 'AJAX',        'category' => 'Web & Backend',      'display_order' => 4],
            // Tools & Platforms
            ['name' => 'Git',         'category' => 'Tools & Platforms',  'display_order' => 1],
            ['name' => 'VS Code',     'category' => 'Tools & Platforms',  'display_order' => 2],
            ['name' => 'Linux',       'category' => 'Tools & Platforms',  'display_order' => 3],
            ['name' => 'Raspberry Pi','category' => 'Tools & Platforms',  'display_order' => 4],
            ['name' => 'MySQL',       'category' => 'Tools & Platforms',  'display_order' => 5],
            ['name' => 'Ollama',      'category' => 'Tools & Platforms',  'display_order' => 6],
        ];

        foreach ($skills as $data) {
            Skill::firstOrCreate(['name' => $data['name']], $data);
        }

        // Certificates intentionally empty — frontend will show placeholder
    }
}
