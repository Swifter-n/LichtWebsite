<?php
$apps = mysqli_query($db, "SELECT * FROM apps ORDER BY id DESC");
$game = mysqli_query($db, "SELECT * FROM games ORDER BY id DESC");
$web = mysqli_query($db, "SELECT * FROM website ORDER BY id DESC");

?>
<div id="pilih">
    <div class="container">
    <div class="row">
    <div class="col-md-12">
    <h3 class="text-center">Our Portofolio</h3>
    <div id="myBtnContainer">
  <button class="btns active" onclick="filterSelection('all')"> Show all</button>
  <button class="btns" onclick="filterSelection('apps')"> Application</button>
  <button class="btns" onclick="filterSelection('games')"> Games</button>
  <button class="btns" onclick="filterSelection('web')"> Web-Based</button>
</div>

<!-- Portfolio Gallery Grid -->
<div class="row">
<?php if(mysqli_num_rows($apps)){?>
  <?php while($app = mysqli_fetch_assoc($apps)){?>
  <div class="column apps">
    <div class="content">
      <div class="card" style="width: 18rem;">
  <img src="img/<?=$app['image'];?>" class="card-img-top img-responsive" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?=$app['title'];?></h5>
    <p class="card-text"><?=$app['description']?></p>
    <a href="<?=$app['link'];?>" class="btn btn-warning btn-lg btn-block">Open</a>
  </div>
</div>
    </div>
  </div>
  <?php }?>
  <?php }?>

  <?php if(mysqli_num_rows($game)){?>
  <?php while($games = mysqli_fetch_assoc($game)){?>
  <div class="column games">
    <div class="content">
            <div class="card" style="width: 18rem;">
          <img src="img/<?=$games['image'];?>" class="card-img-top img-responsive" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?=$games['title'];?></h5>
            <p class="card-text"><?=$games['description']?></p>
            <a href="<?=$games['link'];?>" class="btn btn-warning btn-lg btn-block">Open</a>
          </div>
    </div>
  </div>
  </div>
  <?php }?>
  <?php }?>
  
  <?php if(mysqli_num_rows($web)){?>
  <?php while($webs = mysqli_fetch_assoc($web)){?>
  <div class="column web">
    <div class="content">
  <div class="card" style="width: 18rem;">
  <img src="img/<?=$webs['image'];?>" class="card-img-top img-responsive" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?=$webs['title'];?></h5>
    <p class="card-text"><?=$webs['description']?></p>
    <a href="<?=$webs['link'];?>" class="btn btn-warning btn-lg btn-block">Open</a>
  </div>
    </div>
  </div>
  </div>
  <?php }?>
  <?php }?>

<!-- END GRID -->
</div>
<script type="text/javascript">
  filterSelection("all") // Execute the function and show all columns
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("column");
  if (c == "all") c = "";
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

// Show filtered elements
function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

// Hide elements that are not selected
function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btns");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>
    </div>
    </div>
    </div>
    </div>