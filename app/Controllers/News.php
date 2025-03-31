<?php

namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class News extends BaseController
{
    // Display the list of news items
    public function index()
    {
        $model = model(NewsModel::class);

        $data = [
            'news_list' => $model->getNews(),
            'title'     => 'News Archive',
        ];

        return view('templates/header', $data)
            . view('news/index')
            . view('templates/footer');
    }

    // Display a specific news item
    public function show(?string $slug = null)
    {
        $model = model(NewsModel::class);

        // If no slug is provided, show a 404 page
        if ($slug === null) {
            throw new PageNotFoundException('Cannot find the news item.');
        }

        // Get the news item from the model
        $data['news'] = $model->getNews($slug);

        // If the news item is not found, throw a 404 exception
        if ($data['news'] === null) {
            throw new PageNotFoundException('Cannot find the news item: ' . $slug);
        }

        // Set the page title based on the news title
        $data['title'] = $data['news']['title'];

        // Return the view for a specific news item
        return view('templates/header', $data)
            . view('news/view')
            . view('templates/footer');
    }

    // Display the form to create a new news item
    public function new()
    {
        helper('form');

        return view('templates/header', ['title' => 'Create a news item'])
            . view('news/create')
            . view('templates/footer');
    }

    // Handle the form submission and create a new news item
    public function create() // Changed from store to create to match the route
    {
        helper('form');

        // Validate the form data
        if (! $this->validate([
            'title' => 'required|max_length[255]|min_length[3]',
            'body'  => 'required|max_length[5000]|min_length[10]',
        ])) {
            // If validation fails, show the form again with errors
            return redirect()->to('/news/new')->withInput()->with('error', \Config\Services::validation()->listErrors());
        }

        // Get the form data and store it in the database
        $model = model(NewsModel::class);
        $model->save([
            'title' => $this->request->getPost('title'),
            'body'  => $this->request->getPost('body'),
        ]);

        // Redirect to the news list page with a success message
        return redirect()->to('/news')->with('success', 'News item created successfully!');
    }
}