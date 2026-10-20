<?php
/**
 * postAuthor.php
 * © 2026 QWEL.DESIGN (https://qwel.design)
 * Released under the MIT License.
 * See LICENSE file for details.
 *
 * 記事の下の「この記事を書いた人」(.postAuthor)
 * 記事の frontmatter の author に書いた slug から, SITE_MEMBERS_DIR のプロフィールを表示する
 */

require_once dirname(__DIR__) . '/partials/site.php';

// 記事の下の「この記事を書いた人」(.postAuthor). 隊員は post_authors() で取得する
function render_post_author(array $members): void {
  if (!$members) return;
  $parsedown = new Parsedown();
?>
          <section class="postAuthor" aria-labelledby="postAuthorTitle">
            <h2 id="postAuthorTitle" class="postAuthor__title">この記事を書いた人</h2>
<?php foreach ($members as $member) { ?>
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
            </div>
<?php } ?>
          </section>
<?php
}
