import { registerVueControllerComponents } from '@symfony/ux-vue';
import './bootstrap.js';
import './styles/app.scss';
import './styles/style.css';

registerVueControllerComponents(require.context('./vue/controllers', true, /\.vue$/));