import { ComponentFixture, TestBed } from '@angular/core/testing';
import { BuscarEventoPage } from './buscar-evento.page';

describe('BuscarEventoPage', () => {
  let component: BuscarEventoPage;
  let fixture: ComponentFixture<BuscarEventoPage>;

  beforeEach(() => {
    fixture = TestBed.createComponent(BuscarEventoPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
