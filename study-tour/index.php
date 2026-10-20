<?php
/**
 * 教育旅行 (/study-tour/)
 * 旧サイトの「越前海岸の暮らしを見つける旅」を, 新サイトのトーンに合わせて整理したもの (プロトタイプ)
 * 文章・一覧のデータはこのファイルの上にまとめて書く (内容の確認が済んだら content/ への移行を検討)
 * 写真・動画・パンフレット (PDF)・地図は content/images/study-tour/ に置く
 */
require_once dirname(__DIR__) . '/inc/partials/site.php';

const STUDY_TOUR_TITLE = '教育旅行';

// 特徴
$features = [
  ['title' => '暮らしと生業に触れる', 'text' => '海鮮料理屋、旅館、製塩所、林業家、ガラス作家など、地域に根ざして働く人たちが案内役。仕事を通して、地域の暮らしと社会への興味を育てます。'],
  ['title' => '人数・予算に合わせて', 'text' => '予算や日程、荒天時の急な変更にも、事業者同士の連携で臨機応変に対応。屋内でも越前海岸の魅力をお届けします。'],
  ['title' => '海・山・里を一度に', 'text' => '海と里山がすぐ隣り合う、全国でも数少ない地域。昔ながらの営みを受け継いできた人々の暮らしを、肌で体感できます。'],
];

// 体験の分類 (海・山・里で色を分ける)
$fields = [
  'sea'      => '海の体験',
  'mountain' => '山の体験',
  'village'  => '里の体験',
];

// 体験プログラム (host: 主催事業者, field: 分類 ($fields のキー))
$programs = [
  ['host' => '越前海岸盛り上げ隊', 'title' => '海釣り体験', 'field' => 'sea', 'text' => '安全な岸壁からの釣り体験'],
  ['host' => 'Atolla', 'title' => '磯の生き物観察', 'field' => 'sea', 'text' => '海岸清掃をしながら、海の生き物と自然の関係を学ぶ'],
  ['host' => '越前海岸志野製塩所', 'title' => '塩づくり体験', 'field' => 'sea', 'text' => '日本海から汲み取った海水で塩をつくる'],
  ['host' => '志野ファーム', 'title' => '家畜の餌やり体験', 'field' => 'village', 'text' => 'ニワトリやヤギなどの餌やりとお世話'],
  ['host' => 'ワタリグラススタジオ', 'title' => 'グラスづくり体験', 'field' => 'sea', 'text' => '海を見下ろす工房で、自分だけのグラスをつくる'],
  ['host' => '国民宿舎鷹巣荘', 'title' => '海水浴 & BBQ', 'field' => 'sea', 'text' => '海を眺めながらのBBQ。温泉付き'],
  ['host' => '岩尾醤油醸造元', 'title' => '醤油絞り体験', 'field' => 'village', 'text' => '醤油を絞り、自分だけの醤油瓶をつくって持ち帰る'],
  ['host' => 'たかすオハナ牧場', 'title' => 'ヤギ・羊の餌やり', 'field' => 'village', 'text' => 'ヤギや羊とふれあう餌やり体験'],
  ['host' => 'ファームステイ殿下', 'title' => 'ムラロゲイニング', 'field' => 'village', 'text' => 'ゆるやかな競技性のある、農村を巡るアクティビティ'],
  ['host' => 'こしのくに里山再生の会', 'title' => '林業体験', 'field' => 'mountain', 'text' => '森の環境を学びながら、薪割りなどを体験'],
  ['host' => 'こしのくに里山再生の会', 'title' => '川遊び体験', 'field' => 'mountain', 'text' => '山あいの清流での川遊び'],
];

// 体験の様子の写真 (content/images/study-tour/01.jpg ~)
$photos = range(1, 12);

// 体験の紹介動画 (content/images/study-tour/ の mp4 と, 再生前に出す poster)
$videos = [
  ['src' => 'activity.mp4', 'poster' => 'activity-poster.jpg', 'caption' => '越前海岸盛り上げ隊の体験メニュー「うみたん」'],
  ['src' => 'facility.mp4', 'poster' => 'facility-poster.jpg', 'caption' => '越前海岸の農家民宿のご案内'],
];

// パンフレット (利用料金・概要)
const STUDY_TOUR_PAMPHLET = 'content/images/study-tour/pamphlet.pdf';

// 地区の色 (海沿いの地区は海の色, 里山の殿下は山の色)
$areaTones = ['鷹巣' => 'sea', '国見' => 'sea', '越廼' => 'sea', '殿下' => 'mountain'];

// 宿泊施設 (地区ごと. capacity: 収容人数)
$stays = [
  '鷹巣' => [
    ['name' => '割烹旅館 越前満月', 'capacity' => '50人', 'tel' => '0776-85-1333'],
    ['name' => 'さかな遊びの宿 やまちょう', 'capacity' => '20人', 'tel' => '0776-86-1234'],
    ['name' => '白浜荘', 'capacity' => '100人', 'tel' => '0776-86-1316'],
    ['name' => '農家民宿 オーベルジュフジイフェルミエ', 'capacity' => '10人', 'tel' => '090-2123-3851'],
    ['name' => '活かに専門の宿 山根屋', 'capacity' => '20人', 'tel' => '0776-86-1727'],
    ['name' => '国民宿舎 鷹巣荘', 'capacity' => '48人', 'tel' => '0776-86-1111'],
  ],
  '国見' => [
    ['name' => '海辺の農園宿 つかさ丸', 'capacity' => '5人', 'tel' => '0776-88-2962'],
    ['name' => 'ホテル割烹石丸', 'capacity' => '50人', 'tel' => '0776-88-2225'],
    ['name' => '兼八旅館', 'capacity' => '30人', 'tel' => '0776-88-2005'],
  ],
  '越廼' => [
    ['name' => '民宿 よねや', 'capacity' => '20〜30人', 'tel' => '0776-89-2266'],
    ['name' => 'ガラガラ山キャンプ場', 'capacity' => '30人', 'tel' => '0776-89-2180'],
    ['name' => '一丁来', 'capacity' => '20人', 'tel' => '0776-89-2100'],
    ['name' => '箪瓢草堂', 'capacity' => '10人', 'tel' => '0776-76-2116'],
  ],
  '殿下' => [
    ['name' => '農家民宿群 殿下ファームステイ', 'capacity' => '30人', 'tel' => '090-2541-3267'],
  ],
];

// ご予約の流れ
$steps = [
  ['title' => 'お問い合わせ', 'text' => '来福日程、希望する体験、人数、滞在時間、団体名、代表者名とご連絡先をお知らせください。'],
  ['title' => 'お申し込み', 'text' => '申込金を指定の口座へお振り込みいただいた時点で、ご契約が成立します。申込金は旅行代金の一部に充当します。'],
  ['title' => '当日', 'text' => '体験施設または指定の場所に直接集合。添乗員は同行しませんが、コンシェルジュが現地でご案内します。'],
];

// キャンセル料 (お客様のご都合で取り消しとなる場合)
$cancelFees = [
  ['when' => '7日前〜2日前', 'fee' => '旅行代金の20%'],
  ['when' => '前日', 'fee' => '旅行代金の50%'],
  ['when' => '当日', 'fee' => '旅行代金の100%'],
];

// よくある質問
$faqs = [
  ['q' => '付き添いの方の料金は免除になりますか。', 'a' => '体験の付き添いの方は、料金を免除しています。'],
  ['q' => 'これまでの受け入れの実例はありますか。', 'a' => '<a href="' . e(path('blog-and-news/study-tour-2020/')) . '">令和2年度の活動報告</a>と<a href="' . e(path('blog-and-news/r4-summary/')) . '">令和4年度の活動報告</a>をご参照ください。'],
  ['q' => 'お昼ご飯を食べる場所はありますか。', 'a' => '屋内で食事のできるレストランのほか、天候が良ければ、周遊しながらお弁当を食べられるスポットもご案内します。'],
];

// 交通 (福井駅まで)
// 交通 (福井駅まで. 2024年3月の北陸新幹線 敦賀延伸後)
$access = [
  ['from' => '東京駅', 'by' => '北陸新幹線', 'time' => '約2時間50分'],
  ['from' => '大阪駅', 'by' => '特急サンダーバード・北陸新幹線（敦賀乗り換え）', 'time' => '約1時間45分'],
  ['from' => '名古屋駅', 'by' => '特急しらさぎ・北陸新幹線（敦賀乗り換え）', 'time' => '約1時間30分'],
  ['from' => '東京駅八重洲南口', 'by' => '高速バス', 'time' => '約8時間20分'],
  ['from' => '大阪梅田（阪急三番街）', 'by' => '高速バス', 'time' => '約3時間30分'],
  ['from' => 'JR名古屋駅', 'by' => '高速バス', 'time' => '約2時間40分'],
];

$concierge = member('yuko-matzdaira');

// パンくず (トップ > 教育旅行)
$breadcrumb = new ContentNavigation([
  'parents'     => array_map(fn($crumb) => ['label' => $crumb['label'], 'path' => path($crumb['path'])], SITE_BREADCRUMB),
  'subdirLabel' => STUDY_TOUR_TITLE,
  'subdirPath'  => path('study-tour/'),
]);

render_header([
  'title'       => STUDY_TOUR_TITLE,
  'description' => '越前海岸盛り上げ隊の教育旅行「越前海岸の暮らしを見つける旅」。地域に根ざして働く人たちと、海・山・里の暮らしに触れる体験プログラムをご案内します。',
  'path'        => 'study-tour/',
  'image'       => 'assets/banners/study-tour.jpg',
]);
?>
    <main id="main" class="main">
      <?= $breadcrumb->breadcrumb() ?>
<?php render_title_area(STUDY_TOUR_TITLE, 'study tour', 'h1', 'main__titleArea'); ?>
      <div class="studyTour">
        <section class="studyTour__intro" data-readable>
          <div class="studyTour__lead entry">
            <p class="studyTour__catch">越前海岸の<br>暮らしを見つける旅</p>
            <p>海に面する棗・鷹巣・国見・越廼と、里山に囲まれた殿下。5つの地区から30ほどの事業者が集まる越前海岸盛り上げ隊が、ここでしかできない体験をご案内します。</p>
            <p>各体験は SDGs の観点からも学べる内容で、保育園・幼稚園から小中高校まで、自由研究やテーマ別の学習、スタディツアーにご利用いただけます。</p>
          </div>
          <div class="studyTour__mosaic" aria-hidden="true">
<?php foreach ([1, 5, 6, 7] as $i) { ?>
            <img src="<?= e(path(sprintf('content/images/study-tour/%02d.jpg', $i))) ?>" alt="" width="348" height="256">
<?php } ?>
          </div>
        </section>

        <section class="studyTour__section" id="features">
<?php render_title_area('3つの特徴', 'features'); ?>
          <ol class="studyTour__features">
<?php foreach ($features as $i => $feature) { ?>
            <li class="studyTour__feature is-<?= ['sea', 'mountain', 'village'][$i % 3] ?>" data-readable>
              <h3 class="studyTour__featureTitle"><?= e($feature['title']) ?></h3>
              <p><?= e($feature['text']) ?></p>
            </li>
<?php } ?>
          </ol>
        </section>

        <section class="studyTour__section" id="programs">
<?php render_title_area('体験プログラム', 'programs'); ?>
          <div class="studyTour__videos">
<?php foreach ($videos as $video) { ?>
            <figure class="studyTour__video" data-readable>
              <video src="<?= e(path('content/images/study-tour/' . $video['src'])) ?>" poster="<?= e(path('content/images/study-tour/' . $video['poster'])) ?>" controls playsinline preload="none" width="1280" height="720"></video>
              <figcaption><?= e($video['caption']) ?></figcaption>
            </figure>
<?php } ?>
          </div>
          <ul class="studyTour__gallery" aria-label="体験の様子">
<?php foreach ($photos as $i) { ?>
            <li><img src="<?= e(path(sprintf('content/images/study-tour/%02d.jpg', $i))) ?>" alt="体験の様子" width="348" height="256" loading="lazy"></li>
<?php } ?>
          </ul>
          <ul class="studyTour__fields">
<?php foreach ($fields as $field => $label) { ?>
            <li class="studyTour__field is-<?= $field ?>"><?= e($label) ?></li>
<?php } ?>
          </ul>
          <ul class="studyTour__programs">
<?php foreach ($programs as $program) { ?>
            <li class="studyTour__program is-<?= e($program['field']) ?>">
              <span class="studyTour__field"><?= e(mb_substr($fields[$program['field']], 0, 1)) ?></span>
              <p class="studyTour__host"><?= e($program['host']) ?></p>
              <h3 class="studyTour__programTitle"><?= e($program['title']) ?></h3>
              <p class="studyTour__programText"><?= e($program['text']) ?></p>
            </li>
<?php } ?>
          </ul>
          <p class="studyTour__note">屋外で行う体験が多いため、荒天時には内容を変更する場合があります。</p>
        </section>

        <section class="studyTour__section" id="stay">
<?php render_title_area('宿泊', 'stay'); ?>
          <p class="studyTour__sectionLead" data-readable>各地区は車で10分ほど。一日の終わりには、日本海に沈む夕日と、海の幸や温泉をゆっくりお楽しみください。<br>宿泊のご予約は、各施設へ直接お願いします。</p>
          <div class="studyTour__stays">
<?php foreach ($stays as $area => $list) { ?>
            <div class="studyTour__area is-<?= $areaTones[$area] ?? 'sea' ?>" data-readable>
              <h3 class="studyTour__areaName"><?= e($area) ?>地区</h3>
              <ul class="studyTour__stayList">
<?php foreach ($list as $stay) { ?>
                <li>
                  <span class="studyTour__stayName"><?= e($stay['name']) ?></span>
                  <span class="studyTour__stayMeta"><?= e($stay['capacity']) ?> ／ <a href="tel:<?= e(str_replace('-', '', $stay['tel'])) ?>"><?= e($stay['tel']) ?></a></span>
                </li>
<?php } ?>
              </ul>
            </div>
<?php } ?>
          </div>
        </section>

        <section class="studyTour__section" id="reservation">
<?php render_title_area('ご予約の流れ', 'reservation'); ?>
          <ol class="studyTour__steps">
<?php foreach ($steps as $step) { ?>
            <li class="studyTour__step is-mountain" data-readable>
              <h3 class="studyTour__stepTitle"><?= e($step['title']) ?></h3>
              <p><?= e($step['text']) ?></p>
            </li>
<?php } ?>
          </ol>
          <div class="studyTour__columns">
            <div class="studyTour__box" data-readable>
              <h3 class="studyTour__boxTitle">キャンセル料</h3>
              <p>お客様のご都合で取り消しとなる場合は、次のキャンセル料をいただきます。変更・取り消しは速やかにお申し出ください。</p>
              <table class="studyTour__table">
<?php foreach ($cancelFees as $row) { ?>
                <tr><th><?= e($row['when']) ?></th><td><?= e($row['fee']) ?></td></tr>
<?php } ?>
              </table>
            </div>
            <div class="studyTour__box" data-readable>
              <h3 class="studyTour__boxTitle">よくある質問</h3>
              <dl class="studyTour__faq">
<?php foreach ($faqs as $faq) { ?>
                <dt><?= e($faq['q']) ?></dt>
                <dd><?= $faq['a'] ?></dd>
<?php } ?>
              </dl>
            </div>
          </div>
        </section>

        <section class="studyTour__section" id="access">
<?php render_title_area('アクセス', 'access'); ?>
          <div class="studyTour__coast" data-readable>
            <p class="studyTour__coastText">越前海岸は、福井県敦賀市杉津から、坂井市三国町安島に至る海岸線です。日本海の荒波によって創られた奇岩断崖が続くリアス式海岸で、国定公園にも指定されています。私たちが暮らす福井市越前海岸は、北は東尋坊、南は越前蟹で有名な越前港の間に位置しています。</p>
            <figure class="studyTour__coastMap">
              <img src="<?= e(path('content/images/study-tour/map-coast.svg')) ?>" alt="越前海岸の略図。北は坂井市の東尋坊、南は越前町の越前港の間に、福井市の越前海岸が位置する" width="540" height="360" loading="lazy">
            </figure>
          </div>
          <div class="studyTour__box" data-readable>
            <h3 class="studyTour__boxTitle">県外から福井駅まで</h3>
            <table class="studyTour__table is-access">
<?php foreach ($access as $row) { ?>
              <tr><th><?= e($row['from']) ?></th><td><?= e($row['by']) ?></td><td><?= e($row['time']) ?></td></tr>
<?php } ?>
            </table>
            <p class="studyTour__note">福井駅から越前海岸の各地区へは、車で30〜40分ほどです。</p>
          </div>
        </section>

        <section class="studyTour__concierge" id="concierge" data-readable>
<?php if ($concierge) { ?>
          <figure class="studyTour__conciergeFigure">
            <img src="<?= e(path($concierge['img'])) ?>" alt="<?= e($concierge['title']) ?>" width="360" height="360" loading="lazy">
          </figure>
<?php } ?>
          <div class="studyTour__conciergeBody">
            <p class="studyTour__conciergeRole">越前海岸コンシェルジュ</p>
            <p class="studyTour__conciergeName"><?= e($concierge['title'] ?? '松平裕子') ?></p>
            <p>海の暮らしも、山の暮らしもある越前海岸。地域の資源を活かしながら、地域に根ざす事業者がさまざまな営みをしています。地元の方々とのふれあいや、今も息づくどこか懐かしい暮らしを通して、学んでみませんか。</p>
            <ul class="studyTour__ctas">
              <li><a class="moreLink" href="<?= e(path('')) ?>#contact"><span class="moreLink__label">コンシェルジュに問い合わせる</span></a></li>
              <li><a class="moreLink" href="<?= e(path(STUDY_TOUR_PAMPHLET)) ?>" target="_blank" rel="noopener"><span class="moreLink__label">パンフレットを見る（PDF）</span></a></li>
            </ul>
          </div>
        </section>
      </div>
    </main>
<?php render_footer(); ?>
