const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/Index/IndexPage.vue') },
      { path: 'producto/:id/:name', component: () => import('pages/Products/ProductDetail.vue') },
      { path: 'productsSearch', component: () => import('pages/Products/ProductsSearch.vue') },
    ]
  },
  {
    path: '/login',
    component: () => import('layouts/LoginLayout.vue'),
  },
  {
    path: '/menu',
    component: () => import('layouts/MenuLayout.vue'),
    children: [
      { path: '', component: () => import('pages/Menu/MenuPage.vue') , meta: { requiresAuth: true }},
    ]
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: '/:catchAll(.*)*',
    component: () => import('pages/ErrorNotFound.vue')
  }
]

export default routes
