import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { TabsPage } from './tabs.page';

const routes: Routes = [
  {
    path: '',
    component: TabsPage,
    children: [
      {
        path: 'lista-eventos',
        loadChildren: () => import('../lista-eventos/lista-eventos.module').then(m => m.ListaEventosPageModule)
      },
      {
        path: 'crear-evento',
        loadChildren: () => import('../crear-evento/crear-evento.module').then(m => m.CrearEventoPageModule)
      },
      {
        path: 'listas-fav',
        loadChildren: () => import('../listas-fav/listas-fav.module').then( m => m.ListasFavPageModule)
      },
      {
        path: 'home',
        loadChildren: () => import('../homepage/homepage.module').then(m => m.HomepagePageModule)
      },
      {
        path: '',
        redirectTo: '/tabs/home',
        pathMatch: 'full'
      }
    ]
  },
  {
    path: '',
    redirectTo: '/tabs/home',
    pathMatch: 'full'
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
})
export class TabsPageRoutingModule {}
