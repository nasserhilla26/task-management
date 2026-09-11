<h1>Task Management</h1>

<p>
A simple CRUD Task Management web application developed using Laravel 12 and MySQL
as a postgraduate academic project.
</p>

<h2>Project Overview</h2>

<p>
The Task Management application provides a simple interface for managing tasks.
Users can create, view, update, search, filter, and delete tasks.
</p>

<h2>Features</h2>

<ul>
    <li>Create tasks</li>
    <li>View task details</li>
    <li>Edit tasks</li>
    <li>Delete tasks</li>
    <li>Search tasks by title or description</li>
    <li>Filter tasks by status</li>
    <li>Pending and completed task statuses</li>
    <li>Optional due dates</li>
    <li>Due-today and overdue indicators</li>
    <li>Task statistics</li>
    <li>Pagination</li>
    <li>MySQL database integration</li>
    <li>Ubuntu Server VM deployment</li>
    <li>Docker deployment using Docker Compose</li>
</ul>

<h2>Technology Stack</h2>

<table>
    <thead>
        <tr>
            <th>Technology</th>
            <th>Version / Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Laravel</td>
            <td>12.69.1</td>
        </tr>
        <tr>
            <td>PHP</td>
            <td>8.5</td>
        </tr>
        <tr>
            <td>Apache</td>
            <td>Web Server</td>
        </tr>
        <tr>
            <td>MySQL</td>
            <td>8.4</td>
        </tr>
        <tr>
            <td>Bootstrap</td>
            <td>5.3.3</td>
        </tr>
        <tr>
            <td>Docker</td>
            <td>Docker Desktop with WSL2</td>
        </tr>
        <tr>
            <td>Docker Compose</td>
            <td>v5.5.1</td>
        </tr>
        <tr>
            <td>Ubuntu Server</td>
            <td>26.04.1 LTS</td>
        </tr>
        <tr>
            <td>Git</td>
            <td>Version Control</td>
        </tr>
    </tbody>
</table>

<h2>Application Structure</h2>

<pre>
task-management/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   └── Requests/
│   └── Models/
├── bootstrap/
├── config/
├── database/
│   └── migrations/
├── public/
├── resources/
│   └── views/
├── routes/
│   └── web.php
├── storage/
├── .dockerignore
├── .env.example
├── Dockerfile
├── docker-compose.yml
├── artisan
├── composer.json
└── composer.lock
</pre>

<h2>Database</h2>

<p>
The application uses MySQL as its relational database.
</p>

<p>The main application table is:</p>

<pre>
tasks
</pre>

<table>
    <thead>
        <tr>
            <th>Column</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>id</td>
            <td>Unique task identifier</td>
        </tr>
        <tr>
            <td>title</td>
            <td>Task title</td>
        </tr>
        <tr>
            <td>description</td>
            <td>Optional task description</td>
        </tr>
        <tr>
            <td>status</td>
            <td>Pending or completed</td>
        </tr>
        <tr>
            <td>due_date</td>
            <td>Optional task due date</td>
        </tr>
        <tr>
            <td>created_at</td>
            <td>Creation timestamp</td>
        </tr>
        <tr>
            <td>updated_at</td>
            <td>Last update timestamp</td>
        </tr>
    </tbody>
</table>

<p>
Database credentials are supplied through environment variables and are not
stored directly in the source code.
</p>

<hr>

<h2>Local Development</h2>

<p>
The original development environment uses WAMP on Windows.
</p>

<h3>Requirements</h3>

<ul>
    <li>PHP 8.5 or compatible PHP version</li>
    <li>Composer</li>
    <li>MySQL</li>
    <li>Apache</li>
    <li>Git</li>
</ul>

<h3>Install Dependencies</h3>

<pre>
composer install
</pre>

<p>Create the Laravel environment file.</p>

<pre>
Copy-Item .env.example .env
</pre>

<p>Generate the Laravel application key.</p>

<pre>
php artisan key:generate
</pre>

<p>
Configure the MySQL connection in <code>.env</code>.
</p>

<pre>
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_management
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
</pre>

<p>Run the database migrations.</p>

<pre>
php artisan migrate
</pre>

<h2>Ubuntu VM Deployment</h2>

<p>
The same Laravel application was manually deployed to an Ubuntu Server virtual
machine as required by the deployment assignment.
</p>

<h3>VM Configuration</h3>

<ul>
    <li>Ubuntu Server 26.04.1 LTS</li>
    <li>4 GB RAM</li>
    <li>2 CPU cores</li>
    <li>30 GB virtual disk</li>
    <li>Apache</li>
    <li>PHP 8.5</li>
    <li>Composer</li>
    <li>MySQL 8.4</li>
    <li>Git</li>
</ul>

<h3>Manually Installed Software</h3>

<pre>
Apache
PHP
PHP MySQL extension
PHP mbstring extension
PHP XML extension
PHP cURL extension
PHP ZIP extension
PHP BCMath extension
PHP Intl extension
Composer
MySQL Server
Git
</pre>

<h3>Project Location</h3>

<pre>
/var/www/task-management
</pre>

<h3>Apache Configuration</h3>

<p>
Apache is configured to serve Laravel's public directory:
</p>

<pre>
/var/www/task-management/public
</pre>

<p>
Apache <code>mod_rewrite</code> is enabled so Laravel routes can be handled
correctly.
</p>

<h3>Database</h3>

<p>
The Ubuntu VM uses a MySQL database named:
</p>

<pre>
task_management
</pre>

<p>
The Laravel application connects to MySQL locally on the Ubuntu VM.
Database credentials are stored in the Laravel <code>.env</code> file and are
not committed to Git.
</p>

<h3>Useful VM Commands</h3>

<p>Check Apache:</p>

<pre>
sudo systemctl status apache2
</pre>

<p>Check MySQL:</p>

<pre>
sudo systemctl status mysql
</pre>

<p>Check the Laravel version:</p>

<pre>
cd /var/www/task-management
php artisan --version
</pre>

<p>Check migration status:</p>

<pre>
php artisan migrate:status
</pre>

<p>Clear Laravel caches:</p>

<pre>
php artisan optimize:clear
</pre>

<h3>Accessing the VM Application</h3>

<p>
When the VM is connected to the same local network as the client device,
the application can be accessed using the VM's LAN IP address:
</p>

<pre>
http://VM_IP/tasks
</pre>

<p>
Replace <code>VM_IP</code> with the current IP address assigned to the Ubuntu
virtual machine.
</p>

<hr>

<h2>Docker Deployment</h2>

<p>
The project includes a custom Dockerfile and Docker Compose configuration.
The Docker deployment runs the Laravel application and MySQL database together.
</p>

<h3>Docker Architecture</h3>

<pre>
Docker Compose
│
├── app
│   ├── PHP 8.5
│   ├── Apache
│   └── Laravel 12.69.1
│
└── db
    └── MySQL 8.4
        └── Persistent Docker Volume
</pre>

<h3>Docker Files</h3>

<ul>
    <li>
        <strong>Dockerfile</strong> -
        Builds the Laravel application image using PHP 8.5 and Apache.
    </li>
    <li>
        <strong>docker-compose.yml</strong> -
        Defines the Laravel application, MySQL database, Docker network,
        and database volume.
    </li>
    <li>
        <strong>.dockerignore</strong> -
        Prevents unnecessary files and local environment files from being
        included in the Docker build context.
    </li>
</ul>

<h3>Docker Environment Configuration</h3>

<p>
Docker-specific environment variables are stored in:
</p>

<pre>
.env.docker
</pre>

<p>
This file is intentionally excluded from Git because it contains environment
configuration and database credentials.
</p>

<p>
Create a local <code>.env.docker</code> file containing values similar to:
</p>

<pre>
APP_NAME="Task Management"
APP_ENV=production
APP_KEY=your_application_key
APP_DEBUG=false
APP_URL=http://localhost:8080

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=task_management
DB_USERNAME=taskapp
DB_PASSWORD=your_database_password
DB_ROOT_PASSWORD=your_root_password
</pre>

<p>
Use your own secure passwords. Do not commit <code>.env.docker</code> to Git.
</p>

<h3>Build the Docker Application</h3>

<pre>
docker compose --env-file .env.docker build
</pre>

<h3>Start the Docker Services</h3>

<pre>
docker compose --env-file .env.docker up -d
</pre>

<h3>Check Container Status</h3>

<pre>
docker compose --env-file .env.docker ps
</pre>

<p>The expected result is:</p>

<pre>
task-management-app    Up
task-management-db     Up (healthy)
</pre>

<h3>Run Laravel Migrations</h3>

<p>
For a new Docker database, run:
</p>

<pre>
docker compose --env-file .env.docker exec app php artisan migrate --force
</pre>

<h3>Check Migration Status</h3>

<pre>
docker compose --env-file .env.docker exec app php artisan migrate:status
</pre>

<h3>Check Laravel Version</h3>

<pre>
docker compose --env-file .env.docker exec app php artisan --version
</pre>

<p>The expected result is:</p>

<pre>
Laravel Framework 12.69.1
</pre>

<h3>Access the Docker Application</h3>

<p>
The Laravel application is exposed through port <code>8080</code>.
</p>

<pre>
http://localhost:8080/tasks
</pre>

<h2>Docker Database Persistence</h2>

<p>
The MySQL database uses a named Docker volume:
</p>

<pre>
db_data
</pre>

<p>
The volume keeps database data separate from the MySQL container itself.
Restarting the containers does not remove the database data.
</p>

<p>Restart the services:</p>

<pre>
docker compose --env-file .env.docker restart
</pre>

<p>
To stop and remove the containers while keeping the database volume:
</p>

<pre>
docker compose --env-file .env.docker down
</pre>

<p>
To intentionally remove the containers and database volume:
</p>

<pre>
docker compose --env-file .env.docker down -v
</pre>

<h2>Clean Docker Build</h2>

<p>
The Docker deployment was tested successfully using a clean build. This
verifies that the application can be recreated from the Docker configuration
and Laravel migrations without depending on previously running containers.
</p>

<p>Remove the existing containers and database volume:</p>

<pre>
docker compose --env-file .env.docker down -v
</pre>

<p>Build the application without using previous build layers:</p>

<pre>
docker compose --env-file .env.docker build --no-cache
</pre>

<p>Start the services:</p>

<pre>
docker compose --env-file .env.docker up -d
</pre>

<p>Run the migrations:</p>

<pre>
docker compose --env-file .env.docker exec app php artisan migrate --force
</pre>

<p>Verify the containers:</p>

<pre>
docker compose --env-file .env.docker ps
</pre>

<p>Then access the application:</p>

<pre>
http://localhost:8080/tasks
</pre>

<h2>Useful Docker Commands</h2>

<p>View application logs:</p>

<pre>
docker compose --env-file .env.docker logs app
</pre>

<p>View the last 100 application log lines:</p>

<pre>
docker compose --env-file .env.docker logs app --tail=100
</pre>

<p>View database logs:</p>

<pre>
docker compose --env-file .env.docker logs db
</pre>

<p>Open a shell inside the Laravel container:</p>

<pre>
docker compose --env-file .env.docker exec app bash
</pre>

<p>Run a Laravel Artisan command:</p>

<pre>
docker compose --env-file .env.docker exec app php artisan COMMAND
</pre>

<p>Stop the containers:</p>

<pre>
docker compose --env-file .env.docker stop
</pre>

<p>Stop and remove containers while keeping database data:</p>

<pre>
docker compose --env-file .env.docker down
</pre>

<p>Stop and remove containers and the database volume:</p>

<pre>
docker compose --env-file .env.docker down -v
</pre>

<h2>Security</h2>

<p>
Database credentials are not hard-coded into the Dockerfile or application
source code.
</p>

<p>The following environment files are excluded from Git:</p>

<pre>
.env
.env.docker
</pre>

<p>
Never commit real database passwords, API keys, application secrets, or other
sensitive credentials to the repository.
</p>

<h2>Deployment Summary</h2>

<h3>Ubuntu VM Deployment</h3>

<pre>
Ubuntu Server
│
├── Apache
├── PHP 8.5
├── Laravel 12.69.1
└── MySQL 8.4
</pre>

<p>
The required software was installed and configured manually on the Ubuntu
virtual machine.
</p>

<h3>Docker Deployment</h3>

<pre>
Docker Compose
│
├── Laravel
│   ├── Apache
│   └── PHP 8.5
│
└── MySQL 8.4
    └── Named Docker Volume
</pre>

<p>
Both deployment methods use the same Laravel application and database
migrations.
</p>

<h2>Academic Project</h2>

<p>
This Task Management application was developed as a postgraduate academic
project demonstrating CRUD application development, database integration,
manual virtual machine deployment, and containerized deployment using Docker.
</p>

<p>
The project source code and Docker configuration are maintained in the
associated GitHub repository. Environment files containing private credentials
are excluded from the repository.
</p>