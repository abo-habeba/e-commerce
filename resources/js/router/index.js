import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../View/HomeView.vue";
// import AuthView from "../views/AuthView.vue";
// import Register from "../views/RegisterView.vue";
import LoginView from "../View/LoginView.vue";
// import StationsView from "../views/StationsView.vue";
// import userEdit from "../views/user/editProfil";
// import ReportView from "../views/ReportView.vue";
import NotFound from "../View/NotFound.vue";

const routes = [
    {
        path: "/",
        name: "home",
        component: HomeView,
        meta: { title: "home" },
    },
    {
        path: "/login",
        name: "login",
        component: LoginView,
        meta: { title: "Log In" },
    },
    {
        path: "/:pathMatch(.*)*",
        name: "notfound",
        component: NotFound,
    },
];
const router = createRouter({
    history: createWebHistory(),
    routes,
});

// router.beforeEach((to, from, next) => {
//     document.title = to.meta.title || "atsh";
//     const token = localStorage.getItem("token");
//     if (token) {
//         // التوكن موجود، يتم توجيه المستخدم إلى الصفحة الرئيسية
//         if (to.name === "login" || to.name === "register" || to.name === "auth") {
//             next({ name: "home" });
//         } else {
//             next();
//         }
//     } else {
//         // التوكن غير موجود، يتم توجيه المستخدم إلى صفحة تسجيل الدخول
//         if (to.name !== "auth" && to.name !== "login" && to.name !== "register") {
//             next({ name: "login" });
//         } else {
//             next();
//         }
//     }
// });
export default router;
