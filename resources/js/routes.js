import Bookables from "./bookables/Bookables";
import Bookable from "./bookable/Bookable";
import Review from "./review/Review";
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
    },
    {
        path: "/review/:id",
        component: Review,
        name: "review"
    }
];

const router = new VueRouter({
    routes,
    mode: "history"
});

export default router;
