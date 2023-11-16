<h1>Dashboard</h1>
<!-- displaying how many cats do i have in my controller -->


<a href="index.php?controller=logout">Logout</a>
<section>
  <!-- <article>Dog - 2</article>
  <article>Cat - 1</article>
  <article>Mouse - 3</article> -->

  <?php
  include_once("controllers/controller-cat.php");
  foreach ($cats as $cat) {
    echo "<p>" . $cat->name() . "</p>";
  }

  ?>
</section>