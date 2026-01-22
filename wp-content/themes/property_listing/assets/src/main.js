import './main.scss';
import Alpine from 'alpinejs';
import axios from 'axios';
import Swiper from 'swiper';
import 'swiper/swiper-bundle.css';
import './property-filter-manager.js';


window.Alpine = Alpine;
Alpine.start();

window.axios = axios;
window.Swiper = Swiper;
window.mapboxgl = mapboxgl;
window.MapboxGeocoder = MapboxGeocoder;

window.wpData = {
    ajaxUrl: window.propertyTheme?.ajax_url || '',
    nonce: window.propertyTheme?.nonce || '',
    homeUrl: window.propertyTheme?.home_url || '',
    restUrl: window.propertyTheme?.rest_url || '',
    mapboxKey: window.propertyTheme?.mapbox_key || '',
};

// Auto-config for Axios
axios.defaults.headers.common['X-WP-Nonce'] = wpData.nonce;
axios.defaults.withCredentials = true;
