<?php
/**
 * 隊員ごとの記事一覧 (/member/xxx/, 2ページ目以降: /member/xxx/page/2/)
 * 上に隊員のプロフィール (content/members/xxx.md), 下にその隊員が書いた記事 (frontmatter の author に xxx を書いた記事) を並べる
 * 記事がない隊員はプロフィールだけを出す. URL は member/.htaccess のリライトで振り分ける
 * /member/ (隊員の指定なし) はトップページの「隊員紹介」へ転送する
 */
require_once dirname(__DIR__) . '/inc/templates/postList.php';

$slug = (string)($_GET['member'] ?? '');

if ($slug === '') {
  header('Location: ' . path('') . '#members', true, 301);
  exit;
}

$member = member($slug);

// パンくず (トップ > 隊員紹介 > 隊員の名前) とページ送りの設定
$navigation = [
  'parents'      => array_map(fn($crumb) => ['label' => $crumb['label'], 'path' => path($crumb['path'])], SITE_BREADCRUMB),
  'subdirLabel'  => '隊員紹介',
  'subdirPath'   => path('') . '#members',
  'pageUrl'      => member_url($slug, '%d'),
  'firstPageUrl' => member_url($slug),
];

// 書いた人で絞り込んだ記事一覧
$cms = content_engine(MEMBER_POST_TYPE, [
  'slug'       => null,
  'filter'     => fn(array $post) => in_array($slug, author_slugs($post['author'] ?? ''), true),
  'navigation' => $navigation,
]);

// 隊員が見つからない場合と, ページ番号が範囲外の場合は 404
$notFound = !$member || $cms->is_not_found();
$name = $member['title'] ?? '';
$pageNumber = $cms->get_page();

if ($notFound) {
  http_response_code(404);
  render_header(['title' => 'ページが見つかりません', 'path' => '', 'noindex' => true]);
?>
    <main id="main" class="main">
      <h1 class="main__title">ページが見つかりません</h1>
      <p>お探しのページは、削除されたか、URLが変更された可能性があります。</p>
      <p><a href="<?= e(path('')) ?>#members">隊員紹介へ</a></p>
    </main>
<?php
  render_footer();
  exit;
}

// プロフィールの最初の段落を description に使う (Markdown の記号とリンクを外す)
$profileText = trim(preg_split('/\n\s*\n/', trim($member['content'] ?? ''))[0] ?? '');
$profileText = preg_replace(['/!?\[([^\]]*)\]\([^)]*\)/', '/[*_`>#]/', '/\s+/'], ['$1', '', ' '], $profileText);

render_header([
  'title'       => $pageNumber > 1 ? "{$name}の記事 ({$pageNumber}ページ目)" : $name,
  'description' => mb_strimwidth($profileText, 0, 240, '…'),
  'path'        => member_path($slug, $pageNumber),
  'image'       => $member['img'] ?? '',
]);

$posts = $cms->get_posts();
$parsedown = new Parsedown();
?>
    <main id="main" class="main">
      <?= (new ContentNavigation($navigation))->breadcrumb(['title' => $name]) ?>
      <section class="memberProfile" data-readable>
<?php if (!empty($member['img'])) { ?>
        <img class="memberProfile__image" src="<?= e(path($member['img'])) ?>" alt="" width="240" height="240">
<?php } ?>
        <div class="memberProfile__body">
<?php if (!empty($member['role'])) { ?>
          <p class="memberProfile__role"><?= e($member['role']) ?></p>
<?php } ?>
          <h1 class="memberProfile__name"><?= e($name) ?></h1>
          <div class="memberProfile__text">
<?= $parsedown->text($member['content'] ?? '') ?>
          </div>
        </div>
      </section>

      <section class="memberPosts" aria-labelledby="memberPostsTitle">
        <h2 id="memberPostsTitle" class="memberPosts__title"><?= e($name) ?>の記事<?php if ($posts) { ?><span class="memberPosts__count"><?= (int)(member_post_counts()[$slug] ?? 0) ?>件</span><?php } ?></h2>
<?php if ($posts) { ?>
<?php render_post_list($posts, MEMBER_POST_TYPE); ?>
        <?= $cms->pagination() ?>
<?php } else { ?>
        <p class="memberPosts__empty">記事はまだありません。</p>
<?php } ?>
      </section>
    </main>
<?php render_footer(); ?>
