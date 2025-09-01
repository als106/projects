// homepage-routing.module.ts
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { HomepagePage } from './homepage.page';

const routes: Routes = [
  {
    path: '',
    component: HomepagePage
  },  
  {
    path: 'all-events',
    loadChildren: () => import('../all-events/all-events.module').then(m => m.AllEventsPageModule)
  },
  {
    path: 'detalle-evento/:id',
    loadChildren: () => import('../detalle-evento/detalle-evento.module').then(m => m.DetalleEventoPageModule)
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class HomepagePageRoutingModule {}
