<?php
/**
 * memberList.php
 * © 2026 QWEL.DESIGN (https://qwel.design)
 * Released under the MIT License.
 * See LICENSE file for details.
 *
 * 隊員プロフィールの一覧 (.memberList). 隊員は members() で取得する
 * $class: 一覧に足すクラス (例: is-scroll でタブレット以下を横スクロールにする)
 */

require_once dirname(__DIR__) . '/partials/site.php';

function render_member_list(array $members, string $class = ''): void {
  if (!$members) return;
  $parsedown = new Parsedown();
?>
        <ul class="<?= e(trim('memberList ' . $class)) ?>">
<?php foreach ($members as $member) { ?>
          <li class="memberList__item" id="member-<?= e($member['slug'] ?? '') ?>" data-readable>
<?php if (!empty($member['img'])) { ?>
            <img class="memberList__image" src="<?= e(path($member['img'])) ?>" alt="" width="360" height="240" loading="lazy">
<?php } ?>
<?php if (!empty($member['role'])) { ?>
            <p class="memberList__role"><?= e($member['role']) ?></p>
<?php } ?>
            <h3 class="memberList__name"><?= e($member['title'] ?? '') ?></h3>
            <div class="memberList__text">
<?= $parsedown->text($member['content'] ?? '') ?>
            </div>
          </li>
<?php } ?>
        </ul>
<?php
}
