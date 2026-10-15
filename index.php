<?php
/**
 * トップページ
 * 1. メインギャラリー (Fader)
 * 2. 私たちについて (/about-us/ へのリンク)
 * 3. ブログ&ニュースの最新記事
 * 4. 隊員紹介 (content/members/ から自動で並べる. 波のアニメーションの背景)
 * 5. バナーエリア (Slider. 中身は config.php の SITE_BANNERS)
 * 6. お問い合わせ (qwel-tools-contact-form. 確認・完了画面は contact/, 送信は api/)
 * 一覧・個別記事は投稿タイプのディレクトリ (blog-and-news/, page/) が表示する
 */
require_once __DIR__ . '/inc/templates/postList.php';
require_once __DIR__ . '/inc/templates/memberList.php';

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
      <section class="section" id="about" data-spy-section>
<?php render_title_area('私たちについて', 'about us'); ?>
        <div class="section__row" data-readable>
          <figure class="flexItem-5">
            <img src="<?= e(path('content/images/members/00.jpg')) ?>" alt="越前海岸盛り上げ隊の隊員たち" width="720" height="400" loading="lazy">
          </figure>
          <div class="entry flexItem-4">
            <p>越前海岸盛り上げ隊は、越前海岸の「いま」をできるだけ面白くしようと奮闘する大人たちのゆるやかな集まりです。</p>
            <p>過疎化の波は大きいけれど、工夫次第でいかようにも乗りこなせるはず。</p>
            <p class="section__more is-start"><a class="moreLink" href="<?= e(path('about-us/')) ?>"><span class="moreLink__label">越前海岸盛り上げ隊とは</span></a></p>
          </div>
        </div>
      </section>

      <section class="section" id="blog" data-spy-section>
<?php render_title_area(post_type('blog')['label'], post_type('blog')['en']); ?>
<?php if ($latest) { ?>
<?php render_post_list($latest, 'blog'); ?>
        <p class="section__more"><a class="moreLink" href="<?= e(type_url('blog')) ?>"><span class="moreLink__label"><?= e(post_type('blog')['label']) ?>をもっと見る</span></a></p>
<?php } else { ?>
        <p class="section__empty">記事はまだありません。</p>
<?php } ?>
      </section>

<?php if (members()) { ?>
      <section class="section is-wide waveArea" id="members" data-spy-section>
        <div class="waveArea__inner">
<?php render_title_area('隊員紹介', 'members'); ?>
<?php render_member_list(members(), 'is-scroll'); ?>
        </div>
      </section>
<?php } ?>

<?php if (SITE_BANNERS) { ?>
      <section class="section is-wide" id="banners" data-spy-section data-readable>
        <div class="section__inner">
<?php render_title_area('私たちの活動', 'our projects'); ?>
        </div>
        <div class="slider" data-gallery="slider" data-gap="48" data-interval="5000">
          <ul class="slider__inner" data-gallery-main>
<?php foreach (SITE_BANNERS as $banner) {
  $isExternal = (bool)preg_match('#^https?://#', $banner['url']);
  $target = $isExternal ? ' target="_blank" rel="noopener"' : '';
?>
            <li class="slider__item" data-gallery-item>
              <a href="<?= e(path($banner['url'])) ?>"<?= $target ?>><img src="<?= e(path($banner['img'])) ?>" alt="" width="1200" height="750" loading="lazy"></a>
            </li>
<?php } ?>
          </ul>
        </div>
      </section>
<?php } ?>

      <section class="section" id="contact" data-spy-section>
<?php render_title_area('お問い合わせ', 'contact'); ?>
        <p class="section__lead" data-readable>越前海岸盛り上げ隊へのご質問・ご相談は、こちらのフォームからお気軽にお寄せください。</p>
        <form class="form" data-contact-form data-readable>
          <table>
            <tr>
              <th><label for="your-name">お名前<span class="is-required">*必須</span></label></th>
              <td><input id="your-name" size="30" type="text" name="お名前" autocomplete="name" required></td>
            </tr>
            <tr>
              <th><label for="your-email">メールアドレス<span class="is-required">*必須</span></label></th>
              <td><input id="your-email" size="30" type="email" name="Email" autocomplete="email" required></td>
            </tr>
            <tr>
              <th><label for="your-subject">件名</label></th>
              <td><input id="your-subject" size="30" type="text" name="件名"></td>
            </tr>
            <tr>
              <th><label for="your-message">メッセージ本文<span class="is-required">*必須</span></label></th>
              <td><textarea id="your-message" name="メッセージ本文" cols="30" rows="6" required></textarea></td>
            </tr>
          </table>
          <input type="submit" value="確認">
        </form>
      </section>
    </main>
<?php render_footer(); ?>
