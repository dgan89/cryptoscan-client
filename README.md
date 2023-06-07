CryptoScan
=======================================================

[CryptoScan](https://cryptoscan.one) — Принимайте USDT TRC20 на свой личный счёт

- Приватность
- Функциональный API
- Деньги под Вашим контролем

Установка
------------
Устанавливать рекомендуется через composer выполнив:

	composer cryptoscan/client "~1.0.0"

Использование
-----

### Аутентификация

https://cryptoscan.one/developer/index#auth

```php
$publicKey = '...';
$privateKey = '...'

// Аутентификация по приватному ключу
$auth = AuthFactory::privateKey($publicKey, $privateKey);

// Аутентификация по подписи
$auth = AuthFactory::signature($publicKey, $privateKey);
```

### Создание Инвойса

https://cryptoscan.one/developer/index#invoice-creating

```php
$auth = AuthFactory::signature($publicKey, $privateKey);
$client = new CryptoScanClient($auth);

// Стандартный вызов
$command = new InvoiceCreate(10, '123');
$result = $client->invoiceCreate($command);

// Добавление дополнительных данных
$command = new InvoiceCreate(10, '123');
$command->setMetadata('Example text');
$result = $client->invoiceCreate($command);
```

### Создание Виджета для Инвойса

https://cryptoscan.one/developer/index#invoice-widget-creating

```php
...
// Стандартный вызов
$command = new WidgetCreate(10, '123');
$result = $client->widgetCreate($command);

// Добавление дополнительных данных
$command
    ->setBackUrl('https://')
    ->setCancelUrl('https://')
    ->setWidgetDescription('Description');
$result = $client->widgetCreate($command);
```

### Просмотр Инвойса

https://cryptoscan.one/developer/index#invoice-view

```php
...
$invoiceId = 123456;
$result = $client->invoiceDetail($invoiceId);
```

### Поиск Инвойса

https://cryptoscan.one/developer/index#invoice-find

```php
...
$query = 123456;
// $query = '123456';
$result = $client->invoiceSearch($query);
```

### Просмотр информации о пользователе

https://cryptoscan.one/developer/index#user-info-view

```php
...
$result = $client->userDetail();
```

Данные ответа
-----

| Модель                     | Экземпляр класса                   | 
|----------------------------|------------------------------------|
| Созданный инвойс  | InvoiceCreatedInterface |
| Детальная информация по инвойсу | InvoiceDetailedInterface |
| Список инвойсов       | InvoiceListInterface |
| Информация по пользователю         | UserDetailInterface |
| Созданный виджет          | WidgetCreatedInterface |

Обработка ошибок
-----

### Исключения

| Модель                     | Экземпляр класса                   | 
|----------------------------|------------------------------------|
| Интерфейс всех исключений  | ClientExceptionInterface |
| Ошибка передаваемых данных | InvalidDataException |
| Не корректные данные       | InvalidArgumentException |
| Ошибка авторизации         | AuthFailureException |
| Остальные ошибки           | ClientFailureException |

HTTP клиент
-----

### Использование своего HTTP клиента

По умолчанию запросы отправляются через Guzzle. Для подключения своего HTTP клиента:

```php
// Создание своего HTTP клиента
class MyHTTPClient impliments HttpClientInterface
{
    ...
}
$httpClient = new MyHTTPClient();
// Создание провайдера данных
$provider = ProviderFactory::http($httpClient);
$client = new CryptoScanClient($auth, $provider);
```

WebHook
-----

### Обработка ответа платежа от сервера
```php
// Заголовок переданного запроса
$headers = [
    'public-key' => '...',
    'signature' => '...',
//    'private-key' => '...',
];

// Тело запроса
$data = [
    'event_type' => 'paid',
    'retry_count' => 3,
    ...
];

// Формирование WebHook запроса
$webHookData = new WebHookRequest($headers, $data);

$auth = AuthFactory::privateKey($publicKey, $privateKey);
$webHookHandler = new WebHookHandler($auth);
$message = $webHookHandler->handle($webHookData);
```
### Использование своего способа получения данных

```php
class MyWebHookData impliments WebHookDataInterface
{
    ...
}
$webHookData = new MyWebHookData($headers, $data);
....
```


### Доступные типы сообщений

| Модель                     | Экземпляр класса                   | 
|----------------------------|------------------------------------|
| Оплаченный платеж  | WebHookPaid |
| Просроченный платеж | WebHookExpired |
