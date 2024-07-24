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

  // Always leave this as last one,
  // but you can also remove it
  {
    path: '/:catchAll(.*)*',
    component: () => import('pages/ErrorNotFound.vue')
  }
]

export default routes
