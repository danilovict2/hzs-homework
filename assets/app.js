import { registerVueControllerComponents } from '@symfony/ux-vue';
import '@fortawesome/fontawesome-free/css/all.min.css';
import './bootstrap.js';
import './styles/app.scss';
import './styles/style.css';

registerVueControllerComponents(require.context('./vue/controllers', true, /\.vue$/));