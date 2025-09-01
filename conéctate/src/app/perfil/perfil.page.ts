import { Component } from '@angular/core';
import { NavController } from '@ionic/angular';

@Component({
  selector: 'app-perfil',
  templateUrl: './perfil.page.html',
  styleUrls: ['./perfil.page.scss'],
})
export class PerfilPage {
  showMenu: boolean = false;
  isEditing: boolean = false;
  showMoreInterests: boolean = false;
  profileDescription: string = "Soy un apasionado de la música y me encanta descubrir nuevos talentos. Siempre estoy en busca de nuevas experiencias y me encanta compartir mis intereses con otros.";
  editableDescription: string = this.profileDescription;
  interests: any[] = [
    { name: "Sesiones de música", image: "../../assets/images/perfil/FotoInteres.jpg", selected: true },
    { name: "DJs", image: "../../assets/images/perfil/Djs.jpg", selected: true },
    { name: "Fiestas", image: "../../assets/images/perfil/Fiesta.jpg", selected: true }
  ];
  moreInterests: any[] = [
    { name: "Senderismo", image: "../../assets/images/perfil/senderismo.jpeg", selected: false },
    { name: "Lectura", image: "../../assets/images/perfil/lectura.jfif", selected: false }
  ];

  constructor(private navCtrl: NavController) {}

  toggleMenu() {
    this.showMenu = !this.showMenu;
  }

  goToProfile() {
    this.navCtrl.navigateForward('/perfil');
    this.showMenu = false; // Cerrar el menú después de la navegación
  }

  editDescription() {
    this.editableDescription = this.profileDescription;
    this.isEditing = true;
  }

  saveDescription() {
    this.profileDescription = this.editableDescription;
    this.isEditing = false;
  }

  cancelEdit() {
    this.isEditing = false;
  }

  toggleMoreInterests() {
    this.showMoreInterests = true;
    this.isEditing = true;
  }

  addInterest(interest: any) {
    interest.selected = true;
    this.interests.push(interest);
    this.moreInterests = this.moreInterests.filter(item => item.name !== interest.name);
  }

  removeInterest(interest: any) {
    interest.selected = false;
    this.interests = this.interests.filter(item => item.name !== interest.name);
    if (!this.moreInterests.some(item => item.name === interest.name)) {
      this.moreInterests.push(interest);
    }
  }

  goBack() {
    this.showMoreInterests = false;
    this.moreInterests = this.moreInterests.filter(interest => !this.interests.some(i => i.name === interest.name));
    this.isEditing = false;
  }
}
