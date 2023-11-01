<?php

//create a function that checks if a word is a palindrome, usiing only basics and continue and break, REMEMBER NO STRING FUNCTIONS!!
//palindrome: a word, phrase, or sequence that reads the same backward as forward, e.g., madam or nurses run.
// function isPalindrome($word)
// {
//   $len = strlen($word);
//   for ($i = 0; $i < $len / 2; $i++) {
//     if ($word[$i] != $word[$len - $i - 1]) {
//       return false;
//     }
//   }
//   return true;
// }

// echo isPalindrome("laval") ? "true" : "false";
// echo isPalindrome("racecar") ? "true" : "false";
// echo isPalindrome("mister") ? "true" : "false";
// echo isPalindrome("tacocat") ? "true" : "false";

?>




<?php

//here's another way
$phraseToTest = "taco   ..cat.";

// you have 2 variable to keep track of phrase forwards and backwards
$forwards = "";
$backwards = "";

// populate my 2 variables - use a loop
//check for spaces
//ignore/skip spaces
for ($i = 0; $i < strlen($phraseToTest); $i++) {
  // echo $phraseToTest[$i];
  if ($phraseToTest[$i] == " " || $phraseToTest[$i] == ".") {
    // echo "skip";
  } else {
    $forwards .= $phraseToTest[$i];
  }
}

echo $forwards;

for ($i = strlen($phraseToTest) - 1; $i >= 0; $i--) {
  if (!($phraseToTest[$i] == " " || $phraseToTest[$i] == ".")) {
    $backwards .= $phraseToTest[$i];
  }
}
echo $backwards;

//compare the 2 variables
if ($forwards == $backwards) {
  echo "is a palindrome!";
} else {
  echo "NOT a palindrome.";
}

?>

<?php

// compare from the front AND from the back simultaneously
// keep track of my front index
// keep track of my back index SEPARATELY
// $iFront = 0;
$backIndex = strlen($phraseToTest) - 1;

for ($i = 0; $i < strlen($phraseToTest); $i++) {
  // while i have a space or a period, skip to the next index
  while ($phraseToTest[$i] == " " || $phraseToTest[$i] == ".") {
    $i++;
  }
  while ($phraseToTest[$backIndex] == " " || $phraseToTest[$backIndex] == ".") {
    $backIndex--;
  }
  //check if front character and back charactter are the same
  if ($phraseToTest[$i] == $phraseToTest[$backIndex]) {
    echo "matching";
    break;
  }
}

// if ( !(character == " " || character == "." )) {
//   // add to my phrase
// } 
// forwards = "";
// for (i = 0; i < myPhrase.length; i++) {
//   if (!(myPhrase[i] == " " || myPhrase[i] == ".")) {
//     // add to my phrase
//     forwards += myPhrase[i];
//   }
// }


// if (character != " " || character != "." ) {
//   // add to my phrase
// } 

// NOT a (SPACE OR PERIOD)
// NOT a SPACE OR NOT A PERIOD





?>