import { Component, OnInit } from '@angular/core';
import { NavController } from '@ionic/angular';
import { Storage } from '@ionic/storage-angular';
import { Router, NavigationEnd } from '@angular/router';
import { Inject } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: 'app.component.html',
  styleUrls: ['app.component.scss'],
})
export class AppComponent implements OnInit {
  showMenu: boolean = false;
  showNavBar: boolean = true;
  constructor(
    private navCtrl: NavController,
    @Inject(Storage) private storage: Storage,
    private router: Router
  ) {
    this.initializeApp();
    this.router.events.subscribe((event) => {
      if (event instanceof NavigationEnd) {
        this.showNavBar = event.url !== '/login';
      }
    });
  }

  async initializeApp() {
    await this.storage.create(); // Espera a que se cree la base de datos
    // Ahora puedes acceder al almacenamiento sin problemas
  }

  ngOnInit() {}

  ngOnChange(){
    this.showNavBar = this.router.url !== '/login';
  }

  toggleMenu() {
    this.showMenu = !this.showMenu;
  }

  goToProfile() {
    this.navCtrl.navigateForward('/perfil');
    this.showMenu = false; // Cerrar el menú después de la navegación
  }

}
