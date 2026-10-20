<?php
/**
 * 越前海岸盛り上げ隊とは (/about-us/)
 * 団体の紹介 (文章はこのファイルに書く)
 * 隊員プロフィールの一覧はトップページの「隊員紹介」に移した
 * 沿革の年表のデータは content/history/ の Markdown に書く (config.php の SITE_HISTORY_DIR). 旧「活動実績」は沿革にまとめた
 * 導入は「説明 (リードと2段組み)」と「メッセージ (中央そろえの帯)」の2つ. 写真は置かず, 沿革で初めて写真を見せる
 */
require_once dirname(__DIR__) . '/inc/templates/historyTimeline.php';

const ABOUT_US_TITLE = '越前海岸盛り上げ隊とは';
// ページ上部に薄く敷く背景の写真 (海と棚田と集落. 越前海岸の暮らしの風景)
const ABOUT_US_BACKDROP = 'assets/photos/main01.jpg';

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
  'image'       => 'assets/banners/about-us.jpg',
]);
?>
    <main id="main" class="main">
      <div class="backdrop" style="--backdrop-image: url('<?= e(path(ABOUT_US_BACKDROP)) ?>');" aria-hidden="true"></div>
      <?= $breadcrumb->breadcrumb() ?>
<?php render_title_area(ABOUT_US_TITLE, 'about us', 'h1', 'main__titleArea'); ?>
      <div class="aboutUs">
        <section class="aboutUs__intro" data-readable>
          <p class="aboutUs__lead">越前海岸盛り上げ隊は、越前海岸の「いま」をできるだけ面白くしようと奮闘する大人たちのゆるやかな集まりです。</p>
          <div class="aboutUs__columns entry">
            <p>会員名簿には、海鮮料理屋、旅館や民宿、クラゲ販売店、製粉屋、製塩所、林業家、ガラス作家、お坊さん、デザイナーやプログラマー、地域おこし協力隊など、30以上の事業所と個人が名を連ね、その時々でそれぞれにできることを差し出し合いながら、日々活動を続けています。</p>
            <p>エリアの観光振興マップづくりをはじめ、体験コンテンツの開発や地域の情報発信、移住者受け入れのコーディネートなど、人口減少の進むこの地域の暮らしを子どもたちにつないでいくために様々な取り組みを行なっています。</p>
          </div>
        </section>

        <section class="aboutUs__message" aria-label="私たちの思い">
          <div class="aboutUs__messageInner" data-readable>
            <p>過疎化の波は大きいけれど、<br>工夫次第でいかようにも乗りこなせるはず。</p>
            <p class="aboutUs__voice">「この村に生まれてよかった」</p>
            <p>波を楽しむ大人たちの背中を見て、<br>子どもたちがそう思ってくれたら最高。<br><span class="aboutUs__phrase">そんなことを考えながら</span><span class="aboutUs__phrase">活動している私たちを見て、</span></p>
            <p class="aboutUs__voice">「越前海岸、楽しそうじゃん！」</p>
            <p>あなたがそう思ってくれたらもっと最高。<br>いつか、いつでも、仲間になってください。<br>越前海岸でお待ちしてます！</p>
          </div>
        </section>

        <section class="aboutUs__section" id="history">
<?php render_title_area('沿革', 'history'); ?>
<?php render_history_timeline(history_items()); ?>
        </section>
      </div>
    </main>
<?php render_footer(); ?>
