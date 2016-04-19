<?php 

require "Model/model.php";

// Display list of all poems of the website
function index() {
    $poems = getPoems();
    require "View/viewIndex.php";
}

// Display details about a poem
function poem($idPoem) {
    $poem     = getaPoem($idPoem);
    $comments = getComments($idPoem);
    require "View/viewPoem.php";
}

// Display an error 
function error($errorMessage) {
    require "View/viewError.php";
}
