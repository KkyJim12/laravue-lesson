require("./bootstrap");

window.Vue = require("vue");
import VueRouter from "vue-router";

Vue.use(VueRouter);

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);
Vue.component("navbar-component", require("./components/Navbar.vue").default);

const routes = [
    { path: "/", component: require("./components/Home.vue").default },
    {
        path: "/basic",
        component: require("./components/ExampleComponent.vue").default
    },
    { path: "/create", component: require("./components/Create.vue").default },
    { path: "/edit/:id", component: require("./components/Edit.vue").default }
];

const router = new VueRouter({
    routes
});

const app = new Vue({
    router,
    el: "#app"
});
