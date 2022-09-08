# todo_list

## 環境構築方法
Laravelの環境を構築したいディレクトリでgit cloneを行い、フォルダを作成する  
docker compose.ymlファイルがあるディレクトリで以下のコマンドを順に打つ　　
1.docker compose buildコマンドでコンテナイメージの作成   
2.docker compose up -dコマンドでバックグラウンドでコンテナを作成し起動    
4.docker compose exec app composer installコマンドでappコンテナにcomposer.jsonの記述されているものをインストール   
5.envファイルが.env.exmapleとして生成されているので.envファイルに名前を変更  
6.docker compose exec app php artisan storage:linkコマンドでweb側からstorage下のファイルにアクセスできるようにする   
7.docker compose exec app chmod -R 777 storage bootstrap/cacheコマンドでstorageとbootstrap/cacheディレクトリの権限を設定    
8.docker compose exec app php artisan migrate:fresh --seedコマンドでappコンテナに移動し、シーダーを実行。 　　
9.APP_KEYが設定されてないので、srcディレクトリ下でsudo php artisan key:generateコマンドでキーを生成  

srcディレクトリ下でphp artisan serveでアクセスするとLaravelの環境構築が出来ている。  