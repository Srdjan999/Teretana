
const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/Index.vue') },
      { path: '/korisnik', name: 'Korisnik', component: () => import('pages/Korisnik.vue') },
      { path: '/clanstvo', name: 'Clanstvo', component: () => import('pages/Clanstvo.vue') },
      { path: '/sala', name: 'Sala', component: () => import('pages/Index.vue') }
    ]
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: '*',
    component: () => import('pages/Error404.vue')
  }
]

export default routes
