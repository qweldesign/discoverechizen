<?php
/**
 * postAuthor.php
 * © 2026 QWEL.DESIGN (https://qwel.design)
 * Released under the MIT License.
 * See LICENSE file for details.
 *
 * 記事の下の「この記事に出てきた人」と「この記事を書いた人」(.postAuthor)
 * 記事の frontmatter の author に書いた slug から, SITE_MEMBERS_DIR のプロフィールを表示する
 * author の最後の slug が書いた人, それより前の slug が記事に出てきた人
 *   例: author: "wataru-hasegawa, yoko-hasegawa, taigo-ito"
 *       → 出てきた人: wataru-hasegawa, yoko-hasegawa / 書いた人: taigo-ito
 * どちらも同じ形 (写真・肩書き・名前・紹介文) で載せ, 出てきた人を先に, 書いた人を最後に並べる
 * プロフィールの下に, 隊員ごとの記事一覧 (/member/xxx/) へのリンクを置く
 */

require_once dirname(__DIR__) . '/partials/site.php';

// 記事の author から, 書いた人と出てきた人に分けて取得する (プロフィールのファイルがない slug は飛ばす)
// 返り値: ['writer' => 隊員 or null, 'featured' => [隊員, ...]]
function post_author_roles(string $author): array {
  $slugs = SITE_MEMBERS_DIR === '' ? [] : author_slugs($author);
  $writerSlug = array_pop($slugs);
  return [
    'writer'   => $writerSlug === null ? null : member($writerSlug),
    'featured' => array_values(array_filter(array_map('member', $slugs))),
  ];
}

// 記事の下の「この記事に出てきた人」「この記事を書いた人」. 隊員は post_author_roles() で取得する
function render_post_author(array $roles): void {
  $writer = $roles['writer'] ?? null;
  $featured = $roles['featured'] ?? [];
  if (!$writer && !$featured) return;
?>
          <div class="postAuthor">
<?php if ($featured) { ?>
            <section class="postAuthor__section" aria-labelledby="postAuthorFeatured">
              <h2 id="postAuthorFeatured" class="postAuthor__title">この記事に出てきた人</h2>
<?php foreach ($featured as $member) render_post_author_item($member); ?>
            </section>
<?php } ?>
<?php if ($writer) { ?>
            <section class="postAuthor__section" aria-labelledby="postAuthorWriter">
              <h2 id="postAuthorWriter" class="postAuthor__title">この記事を書いた人</h2>
<?php render_post_author_item($writer); ?>
            </section>
<?php } ?>
          </div>
<?php
}

// 隊員1人分のプロフィール (写真・肩書き・名前・紹介文と, 記事一覧へのリンク)
function render_post_author_item(array $member): void {
  static $parsedown = null;
  $parsedown ??= new Parsedown();
?>
              <div class="postAuthor__item">
                <div class="postAuthor__header">
<?php if (!empty($member['img'])) { ?>
                  <img class="postAuthor__image" src="<?= e(path($member['img'])) ?>" alt="" width="80" height="80" loading="lazy">
<?php } ?>
                  <div class="postAuthor__heading">
<?php if (!empty($member['role'])) { ?>
                    <p class="postAuthor__role"><?= e($member['role']) ?></p>
<?php } ?>
                    <p class="postAuthor__name"><?= e($member['title'] ?? '') ?></p>
                  </div>
                </div>
                <div class="postAuthor__text">
<?= $parsedown->text($member['content'] ?? '') ?>
                </div>
                <p class="postAuthor__more"><a class="moreLink" href="<?= e(member_url($member['slug'] ?? '')) ?>"><span class="moreLink__label"><?= e($member['title'] ?? '') ?>の記事一覧</span></a></p>
              </div>
<?php
}
