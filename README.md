<h1>お問い合わせフォーム</h1>

<h2>環境構築</h2>

<p>Dockerビルド</p>
<ol>
  <li>git@github.com:Takumi8888/test1_fashionably-late.git</li>
  <li>docker-compose up -d --build</li>
  <li>sudo chmod -R 777 src/*</li>
</ol>
<p>＊ MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせて docker-compose.yml ファイルを編集してください。</p>

<p>Laravel環境構築</p>
<ol>
  <li>docker-compose exec php bash</li>
  <li>.env.example ファイルから.envを作成し、環境変数を変更</li>
  <li>composer update</li>
  <li>php artisan key:generate</li>
  <li>php artisan migrate</li>
  <li>php artisan db:seed</li>
</ol>

<h2>使用技術</h2>
<ul>
  <li>PHP 8.1.31</li>
  <li>Laravel 10.48.25</li>
  <li>MySQL 8.0.40</li>
</ul>

<h2>URL</h2>
<ul>
  <li>開発環境：<a href="">http://localhost/</a></li>
  <li>phpMyAdmin：<a href="">http://localhost:8080/</a></li>
</ul>
