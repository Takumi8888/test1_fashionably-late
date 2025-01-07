<h1>お問い合わせフォーム</h1>

<h2>環境構築</h2>

<p>Dockerビルド</p>
<ol>
  <li>git clone <a tabindex="-1">https://github.com/Takumi8888/test1_fashionably-late.git</a></li>
  <li>cd test1_fashionably-late</li>
  <li>git remote set-url origin git@github.com:Takumi8888/test1_fashionably-late.git</li>
  <li>docker-compose up -d --build</li>
  <li>sudo chmod -R 777 src/*</li>
</ol>
<p>＊ MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせて docker-compose.yml ファイルを編集してください。</p>

<p>Laravel環境構築</p>
<ol>
  <li>docker-compose exec php bash</li>
  <li>cp .env.example .env</li>
  <li>chmod 777 .env</li>
  <li>.envファイルの環境変数を変更（docker-compose.yml参照）</li>
  <li>composer update</li>
  <li>php artisan key:generate</li>
  <li>php artisan migrate:fresh</li>
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
  <li>開発環境：<a>http://localhost/</a></li>
  <li>phpMyAdmin：<a>http://localhost:8080/</a></li>
</ul>
