# Тестовое задание для LeadMedia

## Для развертывания необходим PHP 8.1+

## Инструкция по развертыванию:

- Создать файл .env на основе .env.example
- composer install
- composer dump-autoload
- npm install
- npm run build
- php artisan key
- php artisan migrate:fresh --seed

## Доступные роуты REST API

- GET
  - /api/employees - Возвращает всех сотрудников в формате JSON
    - Пример ответа:
    ```
    {
       "id": 1,
       "first_name": "Richie",
       "last_name": "Braun",
       "email": "dooley.johanna@hotmail.com",
       "phone_number": "+1.636.819.0585",
       "created_at": "2024-09-16T08:15:34.000000Z",
       "updated_at": "2024-09-16T08:15:34.000000Z",
       "company_id": 1
       },
       {
       "id": 2,
       "first_name": "Macy",
       "last_name": "Steuber",
       "email": "lera21@quitzon.com",
       "phone_number": "(903) 319-7649",
       "created_at": "2024-09-16T08:15:34.000000Z",
       "updated_at": "2024-09-16T08:15:34.000000Z",
       "company_id": 13
       },
       {
    ```

  - /api/employees/{{ employee }} - Возвращает сотрудника с указанным id в формате JSON
    - Пример ответа:
    ```
    {
    "id": 1,
    "first_name": "Richie",
    "last_name": "Braun",
    "email": "dooley.johanna@hotmail.com",
    "phone_number": "+1.636.819.0585",
    "created_at": "2024-09-16T08:15:34.000000Z",
    "updated_at": "2024-09-16T08:15:34.000000Z",
    "company_id": 1
    }
    ```
  
- POST
  - /api/employees - Создает нового сотрудника
    - Пример тела запроса:
    ```
    {
    "first_name": "test",
    "last_name": "test",
    "email": "",
    "phone_number": "",
    "company_id": 5
    }
    ```
    - Пример ответа:
    ```
      {
        "first_name": "test",
        "last_name": "test",
        "email": null,
        "phone_number": null,
        "company_id": 5,
        "updated_at": "2024-09-16T08:21:29.000000Z",
        "created_at": "2024-09-16T08:21:29.000000Z",
        "id": 22
        }
    ``` 
  
- PUT
  - /api/employees/{{ employee }} - Обновляет данные уже существующего сотрудника
    - Пример тела запроса:
    ```
        {
        "first_name": "test1",
        "last_name": "test1",
        "email": null,
        "phone_number": null,
        "company_id": null
        }
    ```
    - Пример ответа:
        ```
            {
            "id": 22,
            "first_name": "test",
            "last_name": "test",
            "email": null,
            "phone_number": null,
            "created_at": "2024-09-16T08:21:29.000000Z",
            "updated_at": "2024-09-16T08:24:01.000000Z",
            "company_id": null
            }
        ```

- DELETE
  - /api/employees/{{ employee }} - Удаляет сотрудника
    - Пример ответа:
        ```
            Status 204 - No content
        ```
