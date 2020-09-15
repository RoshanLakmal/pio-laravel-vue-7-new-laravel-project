import Bookables from "./bookables/Bookables";
import Bookable from "./bookable/Bookable";
// import Example2 from "./components/Example2";
import VueRouter from "vue-router";

const routes = [
    {
        path: "/",
        component: Bookables,
        name: "home"
    },
    {
        path: "/bookable/:id",
        component: Bookable,
        name: "bookable"
    }
    // {
    //     path: "/second",
    //     component: Example2,
    //     name: "second"
    // }
];

const router = new VueRouter({
    routes,
    mode: "history"
});

export default router;
