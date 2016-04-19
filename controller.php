<?php 

require "model.php";

// Display list of all poems of the website
function index() {
    $poems = getPoems();
    require "viewIndex.php";
}

// Display details about a poem
function poem($idPoem) {
    $poem     = getaPoem($idPoem);
    $comments = getComments($idPoem);
    require "viewPoem.php";
}

// Display an error 
function error($errorMessage) {
    require "viewError";
}
