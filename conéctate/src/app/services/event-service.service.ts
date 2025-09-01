import { Injectable } from '@angular/core';
import { Evento } from '../models/evento';
import { Observable, from } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class EventServiceService {

  readonly usersMockup: string = "./assets/eventos/eventos.json";

  constructor() { }

  getEventos(): Observable<Evento[]> {
    return from(fetch(this.usersMockup).then(res => res.json()));
  }
}
