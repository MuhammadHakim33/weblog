# Weblog

### Introduce
Weblog is a platform designed for managing news websites or blogs. The platform empowers administrators with full control over the content of the website, including the ability to create, edit, manage posts, and manage authors. Authors can create, edit, manage posts and commenting.  Viewers can interact with the content by reading and commenting, but do not have permission to modify, delete, or add new content.
### Tech Stack

- **Backend**: Laravel 9
- **Frontend**: Livewire, Tailwind CSS, Alpine.js
- **Editor**: CKEditor4
- **Database**: MySQL

### Other Information

- [Brief Project](https://www.figma.com/file/oXhXA0dZcUnzttIfp2yW77/Weblog-Brief?node-id=0%3A1)
- [Design Interface](https://www.figma.com/file/TapCx8O6ySaMkqchFUZH7E/Design?node-id=15%3A2078&t=3UYPvyvouZzkusW8-1)
- [Database Scheme](https://dbdiagram.io/d/63d879b4296d97641d7d31dc)


## Getting Started

### Prerequisites
To store the thumbnail image of the post, This project used free image hosting from imgbb. You can get The API key and add it to the ``IMGBB_API_KEY`` variable in the .env file.


### Installation
1. Clone this repository
    ```sh
    git clone https://github.com/MuhammadHakim33/weblog.git
    ```
2. Install all dependencies from composer and npm
    ```sh
    composer install
    ```
    ```sh
    npm install
    ```
3. Rename the ``.env.example`` file to ``.env``
4. Set the mysql db connection in the ``.env`` file
5. Run migration and seeder
    ```sh
    php artisan migrate
    ```
    ```sh
    php artisan db:seed
    ```
6. Run app
    ```sh
    npm run dev
    ```
    ```sh
    php artisan serve
    ```


## Access Web App

**Administrator account** \
Email : administrator@gmail.com \
Password : 1234567

**Author account** \
Email : author@gmail.com \
Password : 1234567

**Subscriber account** \
Email : subscriber@gmail.com \
Password : 1234567