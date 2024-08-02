# Task-maker

<p>
  <img src="dashboard.png?raw=true" alt="Dashboard" width="900"/>
</p>

## Overview



**Task Maker** is a comprehensive tool that tracks various metrics related to the company's employees, customers,
tasks, and finances. The dashboard provides a high-level overview of the company's operations, encompassing workforce
details, productivity metrics, and task management insights.

Users can:

- View customers
- Delete customer
- Assign tasks to customers
- Mark tasks as completed
- Delete tasks

## Entity Relation Diagram 

<p>
  <img src="ERD.png?raw=true" alt="ERD" width="900"/>
</p>

## Setup steps
- This project running on ``PHP version 8.2.1`` and ``Laravel version 11.9``.
- Make sure to have an active MySQL connection or change the database credentials from ``.env`` file.
- Make a new folder and run this git command: ``git clone https://github.com/Mohamed-abdelfadel/task-maker`` cd to new folder.
- Change the .`env.example` file to `.env`.
- Run ``composer install``.
- Run the secret key generation command ``php artisan key:generate``.
- Run the Database migration and seeders ``php artisan migrate:fresh --seed``.
- Finally run the start application command ``php artisan serve``.

Or simply 
- Run ``php artisan app:start`` instead of the last 3 steps.
