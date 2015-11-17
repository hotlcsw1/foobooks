<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

Class PracticeController extends Controller {
    //get results using search criteria
    function getRetrieveBookUsingCriteriaWithEloquent() {

        $book = new \App\Book();
        $results = $book->where('published', '<','1950')->get();
        foreach($results as $result) {
            echo $result->title.'<br>';
        }

    }

    // get first value from results
    function getRetrieveFirstBookUsingCriteriaWithEloquent() {

        $book = new \App\Book();
        $results = $book->where('published', '<','1950')->first();
        echo $results->title.'<br>';
    }

    // update book
    function getUpdateBookWithEloquent() {

        $book = new \App\Book();
        $update_book = $book->find(1); // finding it by Book ID

        $update_book->title='Green Eggs and Ham';
        $update_book->save();
        return 'getUpdateBookWithEloquent';
    }

    // delete book
    function getDeleteBookWithEloquent() {

        $book = new \App\Book();
        $delete_book = $book->find(4); // finding it by Book ID

        $delete_book-> delete();
        return 'getDeleteBookWithEloquent';
    }

    // create book
    function getCreateBookWithEloquent() {

        $book = new \App\Book();
        $book->title = 'Harry Potter';
        $book->author = 'J.K. Rowling';
        return 'getCreateBookWithEloquent';
    }

    function getBookWithEloquent() {
        $book = new \App\Book();
        $all_books = $book->all();

        echo $book->all();
        return 'getBookWithEloquent';
    }

    function getBooksWithQueryBuilder() {

        $books = \DB::table('books')->get();
        foreach($books as $book) {
            echo $book->title.'<br>';
        }
        return 'getBooksWithQueryBuilder';
    }

    // Use the QueryBuilder to insert a new row into the books table
    // i.e. create a new book
    function getCreateNewBookWithQueryBuilder() {

        \DB::table('books')->insert([
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'The Great Gatsby',
            'author' => 'F. Scott Fitzgerald',
            'published' => 1925,
            'cover' => 'http://img2.imagesbn.com/p/9780743273565_p0_v4_s114x166.JPG',
            'purchase_link' => 'http://www.barnesandnoble.com/w/the-great-gatsby-francis-scott-fitzgerald/1116668135?ean=9780743273565',
        ]);

        return 'Entered new book';
    }

}
