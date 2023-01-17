# QuizApp

Laravel ve Bootstrap 5 ile yazılmış full-stack bir Quiz sistemi.

## Tech Stack
**Backend**: [Laravel](https://laravel.com/)

**Frontend** [Blade Template](https://laravel.com/docs/9.x/blade#main-content), Bootstrap 5

**Database** MySQL, [Eloquent ORM](https://laravel.com/docs/9.x/eloquent), [Query Builder](https://laravel.com/docs/9.x/queries#main-content)

## Features
| Feature | Technology |
| ----------- | ----------- |
| Authentication | [laravel/Jetstream](https://laravel.com/docs/9.x/starter-kits#laravel-jetstream) |
| Filtreleme | [Laravel](https://laravel.com/docs/9.x/eloquent-relationships#inline-relationship-existence-queries) |
| Pagination | [Laravel](https://laravel.com/docs/9.x/eloquent-resources#pagination) |
| Quiz durumu| [Laravel](https://laravel.com/docs/9.x/eloquent-resources#pagination) |
| Puan Hesaplama | [Laravel](https://laravel.com/docs/9.x/eloquent-resources#pagination) |
| Style | [Bootstrap 5](https://getbootstrap.com/docs/5.2/getting-started/introduction/)

## Examples
![image](https://user-images.githubusercontent.com/99960369/212986799-58335598-a139-4c79-b304-d37bee9209fe.png)
![image](https://user-images.githubusercontent.com/99960369/212986756-0335b5c7-35ca-4bcf-b23d-d5dd40aa24d0.png)
![image](https://user-images.githubusercontent.com/99960369/212986758-0a84fd42-69c9-40c9-b132-2f4ef930d2e2.png)
![image](https://user-images.githubusercontent.com/99960369/212986774-60c75512-f4a0-4a83-ae52-456fed9c5ba6.png)
![image](https://user-images.githubusercontent.com/99960369/212986777-efb768d8-d5f4-4a99-8bd4-ca20b8977eeb.png)
![image](https://user-images.githubusercontent.com/99960369/212986782-79f5b5e7-fbde-454a-8e5c-797f54424e8e.png)
![image](https://user-images.githubusercontent.com/99960369/212986787-4a860705-0fc6-4a21-b497-9cb7a622226e.png)
![image](https://user-images.githubusercontent.com/99960369/212986791-833256fe-2c81-4d05-afa1-2ba11c03366d.png)
![image](https://user-images.githubusercontent.com/99960369/212986796-a2d4ebfb-d74c-4840-97a7-92610761be4c.png)
![image](https://user-images.githubusercontent.com/99960369/212987141-d5a39185-4c5a-4501-bb8a-5a471140362e.png)


1. Install PHP dependencies 
    ```sh
    composer install
    ```

2. install front-end dependencies
    ```sh
    npm install
    ```

3. Run migration
    ```
    php artisan migrate:fresh --seed
    ```
    this command will create 1 users (admin):
     > email: admin@admin.com , password: password
4. Run server 
   
    ```sh
    php artisan serve
    ```  
