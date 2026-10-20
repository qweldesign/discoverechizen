# 越前海岸盛り上げ隊 | DISCOVER ECHIZEN COAST

海！山！里！地域の魅力を再発見！ - 越前海岸盛り上げ隊

[https://discoverechizen.com](https://discoverechizen.com) 

※ このリポジトリは、[QWEL Markdown Engine (Simple CMS)](https://github.com/qweldesign/qwel-tools-md-engine) を使用して制作しています。  

---

## 構成 | Structure

```
config.php            サイトの設定 (サイト名, ナビ, 投稿タイプ, お問い合わせフォームの項目など)
index.php             トップページ (メインギャラリー, 私たちについて, ブログ&ニュース, 隊員紹介, 私たちの活動, お問い合わせ)
blog-and-news/        ブログ&ニュース (一覧 /blog-and-news/, 個別記事 /blog-and-news/xxx/)
page/                 固定ページ (/page/xxx/)
about-us/             越前海岸盛り上げ隊とは (団体の紹介と沿革の年表)
study-tour/           教育旅行
contact/              お問い合わせフォームの確認・完了画面 (/contact/confirm/, /contact/thanks/)
api/                  記事の API (posts.php), お問い合わせフォームの送信 (send.php)
inc/                  エンジン・テンプレート, Composer (PHPMailer), .env
sitemap.php           サイトマップ (/sitemap.xml. content/ から自動で作る)
assets/               ロゴ・メインギャラリーの写真・OGP 画像など
ogp/                  OGP 画像・バナー画像の制作用ページ
scss/                 スタイル (style-1.0.scss → style-1.0.css)
```

- サイト名・ナビ・投稿タイプ・メインギャラリーの写真などは `config.php` にまとめている
- ヘッダー・フッター・OGP・Google タグは `inc/partials/site.php` で共通化している
- URL は各ディレクトリの `.htaccess` のリライト (Apache の mod_rewrite) で振り分ける。`content/`, `inc/`, `config.php` は直接のアクセスを禁止している
- スタイルシートを更新したときは, ファイル名のバージョン (`style-1.0.css`) を上げてブラウザのキャッシュを避ける

---

## コンテンツ | Contents

原稿 (Markdown) と写真は別のリポジトリ (`discoverechizen-content`) で管理し, `content/` に置く。このリポジトリには `content/.htaccess` だけを含めている (`.gitignore` 済み)。

```
content/
  blog/*.md       ブログ&ニュース
  page/*.md       固定ページ
  members/*.md    隊員のプロフィール (トップの「隊員紹介」と, 記事の下の「この記事を書いた人」)
  history/*.md    沿革 (/about-us/ の年表)
  banners/*.md    トップの「私たちの活動」のバナー (スライダー)
  images/         原稿用の画像 (images/.htaccess で画像の拡張子のファイルだけを公開する)
```

原稿の冒頭に frontmatter を書く。値の後ろにコメント (`# ...`) は書けない (値の一部として読み込まれる)。

| 種類 | frontmatter |
| --- | --- |
| ブログ&ニュース | `title`, `slug` (URL に使う英数字), `date` (並び順), `img` (アイキャッチ・OGP 画像), `summary` (一覧・description), `author` (隊員の slug. カンマ区切りで複数可), `draft: "true"` (下書き) |
| 固定ページ | `title`, `slug`, `summary`, `img` |
| 隊員 | `title` (名前), `slug` (ブログの `author` と合わせる), `order` (並び順), `role` (肩書き), `img`. 本文はプロフィール |
| 沿革 | `year`, `order` (同じ年の中の並び順), `heading`, `img`, `alt`. 本文は Markdown |
| バナー | `title` (画像の alt), `url` (サイトのルートからのパス, または http から始まる URL. 外部リンクは別タブ), `img` (1200 × 630), `order` (小さい順) |

- 本文中の画像・リンクは `/content/images/...` のようにサイトのルートからのパスで書く (`./content/images/...` でもよい)
- ブログの slug に `page` は使えない (ページ送りの `/blog-and-news/page/2/` と重なるため)
- 読み込むディレクトリは `config.php` の `SITE_POST_TYPES`, `SITE_MEMBERS_DIR`, `SITE_HISTORY_DIR`, `SITE_BANNERS_DIR` で変えられる

---

## お問い合わせフォーム | Contact Form

トップページのフォーム (`#contact`) → 確認画面 `/contact/confirm/` → 送信 `api/send.php` (PHPMailer) → 完了画面 `/contact/thanks/`。入力内容は SessionStorage で確認画面へ受け渡す (`js/contact-form.js`)。

1. `inc/.env.example` を `inc/.env` にコピーし, 宛先・SMTP の設定を書き換える (`.env` は Git に含めない)
2. `inc/` で `composer install` を実行し, PHPMailer を `inc/vendor/` に入れる
3. 項目・説明文・自動返信の署名などは `config.php` の `SITE_CONTACT`, `SITE_CONTACT_FIELDS` で設定する

- 迷惑メール対策: Origin / Referer のチェック, 見えない入力欄 (ハニーポット), 同じセッションからの送信間隔の制限 (`SITE_CONTACT` の `interval` 秒)
- 設定に不備があると `api/send.php` は 500 を返し, 内容をサーバーのエラーログに残す

---

## API

- 一覧: `api/posts.php?type=blog&page=1&count=10` → `{ type, page, totalPages, total, posts: [{ title, slug, date, summary, img, url }] }`
- 個別記事: `api/posts.php?type=blog&slug=xxx` → `{ title, slug, date, summary, img, url, content }`

---

## ライセンス | License

### コード部分 | Code

MIT License

詳しくは LICENSE ファイルをご覧ください。  
See the LICENSE file for details.

### 写真・文章・その他コンテンツ | Contents

写真・文章・その他コンテンツの著作権は全て、福井市越前海岸盛り上げ隊に帰属します。  
複製・再利用・再配布は、明示的な許可なしには認められていません。

All copyrights in the photos, texts, and other content belong to Discover Echizen Coast.  
Reproduction, reuse, or redistribution without explicit permission is prohibited.

---

## 制作者 | Author

[QWEL.DESIGN](https://qwel.design)  
福井を拠点に活動するフロントエンド開発者  
Front-end developer based in Fukui, Japan
