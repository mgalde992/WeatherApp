
<script setup>
import HelloWorld from './components/HelloWorld.vue'
import TheWelcome from './components/TheWelcome.vue'

</script>

<template>
  <div id="app">
      <h1>Weather App</h1>
      <div class="input-container">
          <input 
              type="text" 
              v-model="city" 
              placeholder="Enter city name" 
              @keypress.enter="fetchWeather" 
          />
          <button @click="fetchWeather">Get Weather</button>
      </div>
      
      <div class="weather-info" v-if="weather">
          <h2>Weather in {{ weather.city }}</h2>
          <p>
              <i class="fas fa-thermometer-half"></i> 
              Temperature: {{ weather.temperature }}°C
          </p>
          <p>
              <i class="fas fa-cloud-sun"></i> 
              Description: {{ weather.description }}
          </p>
          <p>
              <i class="fas fa-clock"></i> 
              Retrieved At: {{ weather.retrieved_at }}
          </p>
      </div>

      <div class="results-container" v-if="weather">
          <h2>Weather Data Table</h2>
          <table class="weather-table">
              <thead>
                  <tr>
                      <th>City</th>
                      <th>Temperature (°C)</th>
                      <th>Description</th>
                      <th>Retrieved At</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>{{ weather.city }}</td>
                      <td>
                          <i class="fas fa-thermometer-half"></i> 
                          {{ weather.temperature }}
                      </td>
                      <td>
                          <i class="fas fa-cloud-sun"></i> 
                          {{ weather.description }}
                      </td>
                      <td>
                          <i class="fas fa-clock"></i> 
                          {{ weather.retrieved_at }}
                      </td>
                  </tr>
              </tbody>
          </table>
      </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
      return {
          city: '',
          weather: null,
      };
  },
  methods: {
      async fetchWeather() {
          const response = await axios.get(`http://localhost:8000/api/weather/${this.city}`);
          this.weather = response.data;
      },
  },
};
</script>

<style>
#app {
    text-align: center;
    background-color: #f5f5f5;
    padding: 20px;
    font-family: Arial, sans-serif;
    border-radius: 8px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    margin: auto;
}

h1 {
    color: #333;
    margin-bottom: 20px;
    font-size: 2.5em;
}

.input-container {
    margin-bottom: 20px;
    display: flex;
    justify-content: center;
}

input {
    padding: 12px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    width: 250px;
    margin-right: 10px;
    transition: border-color 0.3s;
}

input:focus {
    border-color: #007BFF;
    outline: none;
}

button {
    padding: 12px 20px;
    font-size: 16px;
    color: white;
    background-color: #007BFF;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.2s;
}

button:hover {
    background-color: #0056b3;
    transform: scale(1.05);
}

.weather-info {
    border: 2px solid #007BFF;
    border-radius: 8px;
    padding: 20px;
    background-color: #ffffff;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    margin-top: 15px;
}

.weather-info h2 {
    margin: 0;
    font-size: 24px;
    color: #007BFF;
}

.weather-info p {
    margin: 5px 0;
    font-size: 18px;
    color: #333;
}

.results-container {
    margin-top: 20px;
}

.weather-table {
    width: 100%;
    border-collapse: collapse;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
}

.weather-table th,
.weather-table td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.weather-table th {
    background-color: #007BFF;
    color: white;
    font-size: 18px;
}

.weather-table tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

.weather-table tbody tr:hover {
    background-color: #e6f7ff;
}

.weather-table tbody td {
    font-size: 16px;
    color: #555;
    border: none;
}

.weather-table td i {
    margin-right: 8px; /* Space between icon and text */
    color: #007BFF; /* Icon color */
}
</style>