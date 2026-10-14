<?php
/**
 * トップページ
 * メインギャラリー (Fader) と, ブログ&ニュースの最新記事を並べる
 * 一覧・個別記事は投稿タイプのディレクトリ (blog/, page/) が表示する
 */
require_once __DIR__ . '/inc/templates/postList.php';

// トップに並べる記事の件数
const HOME_POST_COUNT = 5;

$blog = content_engine('blog', ['slug' => null, 'page' => 1]);
$latest = $blog->get_posts(1, HOME_POST_COUNT);

render_header([
  'full_title' => SITE_HOME_TITLE,
  'path'       => '',
  'type'       => 'website',
]);
?>
    <div class="hero">
      <div class="hero__gallery fader" data-gallery="fader" data-interval="<?= (int)SITE_HERO_INTERVAL ?>">
        <ul class="fader__inner">
<?php foreach (SITE_HERO_PHOTOS as $photo) { ?>
          <li class="fader__item hero__photo" data-gallery-item style="background-image: url('<?= e(path($photo)) ?>');"></li>
<?php } ?>
        </ul>
      </div>
      <h1 class="hero__title">
        <img class="hero__logo" src="<?= e(path(SITE_HERO_LOGO)) ?>" alt="<?= e(SITE_NAME) ?>" width="320" height="320">
      </h1>
    </div>
    <main id="main" class="main">
      <section class="section">
<?php render_title_area(post_type('blog')['label'], post_type('blog')['en']); ?>
<?php if ($latest) { ?>
<?php render_post_list($latest, 'blog'); ?>
        <p class="section__more"><a href="<?= e(type_url('blog')) ?>">&gt;&gt;&gt; <?= e(post_type('blog')['label']) ?>をもっと見る</a></p>
<?php } else { ?>
        <p class="section__empty">記事はまだありません。</p>
<?php } ?>
      </section>
    </main>
<?php render_footer(); ?>
