# お問い合わせフォーム
## 環境構築
Dockerビルド

1. git clone リンク
2. docker-compose up -d --build

＊MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせてdocker-compose.ymlファイルを編集して下さい。

Laravel環境構築

1. docker-compose exec php bash
2. composer install
3. env.exampleファイルから.envを作成し、環境変数を変更
4. php artisan key:generate
5. php artisan migrate
6. php artisan db:seed

## 使用技術
- PHP 7.4.9
- Laravel 8.83.29
- MySQL 8.0.26

## ER図
![画像](https://coachtech-lms-bucket.s3.ap-northeast-1.amazonaws.com/question/20250118141935_%E3%82%B9%E3%82%AF%E3%83%AA%E3%83%BC%E3%83%B3%E3%82%B7%E3%83%A7%E3%83%83%E3%83%88+2025-01-18%2014.19.09.png)

## URL
- 開発環境：http://localhost/
- phpMyAdmin：http://localhost:8080/