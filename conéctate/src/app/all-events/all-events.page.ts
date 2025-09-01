import { Component, OnInit } from '@angular/core';
import { Evento } from '../models/evento';
import { EventServiceService } from '../services/event-service.service';

@Component({
  selector: 'app-all-events',
  templateUrl: './all-events.page.html',
  styleUrls: ['./all-events.page.scss'],
})
export class AllEventsPage implements OnInit {

  eventos: Evento[] = [];
  constructor(private eventSrv: EventServiceService) { }

  ngOnInit() {
    this.eventSrv.getEventos().subscribe(eventos => {
      this.eventos = eventos;
    });
  }

  generateURL(id: string){
    return "tabs/home/all-events/detalle-evento/"+id;
  }

}
