# Symfony-test

[![Build Status](https://scrutinizer-ci.com/g/bizcloud/symfony-test/badges/build.png?b=master)](https://scrutinizer-ci.com/bizcloud/symfony-test/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/bizcloud/symfony-test/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/bizcloud/symfony-test/code-structure/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bizcloud/symfony-test/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bizcloud/symfony-test/code-structure/master)

## Requirements

OS Ubuntu

## Installation

```bash
$ mkdir -p /var/www/ & cd /var/www
$ git clone https://github.com/bizcloud/symfony-test
$ cd symfony-test
```

## Run project (with docker)

On first run :

```bash
$ make install
```

On next runs :

```bash
$ make start
```

http://localhost/

## Run phpunit tests + api spec compliance tests + qa tools (with docker)

```bash
$ make ci
```

# Тестовое задание для PHP-разработчика

## Описание задачи
Необходимо написать web-приложение для продажи подержанных авто. (auto.ru)
Структура базы должна позволять хранить: возможные характеристики автомобиля, объявления о продаже.

Возможные действия:
- Поиск автомобилей по фильтрам (марка, год выпуска, страна производитель, и т. п. - 3 любых будет достаточно)
- Просмотр конкретного объявления выбранного из списка
- Добавление/Редактирование/Удаление объявления о продаже (предположим что вы администратор и можете делать все эти действия)

## Технические требования
* Приложение должно быть написано на PHP 7 +
* Фреймворк Symfony
* Обязательно использование try catch и транзакций
* Обязательно писать код в структуре mvc
* Приложение должно учитывать, что база данных может быть
недоступна, или же, какой-то таблицы может не оказаться
* Результат задания должен быть выложен на github или прислан в виде
архива, должна быть инструкция по запуску проекта.
