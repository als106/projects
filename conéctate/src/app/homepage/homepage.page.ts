import { Component, OnInit } from '@angular/core';
import { Evento } from '../models/evento';
import { EventServiceService } from '../services/event-service.service';

@Component({
  selector: 'app-homepage',
  templateUrl: './homepage.page.html',
  styleUrls: ['./homepage.page.scss'],
})
export class HomepagePage implements OnInit {

  selectedTab: string = 'all';
  eventos : Evento[] = [];

  constructor(private eventSrv : EventServiceService) { }

  ngOnInit() {
    this.eventSrv.getEventos().subscribe(eventos => {
      this.eventos = eventos;
    });
    this.selectTab('all');
  }


  selectTab(tab: string) {
    this.selectedTab = tab;
  }

  generateURL(id: string){
    return "tabs/home/detalle-evento/"+id;
  }
}
