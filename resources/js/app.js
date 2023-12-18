import './bootstrap';
import '../css/app.css'
import { createApp } from "vue";
import app from "./View/app.vue";
import router from "./router";
// import { createI18n } from "vue-i18n";
// import en from "@/locales/en.json";
// import ar from "@/locales/ar.json";
// import { createPinia } from "pinia";
// import "vuetify/styles";
// import { createVuetify } from "vuetify";
// import * as components from "vuetify/components";
// import * as directives from "vuetify/directives";
// import "@mdi/font/css/materialdesignicons.css";
// import "bootstrap/dist/css/bootstrap.min.css";
// const vuetify = createVuetify({
//   components,
//   directives,
// });
// let language = navigator.language;
// localStorage.setItem("language", language);
// window.onlanguagechange = () => {
//   language = navigator.language;
//   localStorage.setItem("language", navigator.language);
// };
// const i18n = createI18n({
//   locale: navigator.language,
//   messages: {
//     en: en,
//     ar: ar,
//   },
// });
createApp(app)
    .use(router)
    //   .use(i18n)
    //   .use(vuetify)
    //   .use(createPinia())
    .mount("#app");
