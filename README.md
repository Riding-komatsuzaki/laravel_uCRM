# uCRM

PHP 自作

## 概要

営業管理ツールの CRM を作成しました。

管理者ユーザと一般ユーザに分け、
それぞれでログインできるようにしています。

## インストール

composer install<br>
npm install && npm run dev<br>
.env.example を .env にコピー<br>
.env の DB 関連、sanctum, session などの情報を編集<br>
php artisan key:generate<br>

## 開発中の簡易サーバー

サーバー側<br>
php artisan serve <br>

フロント側 (vite)<br>
npm run dev<br>

## 使い方

管理者ユーザ

ユーザー一覧がが見れるようにしています。

テストアカウント：

メールアドレス →testAdmin@test.com

パスワード →password123

一般ユーザ

商品管理、商品登録、顧客管理、購買履歴、データ分析ができるようになっています。

テストアカウント：
test01@test.com
test02@test.com
test03@test.com
test04@test.com
test05@test.com

メールアドレス →test.test@com.jp

パスワード →password123

## 環境

MAMP/MySQL/PHP/Vue.js/tailwindCSS

## データベース

データベース名：laravel_ucrm

テーブル

お使いの phpMyAdmin に上のデータベースを作り、ターミナルで php artisan migrate:fresh --seed のコマンドを叩けばお使いいただけます。
