// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  compatibilityDate: '2024-04-03',
  devtools: { enabled: true },
  css: ['~/assets/css/main.css'],
  postcss: {
    plugins: {
      tailwindcss: {},
      autoprefixer: {},
    },
  },
  devServer: {
    port: 3000, // default: 3000
    host: '0.0.0.0', // default: localhost,
    timing: false,
    hmr: {
      protocol: 'ws',
      host: '0.0.0.0'
    }
  },
  routeRules: {
    "/admin": { ssr: false },
  },
})
