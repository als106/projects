import { Component, OnInit } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { UserService } from '../services/user.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.page.html',
  styleUrls: ['./login.page.scss'],
})

export class LoginPage implements OnInit {

  formLogin: any;
  formRegister: any;
  authType: string = 'signIn';
  error: string = "";

  constructor(private userSrv: UserService, private fb: FormBuilder, private router: Router) { }

  ngOnInit() {
    this.formLogin = this.fb.group({
      email: ['', [
        Validators.required,
        Validators.email
      ]],
      password: ['', [
        Validators.required,
        Validators.minLength(6)
      ]]
    });

    // Define el formulario de registro
    this.formRegister = this.fb.group({
      name: ['', Validators.required],
      email: ['', [
        Validators.required,
        Validators.email
      ]],
      password: ['', [
        Validators.required,
        Validators.minLength(6)
      ]]
    });
  }
  async doLogin() {
    if (this.formLogin.valid) {
      let email = this.formLogin.get('email').value;
      let password = this.formLogin.get('password').value;
      if (await this.userSrv.login(email, password)){
        this.error = '';
        this.router.navigateByUrl('tabs');
      } else {
        this.error = 'Los datos introducidos no son correctos';
      }
    } else {
      this.error = 'Por favor, completa todos los campos';
    }
  }

  async doRegister() {
    if (this.formRegister.valid) {
      let newUser = {
        name: this.formRegister.get('name').value,
        email: this.formRegister.get('email').value,
        password: this.formRegister.get('password').value
      };
      if (await this.userSrv.register(newUser)) {
        this.error = '';
        this.router.navigateByUrl('tabs');
      } else {
        this.error = 'El usuario ya está registrado';
      }
    } else {
      this.error = 'Por favor, completa todos los campos';
    }
  }
}
