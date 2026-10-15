<?php
/**
 * 越前海岸盛り上げ隊とは (/about-us/)
 * 団体の紹介 (文章・写真はこのファイルに書く)
 * 隊員プロフィールの一覧はトップページの「隊員紹介」に移した
 * 沿革の年表のデータは about-us/history.php に書く (旧「活動実績」は沿革にまとめた)
 * 写真は assets/about-us/ に置く
 */
require_once dirname(__DIR__) . '/inc/templates/historyTimeline.php';

const ABOUT_US_TITLE = '越前海岸盛り上げ隊とは';

// パンくず (トップ > 越前海岸盛り上げ隊とは)
$breadcrumb = new ContentNavigation([
  'parents'     => array_map(fn($crumb) => ['label' => $crumb['label'], 'path' => path($crumb['path'])], SITE_BREADCRUMB),
  'subdirLabel' => ABOUT_US_TITLE,
  'subdirPath'  => path('about-us/'),
]);

render_header([
  'title'       => ABOUT_US_TITLE,
  'description' => '越前海岸盛り上げ隊は、越前海岸の「いま」をできるだけ面白くしようと奮闘する大人たちのゆるやかな集まりです。',
  'path'        => 'about-us/',
  'image'       => 'assets/about-us/members.jpg',
]);
?>
    <main id="main" class="main">
      <?= $breadcrumb->breadcrumb() ?>
<?php render_title_area(ABOUT_US_TITLE, 'about us', 'h1', 'main__titleArea'); ?>
      <div class="aboutUs">
        <section class="aboutUs__row" data-readable>
          <figure class="aboutUs__figure flexItem-5 flexItem-order-md-1">
            <img src="<?= e(path('content/images/members/00.jpg')) ?>" alt="越前海岸盛り上げ隊の隊員たち" width="720" height="400">
          </figure>
          <div class="aboutUs__text entry flexItem-4 flexItem-order-md-0">
            <p>越前海岸盛り上げ隊は、越前海岸の「いま」をできるだけ面白くしようと奮闘する大人たちのゆるやかな集まりです。</p>
            <p>会員名簿には、海鮮料理屋、旅館や民宿、クラゲ販売店、製粉屋、製塩所、林業家、ガラス作家、お坊さん、デザイナーやプログラマー、地域おこし協力隊など、30以上の事業所と個人が名を連ね、その時々でそれぞれにできることを差し出し合いながら、日々活動を続けています。</p>
            <p>エリアの観光振興マップづくりをはじめ、体験コンテンツの開発や地域の情報発信、移住者受け入れのコーディネートなど、人口減少の進むこの地域の暮らしを子どもたちにつないでいくために様々な取り組みを行なっています。</p>
          </div>
        </section>

        <section class="aboutUs__row" data-readable>
          <div class="aboutUs__text entry flexItem-4 flexItem-order-md-1">
            <p>過疎化の波は大きいけれど、工夫次第でいかようにも乗りこなせるはず。</p>
            <p class="aboutUs__voice">「この村に生まれてよかった」</p>
            <p>波を楽しむ大人たちの背中を見て、子どもたちがそう思ってくれたら最高。<br>そんなことを考えながら活動している私たちを見て、</p>
            <p class="aboutUs__voice">「越前海岸、楽しそうじゃん！」</p>
            <p>あなたがそう思ってくれたらもっと最高。<br>いつか、いつでも、仲間になってください。<br>越前海岸でお待ちしてます！</p>
          </div>
          <figure class="aboutUs__figure flexItem-5 flexItem-order-md-0">
            <img src="<?= e(path('content/images/about-us/01.jpg')) ?>" alt="古民家「はりいしゃ」" width="720" height="540">
          </figure>
        </section>

        <section class="aboutUs__section" id="history">
<?php render_title_area('沿革', 'history'); ?>
<?php render_history_timeline(require __DIR__ . '/history.php'); ?>
        </section>
      </div>
    </main>
<?php render_footer(); ?>
