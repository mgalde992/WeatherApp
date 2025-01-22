# Weather Application

A simple weather application that retrieves current weather data based on city input. Built with Laravel for the backend and Vue.js for the frontend, this application utilizes the OpenWeatherMap API to fetch weather information.

## Technologies Used

- **Backend**: 
  - **Laravel**: A PHP framework for building the back end.
  - **MySQL**: For database management (or any other supported database).
  
- **Frontend**:
  - **Vue.js**: A progressive JavaScript framework for building user interfaces.
  - **Axios**: For making HTTP requests to the backend.

- **API**:
  - **OpenWeatherMap**: Provides weather data based on city input.

- **Styling**:
  - **CSS**: Custom styles for layout and design.
  - **Font Awesome**: For icons to enhance the visual presentation.

## Running the Weather Application

Follow these steps to run the weather application on your local machine.

### Prerequisites

Ensure you have the following installed:

- [PHP] (version 7.4 or higher)
- [Composer]
- [Node.js] (version 12 or higher)
- [npm] (Node Package Manager, comes with Node.js)
- [MySQL] or any other supported database

### Step-by-Step Instructions

1. **Clone the Repository**:

   Open your terminal and run:

   ```bash
   git clone https://github.com/mgalde992/WeatherApp.git
   cd weather-app
Set Up the Backend:
Navigate to the backend folder:
bash

Copy
cd backend
Install Backend Dependencies:
bash

Copy
composer install
Configure Environment Variables: Copy the example environment file and update it:
bash

Copy
cp .env.example .env
Edit the .env file with your database details and API key:
plaintext

Copy
DB_DATABASE=your_db_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password
OPENWEATHER_API_KEY=your_api_key_here
Run Migrations:
bash

Copy
php artisan migrate
Set Up the Frontend:
Navigate to the frontend folder:
bash

Copy
cd ../frontend
Install Frontend Dependencies:
bash

Copy
npm install
Running the Application:
Start the Laravel Server: Open a new terminal and run:
bash

Copy
cd backend
php artisan serve
Start the Vue.js Development Server: In another terminal, run:
bash

Copy
cd ../frontend
npm run serve
Access the Application: Open your web browser and navigate to http://localhost:8080. You should see the weather application interface.
Troubleshooting
Ensure your API key is correct and that your database is properly configured.
Check the console for error messages to identify issues.
livecodeserver

Copy

### Summary

This section provides a clear outline of the technologies used and the necessary steps to run the weather application. Adjust any specific details as needed to fit your project!