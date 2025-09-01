import { Component, OnInit } from '@angular/core';
import { Evento } from '../models/evento';

@Component({
  selector: 'app-lista-eventos',
  templateUrl: './lista-eventos.page.html',
  styleUrls: ['./lista-eventos.page.scss'],
})
export class ListaEventosPage implements OnInit {

  eventos : Evento[] = [];

  constructor() { }

   ngOnInit() {
    this.getData();
  }

  getData(){
    fetch('../../assets/eventos/eventos.json').then(res => res.json())
    .then(json => {this.eventos = json;})
  }

  generateURL(id: string){
    return "tabs/lista-eventos/detalle-evento/"+id;
  }

}
