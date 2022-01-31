import { Component, OnInit } from '@angular/core';
import { ToastController } from '@ionic/angular';
import { Router } from '@angular/router';

@Component({
  selector: 'app-deconnexion',
  templateUrl: './deconnexion.page.html',
  styleUrls: ['./deconnexion.page.scss'],
})
export class DeconnexionPage implements OnInit {

  constructor(private toastController: ToastController, private router: Router) { 
    this.deconnexion();
  }

  ngOnInit() {
    this.deconnexion();
  }

  private deconnexion() {
    this.toastController.create({
      message: "Deconnexion...",
      duration: 3000,
    }).then(toast => toast.present());
    this.router.navigateByUrl('connexion');
  }

}
