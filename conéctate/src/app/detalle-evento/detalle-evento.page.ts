import { Component, OnInit } from '@angular/core';
import { Evento } from '../models/evento';
import { HttpClient } from '@angular/common/http';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-detalle-evento',
  templateUrl: './detalle-evento.page.html',
  styleUrls: ['./detalle-evento.page.scss'],
})
export class DetalleEventoPage implements OnInit {
  evento : Evento = new Evento();
  data : any;
  eventos : Evento[] = [];


  constructor(private route : ActivatedRoute) { }

  ngOnInit() {
    this.evento.id = this.route.snapshot.paramMap.get('id') ?? '0';
    this.readEventFromJson(this.evento.id);
  }

  readEventFromJson(id: string) {
    fetch('../../assets/eventos/eventos.json').then(res => res.json())
    .then(json => {
      this.eventos = json;
      this.eventos.forEach(element => {
        if(element.id == id){
          this.evento = element;
        }
      });
    });
  }
}
