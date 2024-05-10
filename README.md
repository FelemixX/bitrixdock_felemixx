Сборка, сделанная для моих нужд на основе bitrixdock. Вся основная документация тут:
https://github.com/bitrixdock/bitrixdock

Для корректной работы под windows - клонируем проект внутрь файловой системы WSL -> запускаем docker compose up -d внутри WSL -> пользуемся

Привязки контейнеров к портам
1) Nginx\Apache: 80
2) Mailhog: 8025
3) PHPMyAdmin: 8080 (закомментирован в docker-compose. Раскомментировать при надобности)
4) MySQL: 3306
5) Cron: 80 (закомментирован в docker-compose. Раскомментировать при надобности)

Маппинг xdebug
1) Абсолютный путь до корня сайта на сервере /var/www/bitrix/
2) Путь до проекта на моем примере \\wsl$\Ubuntu\home\UserName\PhpstormProjects\YourProject\www

Путь куда профилировщик по умолчанию складывает свои файлы
1) В контейнере /var/log/php/
2) В проекте /logs/php/

Включение профилировщика
1) Для включения профилировщика зайти в папку с php. Открыть php.ini -> в xdebug.mode добавить profile -> раскомментировать строки xdebug.output_diк \ xdebug.start_upon_error \ xdebug.start_with_request

Настройка cron
1) Для указания версии PHP на которой работает cron - указать версию пакета согласно репозиторию php в переменной CRON_PHP_VERSION (см. пример в .env.example)
