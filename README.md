# SAM – Official Artist Website

Официальный сайт молдавского артиста SAM и его музыкального лейбла.

## Цель проекта

Создание современного промо-сайта с возможностями:
- Прослушивание треков и альбомов
- Покупка цифровых релизов (в будущем — с корзиной и оплатой)
- Просмотр и покупка мерча
- Отслеживание дат и городов тура
- Связь с менеджером артиста
- Многоязычная поддержка (в процессе)
- Панель администратора для управления контентом

В дальнейшем планируется:
- Интеграция Telegram-сообщества
- Полноценная корзина и онлайн-оплата
- Личный кабинет слушателя
- Уведомления о новых релизах и концертах

## Технологии

- Laravel 11
- Filament 4 (админ-панель)
- Laravel Livewire + Alpine.js
- Tailwind CSS
- Vite
- Docker + Apache
- MySQL
- Spatie Laravel Translatable (многоязычность)

## Установка и запуск (Docker)

### 1. Клонирование и базовая настройка

```bash
git clone <repository_name>
cd music-website-sam
```
### 2. Изменить данные сервера, зависимостей и базы данных при необходимости
- docker-compose.yml
- Dockerfile

# Запуск контейнеров

```bash
docker-compose up -d --build
```
### 3. Настраиваем и устанавливаем необходимые компоненты

## переходим в контейнер с одного терминала и настраиваем

```bash
docker exec -it container_name bash

cp .env.example .env
```
В файле .env указываем данные актуальной базы данных и другие настройки прмиеняем


```bash
git config --global --add safe.directory /var/www/html

composer install

composer require filament/filament:"^4.0"
php artisan filament:install --panels

npm install tailwindcss @tailwindcss/vite

php artisan install:api

composer require spatie/laravel-translatable
```

## переходим в контейнер с другого терминала и запускаем сам сервер


```bash
composer install (or composer update)

npm install

npm run dev

php artisan key:generate
php artisan storage:link
php artisan migrate
```
Команды для очистки кешов, логов и оптимизации:
- php artisan config:clear
- php artisan cache:clear (won't work without existing SQL table)
- php artisan route:clear
- php artisan view:clear