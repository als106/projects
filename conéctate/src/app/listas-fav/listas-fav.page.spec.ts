import { ComponentFixture, TestBed } from '@angular/core/testing';
import { ListasFavPage } from './listas-fav.page';

describe('ListasFavPage', () => {
  let component: ListasFavPage;
  let fixture: ComponentFixture<ListasFavPage>;

  beforeEach(() => {
    fixture = TestBed.createComponent(ListasFavPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
