<p align="center">
    <h1 align="center">Order module</h1>
</p>

Инструкция по локальному равертыванию
------------

В корне проекта создать .env файл путем копирования .env.example, там можно настроить:

- среду приложения (прод или дев);

- имя пользователя и пароль к БД, а также имя БД;

- порты по которым доступно приложение и phpMyAdmin, этим следует воспользоваться если в Вашей ОС порты 8080 и 8888 заняты.


Приложения разворачивается в докер контейнерах с помощью docker и docker-compose.
Если у Вас не установлен Docker, то следует его установить.

Установка docker и docker-compose на Ubuntu Linux
------------

`sudo apt-get install \
    apt-transport-https \
    ca-certificates \
    curl \
    gnupg-agent \
    software-properties-common`

`curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -`

`sudo apt-key fingerprint 0EBFCD88`

`sudo add-apt-repository \
   "deb [arch=amd64] https://download.docker.com/linux/ubuntu \
   $(lsb_release -cs) \
   stable"`

`sudo apt-get update`

`sudo apt-get install docker-ce docker-ce-cli containerd.io`

`sudo curl -L "https://github.com/docker/compose/releases/download/1.24.0/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose`
`sudo chmod +x /usr/local/bin/docker-compose`

Установка docker и docker-compose на Windows
------------

Скачать:
https://download.docker.com/win/stable/DockerToolbox.exe

Установить

Запустить Docker Quickstart Terminal, управление происходит через него. Команды те же, что и на Ubuntu только sudo
Обращение к контейнерам по адресу указанному в Docker Quickstart Terminal

ПРИМЕЧАНИЕ
Папка с проектом должна находиться в домашней директории пользователя C:\Users\username для того, чтобы докер
смог её увидеть и примонтировать

Установка проекта
------------

Для запуска нужно перейти в корневую папку проекта и выполнить

sudo docker-compose up -d --build

После успешного запуска контейнеров нужно выполнить следующие команды:

sudo docker exec -it php php init

sudo docker exec -it php composer install

sudo docker exec -it php php yii migrate

sudo docker-compose restart

По-умолчанию проект доступен по следующей ссылке http://localhost:8080/

Для доступа к БД можно использовать phpMyAdmin, он доступен по адресу http://localhost:8888/
