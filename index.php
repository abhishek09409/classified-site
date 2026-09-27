<?php 
include "header.php";
include "includes/config.php"; 

?>

<?php

$cats = $conn->query("SELECT * FROM categories WHERE status='active'");
$states = $conn->query("SELECT * FROM states WHERE status='active'");

?>
<section class="hero-section">
  <div class="hero-overlay"></div>

  <div class="container hero-content">
    <div>
      <p class="hero-kicker">Inscallup · India</p>
      <h1>
        The true excitement begins here
        <span>Meet our stars.</span>
      </h1>
      <p class="hero-lead">Explore the board, pick a city, and open the listings that match what you came for.</p>
    </div>
  </div>
</section>

<section class="search-section">
  <div class="container">

<form id="filterForm">

    <h5>Find escorts and adult services</h5>
    <p class="search-kicker">Choose a category, then a state, then a city.</p>

<div class="row g-3">

<div class="col-md-3">
<select name="category" class="form-select" aria-label="Category">
<option value="">Category</option>
<?php while($cat=$cats->fetch_assoc()){ ?>
<option value="<?php echo htmlspecialchars($cat['slug'], ENT_QUOTES); ?>" <?php if(isset($category) && $category==$cat['slug']) echo 'selected'; ?>>
<?php echo htmlspecialchars($cat['name']); ?>
</option>
<?php } ?>
</select>
</div>

<div class="col-md-3">
<select id="state" class="form-select" aria-label="State">
<option value="">State</option>
<?php while($st=$states->fetch_assoc()){ ?>
<option value="<?php echo htmlspecialchars($st['id'], ENT_QUOTES); ?>" <?php if(isset($state) && $state==$st['id']) echo 'selected'; ?>>
<?php echo htmlspecialchars($st['name']); ?>
</option>
<?php } ?>
</select>
</div>

<div class="col-md-3">
<select name="city" id="city" class="form-select" aria-label="City">
<option value="">City</option>
<?php if(!empty($state)){ while($c=$cities->fetch_assoc()){ ?>
<option value="<?php echo htmlspecialchars($c['slug'], ENT_QUOTES); ?>" <?php if(isset($city) && $city==$c['slug']) echo 'selected'; ?>>
<?php echo htmlspecialchars($c['name']); ?>
</option>
<?php }} ?>
</select>
</div>

<div class="col-md-3">
<button class="btn btn-pink w-100" type="submit">Search</button>
</div>

</div>
<p class="search-hint" id="searchHint"></p>

</form>

  </div>
</section>

<section class="category-detail">
  <div class="container">

    <div class="section-head">
      <h5>Explore categories</h5>
      <p>Four boards, each with the cities people open first.</p>
    </div>

    <div class="row">

      <div class="col-md-6 col-xl-3 mb-4">
        <div class="cat-box">
          <img src="/image/callgirls.png" alt="Call girls">

          <div class="cat-title">Call Girls</div>

          <p class="cat-desc">
            To tempt your desire, our Escorts classified ads provide you the charming lady of the evening.
          </p>

          <div class="city-list">
            <a href="/callgirls/bangalore">Bangalore <span>Call Girls Service</span></a>
            <a href="/callgirls/delhi">Delhi <span>Call Girls Service</span></a>
            <a href="/callgirls/lucknow">Lucknow <span>Call Girls Service</span></a>
            <a href="/callgirls/mumbai">Mumbai <span>Call Girls Service</span></a>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-xl-3 mb-4">
        <div class="cat-box">
          <img src="/image/massage.png" alt="Massage">

          <div class="cat-title">Massage</div>

          <p class="cat-desc">
            A gentle massage on full body will release your stress and refresh your mind.
          </p>

          <div class="city-list">
            <a href="/massage/bangalore">Bangalore <span>Massage Service</span></a>
            <a href="/massage/delhi">Delhi <span>Massage Service</span></a>
            <a href="/massage/lucknow">Lucknow <span>Massage Service</span></a>
            <a href="/massage/mumbai">Mumbai <span>Massage Service</span></a>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-xl-3 mb-4">
        <div class="cat-box">
          <img src="/image/maleescorts.png" alt="Male escorts">

          <div class="cat-title">Male Escorts</div>

          <p class="cat-desc">
            Choosing a hot male escort is not easy, but we provide best services.
          </p>

          <div class="city-list">
            <a href="/male-escorts/bangalore">Bangalore <span>Male Escorts Service</span></a>
            <a href="/male-escorts/delhi">Delhi <span>Male Escorts Service</span></a>
            <a href="/male-escorts/lucknow">Lucknow <span>Male Escorts Service</span></a>
            <a href="/male-escorts/mumbai">Mumbai <span>Male Escorts Service</span></a>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-xl-3 mb-4">
        <div class="cat-box">
          <img src="/image/escorts.png" alt="Escorts">

          <div class="cat-title">Escorts</div>

          <p class="cat-desc">
            Choosing a hot female escort is not easy, but we provide best services.
          </p>

          <div class="city-list">
            <a href="/escorts/bangalore">Bangalore <span>Escorts Service</span></a>
            <a href="/escorts/delhi">Delhi <span>Escorts Service</span></a>
            <a href="/escorts/lucknow">Lucknow <span>Escorts Service</span></a>
            <a href="/escorts/mumbai">Mumbai <span>Escorts Service</span></a>
          </div>
        </div>
      </div>

    </div>

  </div>
</section>

<section class="city-tags">
  <div class="container">

    <h6 class="mb-3">Top cities</h6>

    <div class="tags-wrapper">

<?php
$cities = $conn->query("SELECT * FROM cities ORDER BY name ASC LIMIT 25");

while($city = $cities->fetch_assoc()){
?>
<a href="/callgirls/<?php echo urlencode($city['slug']); ?>" class="tag red">
  <?php echo htmlspecialchars($city['name']); ?>
</a>

<?php } ?>

    </div>

  </div>
</section>

<section class="state-tags">
  <div class="container">

    <h6 class="mb-4">Select state</h6>

    <div class="tags-wrapper">

<?php
$states = $conn->query("SELECT * FROM states ORDER BY name ASC");

while($state = $states->fetch_assoc()){
?>

<a href="/callgirls/<?php echo urlencode($state['slug']); ?>" class="tag gray">
  <?php echo htmlspecialchars($state['name']); ?>
</a>
<?php } ?>

    </div>

  </div>
</section>

<script>
document.getElementById("state").addEventListener("change", function(){

    let state_id = this.value;

    fetch("/get-cities.php?state_id=" + state_id)
    .then(res => res.text())
    .then(data => {
        document.getElementById("city").innerHTML = data;
    });

});

document.getElementById("filterForm").addEventListener("submit", function(e){

    e.preventDefault();

    let category = document.querySelector("[name='category']").value;
    let city = document.getElementById("city").value;
    let hint = document.getElementById("searchHint");

    if(category && city){
        hint.textContent = "";
        window.location.href = "/" + category + "/" + city;
    } else {
        hint.textContent = "Select a category and a city.";
    }

});
</script>

<?php include "footer.php"; ?>
