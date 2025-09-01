import { Injectable } from '@angular/core';
import { User } from '../models/user';
import { Storage } from '@ionic/storage';

@Injectable({
  providedIn: 'root'
})
export class UserService {

  readonly usersMockup: string = "./assets/data/users.json";
  readonly usersKey: string = 'users';
  users: User[] = [];

  constructor(private storage: Storage) {
    this.fetchUsers();
  }

  async fetchUsers() {
    const users = await this.storage.get(this.usersKey);
    if (users) {
      this.users = users;
    }
  }

  public async credencialesValidas(email: string, password: string): Promise<boolean> {
    await this.fetchUsers();
    const user = this.users.find(u => u.email === email && u.password === password);
    if (user) {
      return true
    } else {
      return false
    }
  }

  public async login(email: string, password: string): Promise<boolean> {
    await this.fetchUsers();
    const user = this.users.find(u => u.email === email && u.password === password);
    if(user){
      return true;
    }
    return false;
  }

  public async register(user: User): Promise<boolean> {
    await this.fetchUsers();
    // Verificar si el usuario ya está registrado
    if (this.users.some(u => u.email === user.email)) {
      return false; // El usuario ya está registrado
    } else {
      // Agregar el nuevo usuario al arreglo de usuarios
      this.users.push(user);
      // Guardar los datos actualizados en el almacenamiento
      await this.storage.set(this.usersKey, this.users);
      return true; // Registro exitoso
    }
  }
}
