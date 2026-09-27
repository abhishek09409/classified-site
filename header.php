<?php
include __DIR__.'/includes/config.php';

$categories = $conn->query("SELECT * FROM categories WHERE status='active'");
$cities = $conn->query("SELECT * FROM cities WHERE status='active'");


$seo = $conn->prepare("
SELECT meta_title, meta_description
FROM seo_content
WHERE category_slug=?
LIMIT 1
");

$seo->bind_param("s",$category);
$seo->execute();

$row = $seo->get_result()->fetch_assoc();

$seo_meta_title = $row['meta_title'] ?? '';
$seo_meta_description = $row['meta_description'] ?? '';



$cityName = ucwords(str_replace('-', ' ', $city));

$seo_meta_title = str_replace('delhi', $cityName, $seo_meta_title);
$seo_meta_description = str_replace('Delhi', $cityName, $seo_meta_description);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="author" content="inscallup">
<meta name="publisher" content="inscallup">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="theme-color" content="#141210">
<link rel="icon" type="image/png" href="img/favvv.png">
<meta name="google-site-verification" content="GjFjWa2RgsUhM85kZYqIR4IXKZrKXvrIvwv44QGK-1o" />
<link rel="canonical" href="https://inscallup.com<?php echo htmlspecialchars($_SERVER['REQUEST_URI'] ?? '', ENT_QUOTES); ?>">


<meta name="keywords" content="<?php echo htmlspecialchars($seo_keywords ?? '', ENT_QUOTES); ?>">

<link rel="icon" href="/img/sfavicon.png">

<?php
// 🔥 FALLBACK SEO FIX
if(empty($seo_meta_title)){
    if(!empty($category) && !empty($city)){
        $seo_meta_title = "Ins Call Up Supplies Horny Escorts ".ucwords(str_replace('-', ' ', $city))." for Sex";
    } else {
        $seo_meta_title = "Ins Call Up Supplies Horny Escorts for Sex";
    }
}

if(empty($seo_meta_description)){
    if(!empty($city)){
        $seo_meta_description = "Get here details about how to book escorts ".ucwords(str_replace('-', ' ', $city))." or call girls in ".ucwords(str_replace('-', ' ', $city))." for sex with Ins Call Up, a genuine supplier of call girls.";
    } else {
        $seo_meta_description = "Get here details about how to book escorts or call girls for sex with Ins Call Up, a genuine supplier of call girls.";
    }
}
?>

<title><?php echo htmlspecialchars($seo_meta_title, ENT_QUOTES); ?></title>
<meta name="description" content="<?php echo htmlspecialchars($seo_meta_description, ENT_QUOTES); ?>">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,560;0,9..144,680;1,9..144,560&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
:root {
  --ink: #16130f;
  --ink-soft: #2a241c;
  --paper: #f4efe6;
  --paper-2: #ebe3d4;
  --card: #fffdf8;
  --brass: #8d5e34;
  --brass-2: #c4925a;
  --blush: #9d3d4e;
  --line: rgba(22, 19, 15, 0.12);
  --muted: #6f675d;
  --serif: "Fraunces", Georgia, serif;
  --sans: "Outfit", sans-serif;
}

* { box-sizing: border-box; }

body {
  margin: 0;
  background:
    radial-gradient(1200px 500px at 10% -10%, rgba(196, 146, 90, 0.16), transparent 55%),
    var(--paper);
  color: var(--ink);
  font-family: var(--sans);
  font-weight: 400;
  line-height: 1.5;
}

a { color: inherit; }

img { max-width: 100%; }

.topbar {
  position: sticky;
  top: 0;
  z-index: 40;
  background: rgba(244, 239, 230, 0.9);
  backdrop-filter: blur(16px);
  border-bottom: 1px solid var(--line);
}

.header-inner {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 16px;
  min-height: 78px;
  padding: 10px 0;
}

.logo-area a {
  display: flex;
  align-items: center;
  text-decoration: none;
}

.logo-area img {
  height: 46px;
  width: auto;
  display: block;
}

.header-right {
  display: flex;
  align-items: center;
  gap: 14px;
}

.user-box {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  text-decoration: none;
  color: var(--ink);
  font-size: 14px;
  font-weight: 500;
}

.user-icon {
  width: 36px;
  height: 36px;
  border-radius: 50%;
  display: grid;
  place-items: center;
  border: 1px solid var(--line);
  background: var(--card);
  color: var(--ink);
  font-size: 14px;
}

.btn-post {
  background: var(--ink);
  color: #f8f3ea;
  padding: 10px 18px;
  border-radius: 999px;
  font-size: 13px;
  letter-spacing: 0.08em;
  text-decoration: none;
  font-weight: 500;
  text-transform: uppercase;
}

.btn-post:hover {
  background: var(--brass);
  color: #fff;
}

.hero-section {
  position: relative;
  min-height: 560px;
  background: #1a1612 url('/image/gibanner.png') center right / cover no-repeat;
  color: #f6f1e8;
  overflow: hidden;
}

.hero-overlay {
  position: absolute;
  inset: 0;
  background:
    linear-gradient(90deg, rgba(16, 13, 10, 0.94) 0%, rgba(16, 13, 10, 0.78) 42%, rgba(16, 13, 10, 0.28) 100%);
}

.hero-content {
  position: relative;
  z-index: 2;
  min-height: 560px;
  display: flex;
  align-items: center;
  text-align: left;
  padding: 72px 0 120px;
}

.hero-kicker {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  letter-spacing: 0.22em;
  text-transform: uppercase;
  font-size: 12px;
  color: var(--brass-2);
  margin-bottom: 18px;
}

.hero-kicker:before {
  content: "";
  width: 36px;
  height: 1px;
  background: var(--brass-2);
}

.hero-content h1 {
  font-family: var(--serif);
  font-weight: 560;
  font-size: clamp(40px, 6vw, 76px);
  line-height: 0.96;
  letter-spacing: -0.03em;
  max-width: 740px;
  margin: 0 0 18px;
}

.hero-content h1 span {
  display: block;
  font-style: italic;
  font-weight: 560;
  color: #f0d7b4;
}

.hero-lead {
  max-width: 460px;
  color: rgba(246, 241, 230, 0.78);
  font-size: 16px;
  font-weight: 300;
  margin: 0;
}

.search-section {
  position: relative;
  z-index: 3;
  margin-top: -78px;
  padding: 0 0 20px;
  background: transparent;
}

.search-section h5 {
  font-family: var(--serif);
  font-size: 28px;
  font-weight: 560;
  color: var(--ink);
  margin: 0 0 6px;
  text-align: left;
}

.search-section .search-kicker {
  color: var(--muted);
  font-size: 14px;
  margin-bottom: 18px;
  text-align: left;
}

.search-section form {
  background: var(--card);
  padding: 22px;
  border-radius: 22px;
  border: 1px solid rgba(22, 19, 15, 0.08);
  box-shadow: 0 24px 60px rgba(40, 28, 16, 0.12);
}

.search-section select,
.search-section .form-select {
  height: 52px;
  border-radius: 12px;
  border: 1px solid #e4dacb;
  background-color: #fbf8f3;
  font-size: 14px;
  color: var(--ink);
  box-shadow: none;
}

.search-section select:focus,
.search-section .form-select:focus {
  border-color: var(--brass);
  box-shadow: 0 0 0 3px rgba(141, 94, 52, 0.15);
}

.search-section .btn-pink,
.btn-pink {
  height: 52px;
  border-radius: 12px;
  background: linear-gradient(180deg, #a84658, #8d3546);
  border: none;
  color: #fff;
  font-weight: 600;
  letter-spacing: 0.04em;
}

.search-section .btn-pink:hover,
.btn-pink:hover {
  color: #fff;
  transform: translateY(-1px);
  box-shadow: 0 10px 20px rgba(157, 61, 78, 0.25);
}

.search-hint {
  min-height: 18px;
  margin: 10px 2px 0;
  font-size: 13px;
  color: var(--blush);
  text-align: left;
}

.category-detail {
  background: transparent;
  padding-top: 54px;
}

.section-head {
  display: flex;
  justify-content: space-between;
  align-items: flex-end;
  gap: 16px;
  margin-bottom: 22px;
}

.section-head h5,
.city-tags h6,
.state-tags h6 {
  font-family: var(--serif);
  font-size: 36px;
  font-weight: 560;
  margin: 0;
  color: var(--ink);
}

.section-head p {
  margin: 0;
  color: var(--muted);
  max-width: 280px;
  font-size: 14px;
  text-align: right;
}

.cat-box {
  background: var(--card);
  border-radius: 22px;
  overflow: hidden;
  border: 1px solid rgba(22, 19, 15, 0.08);
  box-shadow: 0 16px 40px rgba(40, 28, 16, 0.06);
  height: 100%;
  display: flex;
  flex-direction: column;
}

.cat-box img {
  width: 100%;
  height: 210px;
  object-fit: cover;
  display: block;
  background: #2a241c;
}

.cat-title {
  font-family: var(--serif);
  font-size: 28px;
  font-weight: 560;
  padding: 16px 18px 0;
  background: transparent;
  color: var(--ink);
  text-align: left;
}

.cat-desc {
  font-size: 14px;
  padding: 8px 18px 0;
  color: var(--muted);
  margin: 0;
}

.city-list {
  padding: 14px 14px 16px;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 8px;
  margin-top: auto;
}

.city-list a {
  display: block;
  padding: 10px 12px;
  border: 1px solid #eadfce;
  border-radius: 12px;
  background: #fbf8f3;
  font-size: 13px;
  font-weight: 500;
  color: var(--ink);
  text-decoration: none;
}

.city-list a:hover {
  border-color: var(--brass);
  color: var(--brass);
}

.city-list span {
  display: block;
  font-size: 11px;
  font-weight: 400;
  color: var(--muted);
  margin-top: 2px;
}

.city-tags,
.state-tags {
  padding: 28px 0 10px;
}

.tags-wrapper {
  display: flex;
  flex-wrap: wrap;
  justify-content: flex-start;
  gap: 10px;
}

.tag {
  padding: 8px 14px;
  border-radius: 999px;
  font-size: 13px;
  text-decoration: none;
  display: inline-block;
  transition: 0.2s ease;
}

.tag.red {
  border: 1px solid rgba(141, 94, 52, 0.45);
  color: var(--brass);
  background: rgba(255, 253, 248, 0.7);
}

.tag.red:hover {
  background: var(--ink);
  border-color: var(--ink);
  color: #f6f1e8;
}

.tag.gray {
  border: 1px solid transparent;
  color: var(--ink-soft);
  background: rgba(22, 19, 15, 0.04);
}

.tag.gray:hover {
  background: var(--brass);
  color: #fff;
}

.main-footer {
  margin-top: 48px;
  background: var(--ink);
  color: #efe7db;
  padding: 56px 0 0;
}

.footer-top img {
  height: 42px;
  width: auto;
  margin-bottom: 12px;
  background: #f4efe6;
  border-radius: 10px;
  padding: 6px 10px;
}

.rta-box {
  display: inline-block;
  border: 1px solid rgba(240, 215, 180, 0.35);
  color: #f0d7b4;
  padding: 6px 12px;
  border-radius: 999px;
  font-size: 12px;
  letter-spacing: 0.12em;
}

.footer-top p {
  max-width: 640px;
  margin: 16px auto 0;
  color: rgba(239, 231, 219, 0.72);
}

.footer-links h6 {
  font-family: var(--serif);
  font-size: 20px;
  font-weight: 560;
  margin-bottom: 12px;
  color: #f0d7b4;
}

.footer-links a {
  display: block;
  font-size: 14px;
  color: rgba(239, 231, 219, 0.78);
  text-decoration: none;
  margin-bottom: 7px;
}

.footer-links a:hover { color: #fff; }

.footer-payment {
  border-top: 1px solid rgba(255, 255, 255, 0.08);
  padding-top: 18px;
  margin-top: 28px;
}

.footer-payment .small,
.footer-top .small {
  color: rgba(239, 231, 219, 0.62);
}

.footer-badges img {
  height: 32px;
  width: auto;
  margin: 0 6px;
  background: #fff;
  border-radius: 4px;
  padding: 2px 4px;
}

.footer-bottom {
  background: #0d0b09;
  color: rgba(239, 231, 219, 0.8);
  padding: 18px 0;
  margin-top: 28px;
}

.social-icons i {
  margin: 0 8px;
  width: 34px;
  height: 34px;
  border: 1px solid rgba(255,255,255,0.12);
  border-radius: 50%;
  display: inline-grid;
  place-items: center;
  font-size: 13px;
}

@media (max-width: 768px) {
  .hero-section,
  .hero-content {
    min-height: 460px;
  }

  .hero-overlay {
    background: linear-gradient(180deg, rgba(16, 13, 10, 0.55), rgba(16, 13, 10, 0.92));
  }

  .hero-content {
    padding: 48px 0 110px;
    text-align: left;
  }

  .hero-content h1 {
    font-size: 42px;
  }

  .search-section {
    margin-top: -64px;
  }

  .search-section form {
    padding: 16px;
  }

  .section-head {
    flex-direction: column;
    align-items: flex-start;
  }

  .section-head p,
  .section-head h5,
  .city-tags h6,
  .state-tags h6 {
    text-align: left;
  }

  .section-head h5,
  .city-tags h6,
  .state-tags h6 {
    font-size: 30px;
  }

  .city-list {
    grid-template-columns: 1fr;
  }

  .btn-post {
    padding: 8px 12px;
    font-size: 11px;
  }

  .header-inner {
    min-height: 66px;
  }
}
</style>
</head>
<body>

<div class="topbar">
  <div class="container header-inner">

    <div class="logo-area">
      <a href="/">
        <img src="/image/calluplogo.png" alt="Inscallup">
      </a>
    </div>

    <div class="header-right">

      <?php if(isset($_SESSION['user_id'])){ ?>

        <a href="/user/dashboard.php" class="user-box">
          <i class="fa fa-user user-icon"></i>
          <span><?php echo htmlspecialchars($_SESSION['user_name'] ?? '', ENT_QUOTES); ?></span>
        </a>

        <a href="/user/add-listing.php" class="btn-post">
          Post your ad
        </a>

      <?php } else { ?>

        <a href="/user/login.php" class="user-box">
          <i class="fa fa-user user-icon"></i>
        </a>

        <a href="/user/login.php" class="btn-post">
          Post your ad
        </a>

      <?php } ?>

    </div>

  </div>
</div>

<script>
document.addEventListener("contextmenu", e => e.preventDefault());
document.addEventListener("selectstart", e => e.preventDefault());
document.addEventListener("copy", e => e.preventDefault());
document.onkeydown = function(e) {
    if (
        e.keyCode == 123 ||
        (e.ctrlKey && e.shiftKey && e.keyCode == 73) ||
        (e.ctrlKey && e.keyCode == 85)
    ) {
        return false;
    }
};
</script>
