<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require(app_path().'/pms.php');  // The file containing the pms array is in the app directory. 
                                 // app_path() give us the path the the app directory

// To do: Display search form
Route::get('/', function()
{
  return view('greetingForm');
});


// To do: Perform search and display results
Route::post('results', function()
{
  //error message for query (null if  valid)
  $error = NULL;
  // Fetch form data
  $name = request("name");
  $year = request("year");
  $state = request("state");
  $query = htmlspecialchars($name.' '.$year.' '.$state);

  // Check if all fields are empty
  if (empty($name) && empty($year) && empty($state)) {
    $error =  "At least one field must contain a value.";
  }
  // If years is input and check if it is an integer
  else if (!empty($year) && !is_numeric($year)){
    $error = "Year must be a number";
  }

  if ($error != NULL){
    return view('greetingForm')->with('error', $error);
  }
  else {
    // call search() to perform search
    $pms = search($name, $year, $state);
    // call view to display search result
    return view('results')->with('pms', $pms)->with('query', $query);
  }
});

/* Functions for PM database example. */

/* Search sample data for $name or $year or $state from form. */
function search($name, $year, $state) {
  $pms = getPms();

  // Filter $pms by $name
  if (!empty($name)) {
    $results = array();
    foreach ($pms as $pm) {
      if (stripos($pm['name'], $name) !== FALSE) {
        $results[] = $pm;
      }
    }
    $pms = $results;
  }

  // Filter $pms by $year
  if (!empty($year)) {
    $results = array();
    foreach ($pms as $pm) {
      if (strpos($pm['from'], $year) !== FALSE || 
          strpos($pm['to'], $year) !== FALSE) {
        $results[] = $pm;
      }
    }
    $pms = $results;
  }

  // Filter $pms by $state
  if (!empty($state)) {
    $results = array();
    foreach ($pms as $pm) {
      if (stripos($pm['state'], $state) !== FALSE) {
        $results[] = $pm;
      }
    }
    $pms = $results;
  }
  return $pms;
}