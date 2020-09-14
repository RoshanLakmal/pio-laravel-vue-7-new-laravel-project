import Bookables from "./bookables/Bookables";
import Example2 from "./components/Example2";
import VueRouter from "vue-router";

const routes = [
    {
        path: "/",
        component: Bookables,
        name: "home"
    },
    {
        path: "/second",
        component: Example2,
        name: "second"
    }
];

const router = new VueRouter({
    routes,
    mode: "history"
});

export default router;
