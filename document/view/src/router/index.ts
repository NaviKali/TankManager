import { createRouter, createWebHistory } from "vue-router";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      component: () => import("../views/Home.vue"),
    },
    {
      path: "/catalogue",
      component: () => import("../views/Catalogue.vue"),
    },
    {
      path: "/firstinterface",
      component: () => import("../views/FirstInterface.vue"),
    },
    {
      path: "/autocallinterface",
      component: () => import("../views/AutoCallInterface.vue"),
    },
  ],
});

export default router;
