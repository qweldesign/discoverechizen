<?php
/**
 * お問い合わせの完了画面 (/thanks.html)
 * 確認画面から送信に成功すると thanks.html に遷移するので, .htaccess でこのファイルに振り分ける
 */
require_once dirname(__DIR__) . '/inc/partials/site.php';

render_header([
  'title'   => 'お問い合わせありがとうございました',
  'path'    => 'thanks.html',
  'noindex' => true,
]);
?>
    <main id="main" class="main">
      <h1 class="main__title">送信完了</h1>
      <div class="confirm">
        <p>お問い合わせありがとうございました。<br>内容を確認のうえ、折り返しご連絡いたします。</p>
        <p class="section__more"><a href="<?= e(path()) ?>">&gt;&gt;&gt; トップへ戻る</a></p>
      </div>
    </main>
<?php render_footer(); ?>
