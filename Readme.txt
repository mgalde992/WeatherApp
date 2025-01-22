# Weather App Backend Documentation

## Overview
This backend is built using Laravel and interacts with the OpenWeatherMap API to fetch and store weather data. It includes caching to prevent redundant API requests and validation to ensure correct input. The retrieved data is stored in a MySQL database and exposed through an API endpoint.

## Features
- Fetches current weather data for a given city from OpenWeatherMap API.
- Caches the retrieved data for 10 minutes to minimize redundant API requests.
- Stores weather data in a MySQL database.
- Implements error handling for API failures and invalid inputs.
- Provides a REST API endpoint for fetching weather data.

## API Endpoint
### POST /api/weather
#### Request Parameters:
- city (string, required): Name of the city for which weather data is to be retrieved.

#### Response:
- On success: Returns weather data in JSON format.
  json
  {
      "city": "London",
      "temperature": 15.5,
      "description": "clear sky",
      "retrieved_at": "2025-01-22 12:30:45"
  }
  
- On failure: Returns an error message with a 500 status code.
  json
  {
      "error": "Unable to fetch weather data"
  }
  

## Installation & Setup
1. Clone the repository from GitHub/Bitbucket.
2. Navigate to the project directory and install dependencies:
   sh
   composer install
   
3. Configure the .env file:
   
   OPENWEATHERMAP_API_KEY=your_api_key_here
   
4. Run database migrations:
   sh
   php artisan migrate
   
5. Start the development server:
   sh
   php artisan serve
   

## Security Measures
- The API key is stored securely in the .env file and accessed via env().
- Validation ensures that a valid city name is provided.
- Caching minimizes API requests, reducing exposure to rate limits.

## Error Handling
- If an invalid city name is provided, an error message is returned.
- If the API request fails, a 500 status response is sent with an error message.

## Frontend Implementation
### Features:
- Built using Vue.js or React.
- User inputs a city name and submits the form to fetch weather data.
- Displays the fetched weather data in a styled table.
- Handles errors and provides user-friendly messages.

### Steps:
1. Create a simple form with an input field for city name and a submit button.
2. Make an API request to the backend using fetch or axios.
3. Display the retrieved weather data (city name, temperature, description, and timestamp).
4. Style the table for better user experience.

## Deployment
- Use a hosting provider such as Heroku, AWS, or DigitalOcean for backend deployment.
- Deploy the frontend using Vercel, Netlify, or a similar service.
- Set environment variables securely on the hosting platform.
- Ensure database migration is applied in the production environment.

## Future Enhancements
- Implement user authentication for additional security.
- Add support for historical weather data.
- Improve caching mechanism to use Redis for better scalability.
- Enhance the UI/UX of the frontend with better design and interactivity.
- Add unit and integration tests for improved reliability.

## Repository & Access
- The project is stored on GitHub/Bitbucket.
- Clone the repository using:
  sh
  git clone <repository_url>
  
- Follow the setup instructions for running the project locally.

For any issues or contributions, feel free to open an issue or submit a pull request on the repository.
