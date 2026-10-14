<?php
/**
 * 越前海岸盛り上げ隊とは (/about-us/)
 * 団体の紹介 (文章・写真はこのファイルに書く)
 * 隊員プロフィールの一覧はトップページの「隊員紹介」に移した
 * 写真は assets/about-us/ に置く
 */
require_once dirname(__DIR__) . '/inc/partials/site.php';

const ABOUT_US_TITLE = '越前海岸盛り上げ隊とは';

// パンくず (トップ > 越前海岸盛り上げ隊とは)
$breadcrumb = new ContentNavigation([
  'parents'     => array_map(fn($crumb) => ['label' => $crumb['label'], 'path' => path($crumb['path'])], SITE_BREADCRUMB),
  'subdirLabel' => ABOUT_US_TITLE,
  'subdirPath'  => path('about-us/'),
]);

// 立ち上げの2人 (写真と肩書きは隊員プロフィールから)
$founders = array_filter([member('wataru-hasegawa'), member('takuya-matta')]);

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

        <section class="aboutUs__section">
<?php render_title_area('盛り上げ隊の立ち上げ', 'our story'); ?>
          <div class="aboutUs__row" data-readable>
            <div class="aboutUs__text entry flexItem-5">
              <p>越前海岸盛り上げ隊発足のきっかけとなったのは、現隊長の長谷川渡と現副隊長の枩田卓也という二人の男たちの出会い。Uターンで地元に戻ってきた長谷川がガラス工房を開いたという噂を聞きつけ、枩田が挨拶に出向いたことをきっかけにつながった二人。以降、過疎化の進む越前海岸の未来について夕日を見ながら語り合う仲となります。</p>
              <p>そんなタイミングで行政（福井市）から「団体をつくってみないか？」と声かけがあったこともあり、旅館や飲食業を営む事業者を中心にメンバーを集め、「越前海岸盛り上げ隊」が産声をあげることになりました。2015年のことです。そこから今に至るまで、一人また一人と仲間を増やして活動を続けてきました。</p>
            </div>
<?php if ($founders) { ?>
            <div class="aboutUs__founders flexItem-4">
<?php foreach ($founders as $founder) { ?>
              <figure class="aboutUs__figure">
                <img src="<?= e(path($founder['img'])) ?>" alt="" width="360" height="240" loading="lazy">
                <figcaption><?= e(trim(explode('/', $founder['role'] ?? '')[0])) ?> <?= e($founder['title'] ?? '') ?></figcaption>
              </figure>
<?php } ?>
            </div>
<?php } ?>
          </div>
        </section>

        <section class="aboutUs__section">
<?php render_title_area('活動実績', 'activities'); ?>
          <div class="aboutUs__row" data-readable>
            <div class="aboutUs__text entry flexItem-4">
              <h3>マップづくり</h3>
              <p>越前海岸盛り上げ隊として一番初めに取り組んだのは、越前海岸エリアの観光振興マップの作成です。盛り上げ隊に加入する事業所を中心に、地域の見どころが一目でわかるマップをつくり、各事業所や福井県内各所に設置。マップの内容は毎年アップデートされ、常に越前海岸のフレッシュな情報をお届けするツールとして定着しています。</p>
              <h3>WEBサイト運用</h3>
              <p>マップづくりと合わせて、エリアの情報を発信していくためにWEBサイトも立ち上げました。現在ご覧いただいているWEBサイトは大幅にリニューアルしたもの。盛り上げ隊広報部が中心となって、コンテンツの更新に取り組んでいます。</p>
            </div>
            <figure class="aboutUs__figure is-map flexItem-2 text-center">
              <img src="<?= e(path('content/images/about-us/map.jpg')) ?>" alt="越前海岸の観光振興マップ" width="254" height="720" loading="lazy">
            </figure>
          </div>
          <div class="aboutUs__row" data-readable>
            <div class="aboutUs__text entry flexItem-4">
              <h3>体験コンテンツの開発</h3>
              <p>2017年頃から力を入れて取り組んできたのは、エリア内の体験コンテンツを増やしていくことでした。モノ消費からコト消費への転換を受けて、越前海岸の地域資源を生かした体験コンテンツの開発に着手。出来上がった体験コンテンツの総称は「海の体験博覧会」略して「うみたん」と名付け、2018年の夏から徐々に運用をスタート。ブラッシュアップを重ねながら、海・山・川での様々な体験を多くの方々に楽しんでもらっています。</p>
            </div>
            <figure class="aboutUs__figure flexItem-2">
              <img src="<?= e(path('content/images/about-us/02.jpg')) ?>" alt="" width="360" height="240" loading="lazy">
              <figcaption>ナイトシュノーケル体験の様子</figcaption>
            </figure>
          </div>
          <div class="aboutUs__row" data-readable>
            <div class="aboutUs__text entry flexItem-4">
              <h3>人の駅プロジェクト</h3>
              <p>当初は越前海岸エリアの観光振興を目的として立ち上がった団体でしたが、近年では地域内外の人々との多様な関係性の構築を図る「人の駅プロジェクト」にも力を入れています。それは、人々とのつながりこそがこの地域の暮らしを子どもたちにつないでいく鍵だと気づいたから。つながることから生まれる無限の可能性が、この地域にチャレンジの気運をもたらしてくれます。それぞれが大小様々なチャレンジを繰り返しながら、エリアの魅力を高めあっています。</p>
            </div>
            <figure class="aboutUs__figure flexItem-2">
              <img src="<?= e(path('content/images/about-us/03.jpg')) ?>" alt="" width="360" height="240" loading="lazy">
              <figcaption>地域内外の交流を築く「人の駅プロジェクト」</figcaption>
            </figure>
          </div>
          <div class="aboutUs__row" data-readable>
            <div class="aboutUs__text entry flexItem-4">
              <h3>拠点の整備</h3>
              <p>人の駅プロジェクトを進めていくにあたり、2020年には念願の拠点整備にも着手。もともと鍼灸院を営んでいた「はりいしゃ」という屋号の空き家を改修し、越前海岸での滞在と交流の拠点として再生させました。改修資金の調達にあたってはCAMPFIREでのクラウドファンディングにも挑戦。目標金額の197%にあたる296万円を集め、調達を成功させました。「はりいしゃ」は、宿泊や滞在の拠点として、また交流やイベントの会場として活用を進めて行く予定です。</p>
            </div>
            <figure class="aboutUs__figure flexItem-2">
              <img src="<?= e(path('content/images/hariisha-renovation/00.jpg')) ?>" alt="" width="360" height="270" loading="lazy">
              <figcaption>古民家「はりいしゃ」を整備</figcaption>
            </figure>
          </div>
        </section>
      </div>
    </main>
<?php render_footer(); ?>
