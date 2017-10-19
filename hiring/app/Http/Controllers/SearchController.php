<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{

  public function search(Request $request)
  {
    //set UserAgent
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $userData = null;

    if ($request->has('search')) {
      $user = $request->get('search');

      if ($user == "") {
        return view('welcome', ['userData' => $userData])->with('emptyMsg', 'Please, enter a user to search!');
      }

      $url="https://api.github.com/users/$user";
      // create curl resource
      $ch = curl_init();

      // set url
      curl_setopt($ch, CURLOPT_URL, $url);

      //return the transfer as a string
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      //Github API needs a user Agent
      curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);

      // $output contains the output string
      $output = curl_exec($ch);

      // close curl resource to free up system resources
      curl_close($ch);
      $userData = json_decode($output, false);

      if (isset($userData->message)) {
        return view('welcome', ['userData' => $userData])->with('notFoundMsg', "User $user not found!");
      }

      }

      return view('welcome', ['userData' => $userData]);


  }
}
