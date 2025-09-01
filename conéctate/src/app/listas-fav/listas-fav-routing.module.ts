import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { ListasFavPage } from './listas-fav.page';

const routes: Routes = [
  {
    path: '',
    component: ListasFavPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class ListasFavPageRoutingModule {}
