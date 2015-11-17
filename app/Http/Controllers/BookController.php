<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Magyarjeti\Loripsum\Client;
use Magyarjeti\Loripsum\Http\CurlAdapter;
use Debugbar;
use Random;
use Lipsum;

class BookController extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    /**
    * Responds to requests to GET /practice - Home
    */
    public function getPractice() {

      //$data = Array('foo' => 'bar');
      //Debugbar::info($data);
      //Debugbar::error('Error!');
      //Debugbar::warning('Watch out...');
      //Debugbar::addMessage('Another message','mymsg');

      // Generate some random bytes
      //$random = new Random();
      //return $random->getRandomString(16);

      // Lorem-lipsum
      $xml = simplexml_load_file('http://www.lipsum.com/feed/xml?amount=3&what=paras&start=0')->lipsum;
      //$xml2 = simplexml_load_string($xml);
      print_r($xml);
      echo "";
      return 'Practice within BookController';
      /*

      function random_lipsum($amount = 1, $what = 'paras', $start = 0) {
        return simplexml_load_file("http://www.lipsum.com/feed/xml?amount=$amount&what=$what&start=$start")->lipsum;
      }
        // The URL works without the return
        //return simplexml_load_file("http://www.lipsum.com/feed/xml?amount=$amount&what=$what&start=$start")->lipsum;
        //$x="http://www.lipsum.com/feed/xml?amount=$amount&what=$what&start=$start";
        //return $x;
      }

      //echo strval($client);
      */
    }

    /**
    * Responds to requests to GET /books
    */
    public function getIndex() {
        //return 'List all the books';
        return view('books.index');
    }

    /**
     * Responds to requests to GET /books/show/{id}
     */
    public function getShow($title=null) {
        return view('books.show')->with('title',$title);
    }

    /**
     * Responds to requests to GET /books/create
     */
    public function getCreate() {
      //return 'Form to create books';
      /**
      $view = '<form method="POST" action="/books/create">';
      $view .= csrf_field();
      $view .= '<input type="text" name="title">';
      $view .='<input type="submit">';
      $view .='<form>';
      return $view;
      */
      return view('books.create');
    }
    
    /**
     * Responds to requests to POST /books/create
     */
    public function postCreate() {
      return 'Process the creation of a new book: '.$_POST['title'];
    }
}
