<?php
/**
 * サイトの設定
 * サイト名や URL, 投稿タイプなど, サイトごとに変わる値はここにまとめる
 * (inc/ 以下のエンジン・テンプレートには, サイト固有の値を書かない)
 */

// 日付の判定・表示のタイムゾーン
date_default_timezone_set('Asia/Tokyo');

// サイト名 (<title> の「記事タイトル | サイト名」と og:site_name に使う)
const SITE_NAME = '越前海岸盛り上げ隊';
// トップページの <title>
const SITE_HOME_TITLE = '海！山！里！地域の魅力を再発見！ - 越前海岸盛り上げ隊';
// サイトの URL (末尾のスラッシュなし. OGP, canonical の絶対URLに使う)
const SITE_URL = 'https://proto.discoverechizen.com'; // 暫定 (本番は https://discoverechizen.com)
// サイトのルートのパス (ドメイン直下なら '/'. 例: /tools/simple-cms/ に置く場合)
const SITE_ROOT = '/';
// サイトの説明 (description の既定値)
const SITE_DESCRIPTION = '福井市越前海岸は、どこにでもある、新しい海辺。福井県敦賀市杉津から、坂井市三国町安島に至る海岸線です。目の前に日本海の広がるこの地には、のんびりと流れる時間があります。越前海岸盛り上げ隊は、越前海岸の「いま」をできるだけ面白くしようと奮闘する大人たちの集まりです。';
// OGP 画像の既定値 (サイトのルートからのパス)
const SITE_OGP_IMAGE = 'assets/photos/main00.jpg';
// 記事一覧のサムネイルの既定値 (記事にアイキャッチがない場合)
const SITE_THUMBNAIL_IMAGE = 'assets/photos/main00.jpg';
// Google Fonts などの読み込み (不要なら空文字)
const SITE_FONTS_URL = '';
// 言語
const SITE_LANG = 'ja';

// ヘッダーのロゴ (画像のパスとリンク先. 画像がなければ SITE_NAME を文字で出す)
const SITE_LOGO = 'assets/logo/discover-echizen-coast-wide.svg';
const SITE_LOGO_LINK = '';
// トップページのメインギャラリーの中央のロゴ
const SITE_HERO_LOGO = 'assets/logo/discover-echizen-coast-lg.svg';
// メインギャラリーの写真 (サイトのルートからのパス. 並び順に表示する)
const SITE_HERO_PHOTOS = [
  'assets/photos/main00.jpg',
  'assets/photos/main01.jpg',
  'assets/photos/main02.jpg',
  'assets/photos/main03.jpg',
  'assets/photos/main04.jpg',
  'assets/photos/main05.jpg',
];
// メインギャラリーの切り替え間隔 (ミリ秒)
const SITE_HERO_INTERVAL = 5000;
// フッターのロゴ (不要なら空文字)
const SITE_FOOTER_LOGO = 'assets/logo/discover-echizen-coast-wide.svg';

// ヘッダーのナビ (サイトのルートからのパス => 表示名. 不要なら空の配列)
const SITE_NAV = [];

// パンくずの先頭の階層 (path はサイトのルートからのパス, または http から始まる URL)
const SITE_BREADCRUMB = [
  ['label' => 'トップ', 'path' => ''],
];

// フッターのリンク (サイトのルートからのパス => 表示名)
const SITE_FOOTER_LINKS = [];

// フッターの SNS など (icon は icons.svg の symbol の id)
const SITE_SNS = [];

// 著作権表示 (開始年 - 今年 運営者)
const SITE_OWNER = '福井市越前海岸盛り上げ隊';
const SITE_START_YEAR = 2015;

/**
 * 投稿タイプ
 * キー: 投稿タイプの名前
 * label: 表示名 (一覧の見出し, パンくず)
 * path: 一覧の URL (サイトのルートからのパス. 同じ名前のディレクトリに index.php と .htaccess を置く)
 * dir: Markdown を置くディレクトリ (サイトのルートからのパス)
 * list: 一覧ページをサイトマップに載せるか (規定で true)
 * count: 一覧の1ページあたりの件数 (null で全件)
 * show_date: 日付を表示するか
 * lead: 一覧の見出しの下の文
 * en: 見出しの上に重ねる英語 (トップのセクションと一覧ページの見出し. 不要なら空文字)
 */
const SITE_POST_TYPES = [
  'blog' => [
    'label'     => 'ブログ&ニュース',
    'en'        => 'blog & news',
    'path'      => 'blog-and-news/',
    'dir'       => 'content/blog',
    'count'     => 10,
    'show_date' => true,
    'lead'      => '',
  ],
  // 固定ページ (日付を出さず, 一覧は全件を1ページに出す)
  'page' => [
    'label'     => 'ページ',
    'path'      => 'page/',
    'dir'       => 'content/page',
    'count'     => null,
    'show_date' => false,
    'lead'      => '',
  ],
];

// 隊員のプロフィール (記事の author に書いた slug と同じ名前の Markdown を置くディレクトリ)
// 記事の下の「この記事を書いた人」に使う. 不要なら空文字
const SITE_MEMBERS_DIR = 'content/members';

// トップページのバナーエリア (スライダー)
// url: リンク先 (サイトのルートからのパス, または http から始まる URL. 外部リンクは別タブで開く)
// img: 画像 (サイトのルートからのパス, または http から始まる URL. 外部サイトは各サイトの OGP 画像)
const SITE_BANNERS = [
  ['title' => '越前海岸盛り上げ隊とは', 'url' => 'about-us/', 'img' => 'assets/banners/members.jpg'],
  ['title' => '海辺の古民家はりいしゃ', 'url' => 'https://hariisha.jp/', 'img' => 'assets/banners/hariisha-jp.jpg'],
  ['title' => '国見 海・人・暮らし相談室', 'url' => 'https://kunimi.life/', 'img' => 'assets/banners/kunimi-life.jpg'],
  ['title' => 'つるつるいっぱい浜ラジオ', 'url' => 'blog-and-news/podcast-start/', 'img' => 'assets/banners/podcast.jpg'],
];

// 投稿タイプ以外のページ (サイトのルートからのパス. サイトマップに載せる)
const SITE_PAGES = [
  'about-us/',
];

// URL の形式 (false: ?slug=xxx, ?page=2 / true: xxx/, page/2/ ※ .htaccess のリライトが必要)
const SITE_PRETTY_URLS = true;
