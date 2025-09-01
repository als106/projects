import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { ListasFavPageRoutingModule } from './listas-fav-routing.module';

import { ListasFavPage } from './listas-fav.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    ListasFavPageRoutingModule
  ],
  declarations: [ListasFavPage]
})
export class ListasFavPageModule {}
