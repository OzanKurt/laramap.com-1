<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createCodeReview();
        $this->createEloquent();
        $this->createEnvoyer();
        $this->createForge();
        $this->createGeneral();
        $this->createLaravel();
        $this->createLumen();
        $this->createMix();
        $this->createOffTopic();
        $this->createNova();
        $this->createSpark();
        $this->createTesting();
        $this->createTips();
    }

    public function createOffTopic()
    {
        $category = \App\Models\ThreadCategory::create([
            'title' => 'Off Topic',
            'description' => 'Discussions besides development',
        ]);
    }

    public function createLaravel()
    {
        $category = \App\Models\ThreadCategory::create([
            'title' => 'Laravel',
            'description' => 'Laravel related discussions',
        ]);
    }

    public function createLumen()
    {
        $category = \App\Models\ThreadCategory::create([
            'title' => 'Lumen',
            'description' => 'Lumen related discussions',
        ]);
    }

    public function createMix()
    {
        $category = \App\Models\ThreadCategory::create([
            'title' => 'Mix',
            'description' => 'Mix related discussions',
        ]);
    }

    public function createTesting()
    {
        $category = \App\Models\ThreadCategory::create([
            'title' => 'Testing',
            'description' => 'Testing related discussions',
        ]);
    }

    public function createForge()
    {
        $category = \App\Models\ThreadCategory::create([
            'title' => 'Forge',
            'description' => 'Forge related discussions',
        ]);
    }

    public function createGeneral()
    {
        $category = \App\Models\ThreadCategory::create([
            'title' => 'General',
            'description' => 'General related discussions',
        ]);
    }

    public function createEnvoyer()
    {
        $category = \App\Models\ThreadCategory::create([
            'title' => 'Envoyer',
            'description' => 'Envoyer related discussions',
        ]);
    }

    public function createSpark()
    {
        $category = \App\Models\ThreadCategory::create([
            'title' => 'Spark',
            'description' => 'Spark related discussions',
        ]);
    }

    public function createNova()
    {
        $category = \App\Models\ThreadCategory::create([
            'title' => 'Nova',
            'description' => 'Nova related discussions',
        ]);
    }

    public function createTips()
    {
        $category = \App\Models\ThreadCategory::create([
            'title' => 'Tips',
            'description' => 'Tip related discussions',
        ]);
    }

    public function createEloquent()
    {
        $category = \App\Models\ThreadCategory::create([
            'title' => 'Eloquent',
            'description' => 'Eloquent related discussions',
        ]);
    }

    public function createCodeReview()
    {
        $category = \App\Models\ThreadCategory::create([
            'title' => 'Code Review',
            'description' => 'Code Review related discussions',
        ]);
    }
}
