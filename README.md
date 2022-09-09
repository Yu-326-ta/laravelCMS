# todo_list

## 環境構築方法
Laravelの環境を構築したいディレクトリで`git clone`を行い、フォルダを作成する  
docker compose.ymlファイルがあるディレクトリで以下のコマンドを順に打つ　　
1.`docker compose build`コマンドでコンテナイメージの作成   
2.`docker compose up -d`コマンドでバックグラウンドでコンテナを作成し起動    
3.`docker compose exec app composer install`コマンドでappコンテナにcomposer.jsonの記述されているものをインストール   
4.envファイルが.env.exmapleとして生成されているので.envファイルに名前を変更  
5.`docker compose exec app php artisan storage:link`コマンドでweb側からstorage下のファイルにアクセスできるようにする   
6.`docker compose exec app chmod -R 777 storage bootstrap/cache`コマンドでstorageとbootstrap/cacheディレクトリの権限を設定    
7.`docker compose exec app php artisan migrate:fresh --seed`コマンドでappコンテナに移動し、シーダーを実行。 　　
8.APP_KEYが設定されてないので、srcディレクトリ下で`sudo php artisan key:generate`コマンドでキーを生成  

srcディレクトリ下でphp artisan serveでアクセスするとLaravelの環境構築が出来ている。  