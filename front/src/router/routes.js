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
      { path: '/products', component: () => import('pages/Menu/ProductsPage.vue') , meta: { requiresAuth: true }},
      { path: '/category', component: () => import('pages/Menu/CategoryPage.vue') , meta: { requiresAuth: true }},
      { path: '/sub_category', component: () => import('pages/Menu/SubCategoryPage.vue') , meta: { requiresAuth: true }},
      { path: '/users', component: () => import('pages/Menu/UsersPage.vue') , meta: { requiresAuth: true }},
      { path: '/carousel', component: () => import('pages/Menu/CarouselPage.vue') , meta: { requiresAuth: true }},
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
