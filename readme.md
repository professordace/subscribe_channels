## Подписные каналы

###Требования
- PHP >= 7.2
- Mysql

###Установка
Для установки, выполните следующие пункты в папке проекта:

1) composer install
2) .env прописываем данные для БД
3) php artisan migrate
4) php artisan db:seed

<b>Данные для входа по умолчанию</b>:  
Login: testuser@test.com  
Pass: test123

Страница редактирования списка подписок пользователя:  
<b>http://\<your_domain\>/channels</b>