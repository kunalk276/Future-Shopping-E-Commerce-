# future-ecommerce
Responsive project with Laravel, PHP 8 and Blade to implement an E-commerce.
Context: Online shopping for Metaverse. You can buy lands and avatars.

## Execution:

```
    $ git clone git@github.com:fernandamsouza/future-ecommerce.git
    $ cd future-ecommerce/
    $ composer update
    $ touch .env.example ---> change connection with database and email smtp
    $ php artisan key:generate
    $ php artisan storage:link
    $ php artisan migrate --seed
    $ php artisan serve
```

## Project:

- Ecommerce system where users can shop online and system administrators can control the flow of the platform through dashboards and CRUDs of products and categories.
- The system's landing page shows several products registered in different categories (all created by the ADM user)
- A user who is a customer can register on the platform and buy the available items. In order to complete the purchase, the user must confirm the link received in their email.
- When a user adds an item for purchase, that item is viewed in their cart. A user can add multiple items to a cart.
- In their account settings, user can track order and payment status.
- All orders placed on the platform can be managed by ADMs on their internal dashboard.
- The admin user has a dashboard, transaction history, list of system users, product CRUD, category CRUD and order history.
- System administrators can update order and financial transaction status.

## TODO

- [ ] Rebranding and change front-end of the system
- [ ] Tests
- [ ] Implement integration with payment plataforms
- [ ] Implement control of stock
- [ ] Implement CRM
- [ ] Implement several integrations 

## Screenshots of the project

# Landing Page

<img width="1508" alt="image" src="https://user-images.githubusercontent.com/36938892/226482372-8976cca3-95da-4b27-be82-cf5ac21f9008.png">

# Internal User

<img width="1510" alt="image" src="https://user-images.githubusercontent.com/36938892/226482773-7a6e9fac-9993-4fb6-8b27-8bb6e855caf9.png">

# Cart

<img width="1509" alt="image" src="https://user-images.githubusercontent.com/36938892/226485142-5196717b-ae4a-468d-bcad-75b72afbc6e2.png">

<img width="1508" alt="image" src="https://user-images.githubusercontent.com/36938892/226483106-6e6cea5a-be16-4c7c-8cf8-d13bbc975697.png">

# Email

<img width="574" alt="image" src="https://user-images.githubusercontent.com/36938892/226483166-b3e12c02-ecf1-4e41-a922-050db27e586f.png">

# Adm

<img width="1500" alt="image" src="https://user-images.githubusercontent.com/36938892/226483213-ff08d6b4-1849-451d-b714-a905e7e70f9b.png">

<img width="1508" alt="image" src="https://user-images.githubusercontent.com/36938892/226483235-957d9976-f894-479c-ba2a-f6da441ed90e.png">

<img width="1502" alt="image" src="https://user-images.githubusercontent.com/36938892/226483256-e5756450-a78a-44bd-8e1d-46d8d1db7c05.png">

<img width="1508" alt="image" src="https://user-images.githubusercontent.com/36938892/226483287-f23d3d28-e87e-4f8d-9429-c96fe44c203a.png">

<img width="1505" alt="image" src="https://user-images.githubusercontent.com/36938892/226483310-43057e1f-53d2-445d-855e-773c032584af.png">



