<?php

namespace App\Controllers;

use App\Models\NewsModel;

class Apis extends BaseController
{
    public function wikipedia()
    {
        // Set user agent as required by Wikipedia API
        ini_set('user_agent', 'University of Wolverhampton');

        $website = "www.bdtheque.com";  // The website you want to search for on Wikipedia

        // URL for the Wikipedia API (searching for pages linking to www.bdtheque.com)
        $url = "http://en.wikipedia.org/w/api.php?"
            . "action=query&"
            . "list=exturlusage&"
            . "eulimit=500&"
            . "format=xml&"
            . "euquery=" . $website;

        // Get data from the URL and store in an object
        $data['links'] = simplexml_load_file($url);
        $data['title'] = "Wikipedia API";

        // Load the views and pass data
        echo view('templates/header', $data);
        echo view('apis/wikipedia', $data);  // We will create this view next
        echo view('templates/footer', $data);
    }
}
