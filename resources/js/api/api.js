
import axios from 'axios';

export const api = axios.create({
    baseURL: process.env.MIX_APP_API_URL,
})

api.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    api.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}
