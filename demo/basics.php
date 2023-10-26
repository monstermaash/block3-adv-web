<style>
  p.even {
    background-color: lightblue;
  }

  p.odd {
    background-color: lightgreen;
  }
</style>

<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis voluptatem fugiat qui dignissimos libero. Labore ipsam veniam aut iure ex nihil, ad magni consequuntur eligendi nemo consequatur, id architecto sunt.</p>

<?php

$sampleArray = array(1, 2, 3, "red", "yellow", "blue");

for ($i = 0; $i < count($sampleArray); $i++) {
  $class = ($i + 1) % 2 == 0 ? "odd" : "even";
  // echo $class;
  echo "<p class='$class'>index $i contains: $sampleArray[$i]</p>";
}

// $name = "batman";
// echo $name[0];
