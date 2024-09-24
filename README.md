# E-Commerce Web Application for a Music Cassette StoreE-Commerce Web Application for a Music Cassette Store
This project is an e-commerce web application for selling music cassettes, featuring an admin panel for managing products and site content. The application is built from scratch using Laravel for backend API and Nuxt for server-side rendering (SSR) and frontend, providing fast page loads and improved SEO optimization.

## Technology Stack
- **Laravel:** Used for building the RESTful API, handling authentication, pagination, filtering, and protecting routes with Sanctum. Controllers are implemented following SOLID principles, with validation through Request classes and consistent API responses managed by Resources.
- **Nuxt:** Utilized for server-side rendering (SSR), routing, role-based access control, and API interaction.
- **Vue:** Applied for building a dynamic frontend using the Composition API.
- **Tailwind CSS:** Chosen for a responsive and efficient UI design without the need for custom styling.

## Key Features
- Product catalog with filtering and sorting options
- Shopping cart with item addition, removal, and quantity updates
- Admin panel for managing products and blog posts
- Simple authentication system with role-based permissions
- A text editor for creating and publishing blog posts with formatting support
- Blog post publication with support for rich text formatting

## Backend
- **Database:** A migration file creates the products table, populated using the TapesSeeder.
- **Controllers** located in Http/Controllers/Api/V1 handle standard CRUD operations for products and posts.
- **Routing:** The routes/api.php file contains the API routes for retrieving products and posts, returning JSON responses. Certain routes are secured using Sanctum and role-based access (middleware CheckRole.php).
- **Cart and Posts:** Cart and post controllers work similarly to the product controller, managing content via API.

## Frontend
- **Components and Rendering:** The project follows the Composition API syntax. Routing between pages is managed by Nuxt, with pages located in the pages directory and reusable components stored in components.
- **SSR and Authentication:** SSR is disabled on pages requiring authorization (e.g., the admin panel) to ensure smooth token-based operations.
- **Data Fetching:** The useFetch method is used to retrieve data from the API. For example, fetching all products is done as follows:
```
<script setup>
const { data } = await useFetch('http://api.weeb-tapes.de/api/v1/tapes', {
  params: filterParams,
  method: 'GET',
  headers: {
      'Authorization': `Bearer ${token}`,
    },
});
</script>

<template>
<div v-for="product in data" :key="product.id">
  <NuxtLink :to="`/products/${product.id}`">
    <img :src="`${product.url}`" alt="" />
  </NuxtLink>
</div>
</template>
```
## Installation and Setup
1. Clone the repository:
```
 git clone https://github.com/Andrzej-Brusnicyn/weeb-tapes.git
```
2. Configure the .env file for Laravel, adding database settings and Sanctum configurations.
3. Navigate to the project directory and install dependencies:

**Backend (Laravel):**

```
cd backend
composer install
php artisan migrate --seed
```

**Frontend (Nuxt):**

```
cd frontend
npm install
npm run dev
```

## Future Improvements
This project is currently under development and will be completed by the diploma defense on October 13, 2024. The final version will include performance optimizations, enhanced user experience, improved SEO, and additional admin features.
