<?php
/**
 * historyTimeline.php
 * © 2026 QWEL.DESIGN (https://qwel.design)
 * Released under the MIT License.
 * See LICENSE file for details.
 *
 * 沿革の年表 (.history)
 * 左に今の年を大きく固定し (PC のみ), 右に縦の線と各年を並べる
 * 動き (線が満ちる, 写真が開く, 年号が切り替わる, 背景の海が満ちてくる) は js/history-timeline.js が付ける
 * JS が動かない・動きを減らす設定のときは, 最初から全部表示する
 *
 * $items: 古い順の年の配列. 1年に見出し・本文・写真の組 (entry) を複数置ける
 *   ['year' => '2020', 'entries' => [['title', 'text', 'img', 'alt'], ...]]
 *   entries を書かずに title, text, img, alt を直接書いた年は, 1組として扱う
 *   text は文字列か, 段落の配列
 */

require_once dirname(__DIR__) . '/partials/site.php';

// 年の entries を取り出す (entries がなければ, 年に直接書いた title などを1組とみなす)
function history_entries(array $item): array {
  if (!empty($item['entries'])) return $item['entries'];
  return [array_intersect_key($item, array_flip(['title', 'text', 'img', 'alt']))];
}

function render_history_timeline(array $items): void {
  if (!$items) return;
  $figureCount = 0; // 写真のある組の通し番号 (PC で写真の左右を交互にする)
?>
        <div class="history" data-history>
          <canvas class="history__sea" data-history-sea aria-hidden="true"></canvas>
          <p class="history__current" aria-hidden="true"><span data-history-year><?= e($items[0]['year']) ?></span></p>
          <ol class="history__list">
<?php foreach ($items as $item) { ?>
            <li class="history__item" data-history-item data-year="<?= e($item['year']) ?>">
              <p class="history__year"><?= e($item['year']) ?></p>
<?php foreach (history_entries($item) as $entry) {
  $hasFigure = !empty($entry['img']);
  $classes = 'history__entry' . ($hasFigure ? ' has-figure' : '') . ($hasFigure && $figureCount++ % 2 === 1 ? ' is-reverse' : '');
  $paragraphs = is_array($entry['text'] ?? '') ? $entry['text'] : [$entry['text'] ?? ''];
?>
              <div class="<?= $classes ?>" data-history-entry>
                <div class="history__body">
<?php if (!empty($entry['title'])) { ?>
                  <h3 class="history__title"><?= e($entry['title']) ?></h3>
<?php } ?>
<?php foreach (array_filter($paragraphs) as $paragraph) { ?>
                  <p class="history__text"><?= e($paragraph) ?></p>
<?php } ?>
                </div>
<?php if ($hasFigure) { ?>
                <figure class="history__figure">
                  <img src="<?= e(path($entry['img'])) ?>" alt="<?= e($entry['alt'] ?? '') ?>" width="720" height="405" loading="lazy">
                </figure>
<?php } ?>
              </div>
<?php } ?>
            </li>
<?php } ?>
          </ol>
        </div>
<?php
}
