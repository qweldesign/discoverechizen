<?php
/**
 * お問い合わせの確認画面 (/confirm.html)
 * トップページのフォーム (qwel-tools-contact-form) が confirm.html に遷移するので, .htaccess でこのファイルに振り分ける
 * 送信は api/send.php (設定は api/.env)
 */
require_once dirname(__DIR__) . '/inc/partials/site.php';

render_header([
  'title'   => 'お問い合わせ内容の確認',
  'path'    => 'confirm.html',
  'noindex' => true,
]);
?>
    <main id="main" class="main">
      <h1 class="main__title">お問い合わせ内容の確認</h1>
      <p class="main__lead">以下の内容で送信します。よろしければ「送信する」を押してください。</p>
      <div id="confirm" class="confirm">
        <table data-contact-confirm></table>
        <input type="submit" value="送信する" data-contact-send>
        <input type="button" value="前画面に戻る" data-contact-back>
      </div>
    </main>
<?php render_footer(); ?>
